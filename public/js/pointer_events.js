//-------------------------------------------------------
// User Interactions / Pointer Events
//-------------------------------------------------------

$(document).on('click', '.get_champions', function (e){
	e.preventDefault();
	getChampions();
	
})

$(document).on('submit', '.findSummonerMastery', function(e){
	e.preventDefault();

	var summoner_name = {name: $(".findSummonerMastery input[name='summoner_name']").val()};
	console.log(summoner_name);
	getMastery(summoner_name);
})