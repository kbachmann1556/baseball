<?php
namespace App\Models;

use Session;
use Illuminate\Support\Facades\Input;
use DB;

class Player {

  //-----------------------------------------------------
  // VARS & CONSTANTS
  //-----------------------------------------------------

  private $name;
  private $place;
  private $ballsFaced;
  private $hitsScored;
  private $inningsPlayed;
  private $dateOfPlay;

  function setName($name){
    $this->name = $name;
    return;
  }

  function setPlace($place){
    $this->place = $place;
    return;
  }

  function setBallsFaced($ballsFaced){
    $this->ballsFaced = $ballsFaced;
    return;
  }

  function setHitsScored($hitsScored){
    $this->hitsScored = $hitsScored;
    return;
  }

  function setInningsPlayed($inningsPlayed){
    $this->inningsPlayed = $inningsPlayed;
    return;
  }

  function setDateOfPlay($dateOfPlay){
    $this->dateOfPlay = $dateOfPlay;
    return;
  }  

  function getDateOfPlay(){
    return $this->dateOfPlay;
  }

  //-----------------------------------------------------
  // SETUP
  //-----------------------------------------------------

  function __construct($request) 
  {
    $this->setName($request->input('name'));
    $this->setPlace($request->input('place'));
    $this->setBallsFaced($request->input('ballsFaced'));
    $this->setHitsScored($request->input('hitsScored'));
    $this->setInningsPlayed($request->input('inningsPlayed'));
    $this->setDateOfPlay($request->input('dateOfPlay'));
  }

  function save(){
    DB::insert('insert into players (name, place, ballsFaced, hitsScored, inningsPlayed, dateOfPlay) values (?, ?, ?, ?, ?, ?)', [$this->name, $this->place, $this->ballsFaced, $this->hitsScored, $this->inningsPlayed, $this->dateOfPlay]);
  }

}