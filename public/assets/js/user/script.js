/**
 * Loader 
 */

 $(window).on('load', function(){
    setTimeout(function(){ $('.loader').fadeOut("slow"); }, 1800);
 });
/**
 * navigation bar 
 */
 // responsive navigation state 
 var responsive_navigation_state = "closed";
 // hide and show subnav
$('.dropdown-nav').on('mouseover', function() {
    var dropdown = $(this).attr('dropdown');
    $(dropdown).css("max-height","60px");
}).on('mouseout', function() {
    var dropdown = $(this).attr('dropdown');

    $(dropdown).css("max-height","0px");
});

$('.subnav').on('mouseover', function() {
    if(responsive_navigation_state !== "opened"){
        $(this).css("max-height","60px");
    }
}).on('mouseout', function() {
    if(responsive_navigation_state !== "opened"){
        $(this).css("max-height","0px");
    }
});

// hide and show responsive menu 

$('#close-btn').on('click', function(){
    $('.responsive-navigation-bar').addClass('navigation-bar').removeClass('responsive-navigation-bar');
    responsive_navigation_state = "closed";
});

$('#menu-btn').on('click', function() {
    $('.navigation-bar').addClass('responsive-navigation-bar').removeClass('navigation-bar');
    responsive_navigation_state = "opened";
});

/**
 * Parallax
 */