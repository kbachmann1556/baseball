@extends('templates.default')

@section('title', 'League of Legends')

@section('content')
    <div>
        <h3>League of Legends</h3>
        <form class='findSummonerMastery'>
        	<input type='text' name='summoner_name' placeholder='Summoner Name'>
        	<input type='submit' value='Submit'>
        </form>
        <!-- <button class = 'get_champions'>Get Champions</button> -->
        <div class='champion_data'></div>
    </div>
@endsection