//-------------------------------------------------------
// Callbacks
//-------------------------------------------------------

function renderGetChampions(){
	console.log('app.js', league.response.champs.data);
	champs = league.response.champs.data;
	$.each(champs, function (key, value){
		$('.champion_data').append(value.name+'<br>');
	});
}

function renderGetMastery(){
	console.log('renderGetMastery', league.response);
}