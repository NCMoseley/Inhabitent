(function($) {
    'use strict';
    
// Function to shrink and grow the search bar

$(function() {
    $( ".search-field" ).on('blur', function(){
        console.log('fun');
        var label = $('#input');
        label.toggleClass('expanded');

    });


});
    document.getElementById('glass').onclick = function() {
	var label = document.getElementById('input');
    label.classList.toggle('expanded');
	$('#input input').focus();
}


// Function to replace the Nav bar when the page is scrolled down. 
//use window.scrollY
var scrollpos = window.scrollY;
var nav = document.getElementById("site-navigation");
// var label = document.getElementById('input');

function add_class_on_scroll() {
    nav.classList.add("fade-in");
}

function remove_class_on_scroll() {
    nav.classList.remove('fade-in');
    // label.classList.remove('expanded');
}

window.addEventListener('scroll', function(){ 
    
    scrollpos = window.scrollY;

    if(scrollpos > 20){
        add_class_on_scroll();
    }
    else {
        remove_class_on_scroll();
    }
    console.log(scrollpos);
});


     
}(jQuery));