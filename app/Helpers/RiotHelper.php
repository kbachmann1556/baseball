<?php

namespace App\Helpers;

use \App\Models\ServiceRequest;
use Config;

class RiotHelper {
  public static function getAllChampions(){
    $serviceRequest = new ServiceRequest();
    $serviceRequest
    ->setHttpMethod("GET")
    ->setApiRequestPath(sprintf(Config::get('paths.GET_CHAMPIONS')))
    ->execute();

    $responseObject = $serviceRequest->getObjectResponse();

    return $responseObject;
  }

  public static function getSummonerId($name){
  	$serviceRequest = new ServiceRequest();
  	$serviceRequest
  	->setHttpMethod("GET")
  	->setApiRequestPath(sprintf(Config::get('paths.GET_SUMMONER'), $name))
  	->execute();

  	$responseObject = $serviceRequest->getObjectResponse();

  	return $responseObject->$name->id;
  }

  public static function getMastery($id){
  	$serviceRequest = new ServiceRequest();
  	$serviceRequest
  	->setHttpMethod("GET")
  	->setApiRequestPath(sprintf(Config::get('paths.GET_MASTERY'), $id))
  	->execute();

  	$responseObject = $serviceRequest->getObjectResponse();

  	return $responseObject;
  }
}
?>