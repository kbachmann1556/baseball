<?php

namespace App\Helpers;

use Config;
use DB;

class BaseballHelper {
  public static function getAllPlayers(){
    $allPlayers = DB::select('select * from players');
    $data_points = array();
    foreach($allPlayers as $player){
      $point = array("x"=>$player->ballsFaced, "y"=>$player->hitsScored, "name"=>$player->name);
      $data_points[] = $point;
    }
    return $data_points;
  }

}
?>