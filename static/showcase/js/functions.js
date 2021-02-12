// MENU MOBILE ===============================================================================
// Collpsable menu mobile and tablets
$("#megamenu-button-mobile").on('click', function(){
  $(".megamenu").slideToggle(400);
  $(this).toggleClass("active");
});

// MENU DROP DOWN ====================================== //
 $(document).ready(function() {
    $(".megamenu .drop-down").on('click', function() {
      if($(this).next("div").is(":visible")){
        $(this).next("div").slideToggle("normal");
      } else {
        $(".megamenu .drop-down-container").fadeOut("fast");
        $(this).next("div").slideToggle("slow");

      }
    });
  });
// $('.tooltip-2').tooltip();
$(window).on('load', function() { // makes sure the whole site is loaded
  $('#status').fadeOut(); // will first fade out the loading animation
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
  $('body').delay(350).css({'overflow':'visible'});
});

