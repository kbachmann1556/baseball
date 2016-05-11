//-------------------------------------------------------
// User Interactions / Pointer Events
//-------------------------------------------------------

$(document).on('click', '.get_player', function (e){
	e.preventDefault();
	console.log('here');
	var id;
	var player = $("input[name='player_name']").val();
	// var first_name = player[0];
	// var last_name = player[1];
	$.each(baseball_info.teams, function (index, value){
		$.each(value.players, function (index2, value2){
			if(value2.full_name == player){
				id = {id: value2.id};
				console.log('id = ', id);
				getPlayer(id);
				return;
			}
		})
	})
})

$(document).on('click', '.addPlayerInfo', function(e){
	e.preventDefault();
	$('.main_content').fadeOut();
	$('.playerInfoForm').fadeIn();
});

$(document).on('click', "input[name='submit']", function (e){
	e.preventDefault();
	var data = {
		name: $(".playerInfoForm input[name='playerName']").val(),
		place: $(".playerInfoForm input[name='place']").val(),
		ballsFaced: $(".playerInfoForm input[name='ballsFaced']").val(),
		hitsScored: $(".playerInfoForm input[name='hitsScored']").val(),
		inningsPlayed: $(".playerInfoForm input[name='inningsPlayed']").val(),
		dateOfPlay: $(".playerInfoForm input[name='dateOfPlay']").val(),
		another: "false",
	}
	if($(".playerInfoForm input[name='addMore']").is(':checked')){
		data.another = 'true';
	}
	console.log(data);
	addPlayer(data);

})

$(document).on('click', '.displayChart', function (e){
	e.preventDefault();
	loadChart();
})

$(document).on('click', '.cancel', function (e){
	e.preventDefault();
	$('.main_content').fadeIn();
	$('.playerInfoForm').fadeOut();
})