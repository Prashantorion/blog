/*****page loader script start*****/




$(window).load(function () {

    "use strict";
 // $("#status").fadeOut();
//  $("#preloader").delay(500).toggleClass("animated slideOutUp").fadeOut(250);
 // $("body").removeClass('scrollLock ');



	
});
/********page loader script end********/


$(document).ready(function() {


$('.menuIcon').click(function(e){
$(this).toggleClass('open');
$('.menuPanel').toggleClass('open');
$('.socialPanel').removeClass('open');

 });
 
$('.socialIcon').click(function(e){
$(this).toggleClass('open');
$('.socialPanel').toggleClass('open');
$('.menuPanel').removeClass('open');

 })


    $(window).scroll(function(){

        //if scrolled down more than the header’s height
            if ($(window).scrollTop() > aboveHeight){

        // if yes, add “fixed” class to the <nav>
        // add padding top to the #content 
        //    (value is same as the height of the nav)
            $('.shareIcon').addClass('showIcon').css('top','500').next()
            .css('padding-top','60px');

            } else {

        // when scroll up or less than aboveHeight,
         //   remove the “fixed” class, and the padding-top
            $('.shareIcon').removeClass('showIcon').next()
            .css('padding-top','0');
            }
        });



$('.menu').slicknav({
            label: '',
            prependTo: 'nav',
            closedSymbol: '&#43;',
            openedSymbol: '&#8211;'
});

$('.slicknav_menu').click(function(e){
$('.slicknav_menu').toggleClass('menuOpen');
 });

    //Calculate the height of <header>
    //Use outerHeight() instead of height() if have padding
    var aboveHeight = $('.header').outerHeight();

//when scroll
    $(window).scroll(function(){

        //if scrolled down more than the header’s height
            if ($(window).scrollTop() > aboveHeight){

        // if yes, add “fixed” class to the <nav>
        // add padding top to the #content 
        //    (value is same as the height of the nav)
            $('.header').addClass('showMenu').css('top','500').next()
            .css('padding-top','60px');

            } else {

        // when scroll up or less than aboveHeight,
         //   remove the “fixed” class, and the padding-top
            $('.header').removeClass('showMenu').next()
            .css('padding-top','0');
            }
        });

});