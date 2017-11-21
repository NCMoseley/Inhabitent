
// Function to shrink and grow the search bar

(function() {
    "use strict";

    document.getElementById('glass').onclick = function() {

	var label = document.getElementById('input');

    label.classList.toggle('expanded');
	
    
}

})();

	

//use window.scrollY
var scrollpos = window.scrollY;
var nav = document.getElementById("site-navigation");

function add_class_on_scroll() {
    nav.classList.add("fade-in");
}

function remove_class_on_scroll() {
    nav.classList.remove("fade-in");
}

window.addEventListener('scroll', function(){ 
    
    scrollpos = window.scrollY;

    if(scrollpos > 100){
        add_class_on_scroll();
    }
    else {
        remove_class_on_scroll();
    }
    console.log(scrollpos);
});