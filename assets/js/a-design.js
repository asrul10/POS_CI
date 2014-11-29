$(document).ready(function () {
    var url = window.location;
    $('table.table a[href="'+ url +'"]').parent().addClass('active');
    $('table.table a').filter(function() {
         return this.href == url;
    }).parent().addClass('active');

    $('.dropdown-menu li.active').filter(function(){
     $('li.dropdown').addClass('active');
    });
    
	$('.menu').click(function() {
		$('.menuku').animate({
    		left: '0px'
    	}, 200);
    	
    	$('body').animate({
    	    left: '285px'
    	}, 200);
   	});

   	$('.close-menu').click(function() {
		$('.menuku').animate({
    		left: '-285px'
    	}, 200);
    	
    	$('body').animate({
    	    left: '0px'    
    	}, 200);
   	});

});