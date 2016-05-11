@extends('templates.default')

@section('title', 'Baseball Stats')

@section('content')
    <div class='content'>
        <div class='main_content'>
	        <h1>Baseball Stats</h1>
	        <button class='addPlayerInfo'>Add Player Info</button>
	        <button class='displayChart'>Display Chart</button>
	        <div id='chartContainer'></div>
        </div>
        <div class = 'playerInfoForm'>
        	<div class='cancel'><img src="../../Button-Delete-icon.png"></div>
        	<h3>Player Info From</h3>
	        <form>
	       		<input type='text' name = 'playerName' placeholder = 'Player Name'> 
	        	<input type='text' name = 'place' placeholder = 'Place'>
	        	<input type='text' name = 'ballsFaced' placeholder = 'Balls Faced'>
	        	<input type='text' name = 'hitsScored' placeholder = 'Hits Scored'>
	        	<input type='text' name = 'inningsPlayed' placeholder = 'Innings Played'>
	        	<input type='text' name = 'dateOfPlay' placeholder = 'Date of Play'>
	        	<div class='checkbox'><input type='checkbox' name='addMore'><span class = 'addAnother'>Add Another Player?</span></div>
	        	<input type = 'submit' name='submit' value='Submit'>
	        </form>
        </div>

    </div>
@endsection