jQuery(document).ready(function($){
 
 	// Schedule page track pop up
 	$('.open-track').click(function(e){ e.preventDefault(); }); // Remove this line when you want to show the popup
 	//http://dimsemenov.com/plugins/magnific-popup/documentation.html#initializing-popup
	$('.open-track_DISABLED').magnificPopup({ // remove the word _DISABLED when you want to show the popup
	  type:'inline',
	  midClick: true,
	  callbacks: {
	    elementParse: function(item) {
	      // Function will fire for each target element
	      // "item.el" is a target DOM element (if present)
	      // "item.src" is a source that you may modify

	      //console.log(item); // Do whatever you want with "item" object
	      window.location.hash = item.src;
	    },
	    close: function() {
	      // Will fire when popup is closed
	      if(window.location.hash !="" && window.location.hash.indexOf('popup') == 1 ){
	      	window.location.hash = "";	
	      	//window.location.href = window.location.href.replace(/#.*/,'');
	      }
	    }
	  } 
	});
	
	//open popup if hash# exists 
	
	if(window.location.hash !="" && window.location.hash.indexOf('popup') == 1 )
	jQuery.magnificPopup.open({
	  items: {
	    src: window.location.hash
	  },
	  type: 'inline',
	  callbacks: {
	    close: function() {
	      // Will fire when popup is closed
	      if(window.location.hash !="" && window.location.hash.indexOf('popup') == 1 ){
	      	window.location.hash = "";
	      }
	    }
	  }
	});

	//end Schedule page track pop up

	// confs dropdown menu
	$('.dropdown-toggle').on('click',function(){
		$(this).parent('.dropdown').toggleClass('active');
		return false;
	});

	

	// Fixed Navbar on scroll

	$(window).scroll(function(){
		if ($(this).scrollTop() > 80) {
			$('.navbar-main').addClass('fixed-navbar');
		} else {
			$('.navbar-main').removeClass('fixed-navbar');
		}

	// Schedule page fixed tabs

		if ($(window).scrollTop() > 100) {
			//$('.schedule-tabs').addClass('fixed-schedule-tab');
		} else {
			$('.schedule-tabs').removeClass('fixed-schedule-tab');
		}
				
		if ($(window).scrollTop() > 500) {
			//$('.schedule-sessions').addClass('fixed-schedule-sessions');
		} else {
			//$('.schedule-sessions').removeClass('fixed-schedule-sessions');
		}

	});

});//end document ready



