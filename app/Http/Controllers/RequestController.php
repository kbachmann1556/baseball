<?php

namespace App\Http\Controllers;

// use Session;
use \Exception;
use Illuminate\Http\Request;
use \App\Helpers\BaseballHelper;
use \App\Models\Player;

class RequestController extends Controller {

  public function landing(Request $request){
    return view('landing');
  }

  public function loadChart(Request $request){
    $data_points = BaseballHelper::getAllPlayers();
    return response()->json($data_points);
  }

  public function addPlayer(Request $request){
    $player = new Player($request);
    $saved = $player->save();
    $data_points = BaseballHelper::getAllPlayers();
    return response()->json($data_points);
  }

}
