//-------------------------------------------------------
// Requests from App
//-------------------------------------------------------

/* Add Product to Cart */
function getChampions(){
  var request = new Request("GET", league.config.routes.get_champions, {}, renderGetChampions);
  request.execute();
};

function getMastery(summoner){
	var request = new Request("GET", league.config.routes.get_mastery, summoner, renderGetMastery);
  request.execute();
}