//-------------------------------------------------------
// Callbacks
//-------------------------------------------------------

function renderChart(){
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title: {
			text: "Balls Faced vs Hits Scored"
		},
		axisX: {
			title: "Balls Faced",
			minimum: 0,
		},
		axisY: {
			title: "Hits Scored",
			minimum: 0,
		},
		data: [
			{
				type: "scatter",
				toolTipContent: "<span style='\"'color: {color};'\"'><strong>{name}</strong></span> <br/> <strong>Balls Faced:</strong> {x} <br/> <strong>Hits Scored:</strong> {y} ",
				dataPoints: [],
			}
		]
	});
	$.each(baseball.response, function (index, value){
		var point = {x: parseInt(value.x), y: parseInt(value.y), name: value.name};
		chart.options.data[0].dataPoints.push(point);
	})
	chart.render();
	$('.main_content').fadeIn();
	$('.playerInfoForm').fadeOut();
}

function renderAddMore(){
	$(".playerInfoForm input[name='playerName']").val("");
	$(".playerInfoForm input[name='place']").val("");
	$(".playerInfoForm input[name='ballsFaced']").val("");
	$(".playerInfoForm input[name='hitsScored']").val("");
	$(".playerInfoForm input[name='inningsPlayed']").val("");
	$(".playerInfoForm input[name='dateOfPlay']").val("");
}