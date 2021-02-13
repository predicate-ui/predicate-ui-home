/* <![CDATA[ */
(function($){
	
	"use strict";
	
    $(document).ready(function(){
		
		/* Parallax Effect
		================================================== */
		$('.parallax .parallax-banner-1').parallax("50%", 0.2);
		$('.newsletter').parallax("50%", 0.2);
		
		/* Scroll to Main
		================================================== */
		$('.site-branding a[href*=#]').click( function(event) { 
				
				event.preventDefault();
				
				$('#ut-navigation a').removeClass('selected');
				$('#ut-navigation li:first-child a').addClass('selected');
				
				$.scrollTo( $(this).attr('href') , 650, { easing: 'swing' , offset: -80} );			
			
		});
		
		
		$('#ut-navigation a[href*=#]').click( function(event) { 
				
				event.preventDefault();
				
				$('#ut-navigation a').removeClass('selected');
				$(this).addClass('selected');
				
				$.scrollTo( $(this).attr('href') , 650, { easing: 'swing' , offset: -80} );			
			
		});
		
		
		$('#learn-more').click( function(event) {
			
			event.preventDefault();
			$.scrollTo( $('#information-section') , 650, { easing: 'swing' , offset: -80} );
			
		});
		
		
		/* Flexslider with Video
		================================================== */		
		$(window).load(function(){
			
			// Vimeo API nonsense
		  	var player = document.getElementById('player_1');
		  	$f(player).addEvent('ready', ready);
		  
			function addEvent(element, eventName, callback) {
				(element.addEventListener) ? element.addEventListener(eventName, callback, false) : element.attachEvent(eventName, callback, false);
			}
			
			function ready(player_id) {
				var froogaloop = $f(player_id);
			  
				froogaloop.addEvent('play', function(data) {
				  $('.flexslider').flexslider("pause");
				});
				
				froogaloop.addEvent('pause', function(data) {
				  $('.flexslider').flexslider("play");
				});
			}
			
			$('.flexslider').fitVids().flexslider({
				animation: "slide",
				controlNav: "thumbnails",
				smoothHeight: true,
				start: function(slider){
			  		$('body').removeClass('loading');
				},
				before: function(slider){
					$f(player).api('pause');
			  	}
		  	});
			
		});
		
		
		/* Flexslider without Video
		================================================== */
		/* $(window).load(function(){
			
			$('.flexslider').flexslider({
				
				animation: "slide",
				controlNav: "thumbnails",
				smoothHeight: true,
				start: function(slider){
			  		$('body').removeClass('loading');
				}

		  	});
			
		}); */
		
	});

})(jQuery);

new cbpScroller( document.getElementById( 'mainsite' ) );

 /* ]]> */	