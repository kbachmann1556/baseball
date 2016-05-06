<?php

namespace App\Http\Controllers;

// use Session;
use \Exception;
use Illuminate\Http\Request;
use \App\Helpers\RiotHelper;

class RequestController extends Controller {

	public function getAllChampions(Request $request){
		$champions = RiotHelper::getAllChampions();
		// echo "<pre>"; print_r($champions); die();
		$array['champs'] = $champions;
		return response()->json($array);
	}

	public function getMastery(Request $request){
		$summonerName = $request->input('name');
		$id = RiotHelper::getSummonerId($summonerName);
		$mastery = RiotHelper::getMastery($id);
		echo "<pre>"; print_r($mastery); die();
		$array['mastery'] = $mastery;
		return response()->json($array);		
	}

  /**
  * Add Product to Cart
  * @access public
  * @param Request request
  */
  public function addProductToCart(Request $request) {
    $activeSession = SessionHelper::getActiveSession();
    $activeCart = SessionHelper::getActiveCart();
    $merchant = $activeSession->getOrg();
    //-----------------------------------------------------
    // must have a product ID
    //-----------------------------------------------------
    if (!$request->has('id'))
    {
      throw new Exception("Product ID must be present", 1);
    }
    //-----------------------------------------------------
    //add product to cart
    //-----------------------------------------------------
    $productId = $request->input('id');
    $productQuantity = ($request->has('quantity')) ? $request->input('quantity') : 1; // 1 if not quantity on request
    $productOptions = ($request->has('options')) ? $request->input('options') : null; // null if no options on request
    $compressedOptions = \App\Helpers\CartHelper::compressProductOptions($productOptions);
    $addProductRequest = $activeCart->addProduct($productId, $productQuantity, $compressedOptions);
    $array['httpSuccess'] = $addProductRequest;
    $cart = $activeCart->get();
    

    $fulfillmentOption = $activeSession->getFulfillmentOptions();
    if($fulfillmentOption != null){
      $newFulfillment = $cart->setFulfillmentGroup($fulfillmentOption->__get('id'));
      if($newFulfillment){ 
        $data = CartHelper::setFulfillment($fulfillmentOption, $newFulfillment, 'added', $activeSession);
        $array['productObject'] = $data['fulfillment'];
        $array['addedFulfillment'] = $data['total'];
      }else{
        $activeSession->setFulfillmentOptions(null);
        $array['productObject'] = false;
        return response()->json($array);
      }
    }else{ 
      $array['productObject'] = $cart->toResponseObject();
      $array['addedFulfillment'] = "notAdded";
    }

    $array['productOptions'] = $productOptions;
    $newCart = $activeCart->get(); 
    $array['count'] = count($newCart->__get('order_items'));
    //-----------------------------------------------------
    // find order_item id of product just added above
    //-----------------------------------------------------
    $array['newId'] = $newCart->getNewId($productId, $productOptions);
    //-----------------------------------------------------
    // load new product option blade
    //-----------------------------------------------------
    $product = ProductHelper::getProduct($activeCart->org_id, $productId, true);
    $viewString = ProductHelper::renderProductOptionsBlade($product, $newCart, $merchant, $array['newId']);
    $array['product'] = $viewString;
    if($request->has('orderId')){
      $array['oldId'] = $request->input('orderId');
    }else{
      $array['oldId'] = $productId;
    }
    
    return response()->json($array);
  }
}
