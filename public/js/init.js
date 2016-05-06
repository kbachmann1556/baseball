/* Primary Init */
function init(){
  
}

/* Secondary Init */
function sInit() {
  // place any secondary inits here. these are usually inits that cannot be run at the time of init or conflict with other inits
}

/* Function Init */
function fInit(){
  // place any jQuery function inits here  
}

/* Initialize On Page Ready */
$(document).ready(function () {
  init();
  fInit();
  sInit();
});

/* Listen for Ajax Completion */
$(document).ajaxStop(function () {
  // stopDrawPageLoading();
});

/* Listen for Window Resize */
$(window).resize(function(){
  // any window resize functions go here
})
