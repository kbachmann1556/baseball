//-------------------------------------------------------
// Requests from App
//-------------------------------------------------------

function addPlayer(data){
	if(data.another == "true"){
	  var request = new Request("GET", baseball.config.routes.add_player, data, renderAddMore);
	}else{
	  var request = new Request("GET", baseball.config.routes.add_player, data, renderChart);
	}
  request.execute();
};

function loadChart(data){
  var request = new Request("GET", baseball.config.routes.load_chart, data, renderChart);
  request.execute();
};