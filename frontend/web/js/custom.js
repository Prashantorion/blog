$(document).ready(function() {

	// loader js starts here 
    (function() {
        $(window).on('load', function() {
            $('#pre-status').fadeOut();
            $('#st-preloader').delay(350).fadeOut('slow')
        })
    }());
	// loader js starts here

	// header js starts here
	 $('.nav-icon').on("click", function(){
      $('header').toggleClass('open');
    });

	 //SMOOTH SCROLL
     if ($('.hero').length) {
        $(document).on("scroll", onScroll);
        $('nav ul li a, .down-icon').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");
            
            $('a').each(function () {
                $(this).removeClass('active');
                 if ($(window).width() < 768) {
                     $('nav').slideUp();
                     $('header').removeClass('open');
                 }
            });
                
            $(this).addClass('active');
          
            var target = this.hash,
            menu = target;
            target = $(target);
            $('html, body').stop().animate({
                'scrollTop': target.offset().top
                
            }, 500, 'swing', function () {
                window.location.hash = target.selector;
                $(document).on("scroll", onScroll);
            });
        });
    }

    function onScroll(event){
      if ($('#hero').length) {     
        var scrollPos = $(document).scrollTop();
        $('nav ul li a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('nav ul li a').removeClass("activelink");
                currLink.addClass("activelink");
            }
        });
       }              
    }

     if ( $(window).width() >= 769 ) {

        var box = $("nav ul>li");
        var tl = new TimelineMax({
          yoyo: false,
          reversed: true
        });

        tl.staggerFrom(box, .5, {
            x: "50",
            opacity: 0,
            ease: Back.easeOut
        },0.1);

        $(".nav-icon").click(function(){ 
            tl.reversed() ? tl.play():tl.reverse();   
        });
    }
    else{
        $('.nav-icon').on("click", function(){
            $('header nav').slideToggle();
        });
    }

    $('a.page-scroll').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
        $('.menu a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
      
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 1500, 'swing', function () {
            // window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });

    $(window).scroll(function() {
        var top = 200;
        if ($(window).scrollTop() >= top) {
            $(".fixing").addClass("fixed")
        } else {
            $(".fixing").removeClass("fixed")
        }
    });
    // header js ends here

    // home-slider carousel js starts here
    $('.home-slider').owlCarousel({
		loop:false,
		dots:false,
		nav:false,
		mouseDrag:false,
		touchDrag:false,
		smartSpeed: 700,
		autoplay: false,
		items:1
	});  
	// home-slider carousel js ends here

    // testimonial carousel js starts here
    $('.testimonial-carousel').owlCarousel({
		loop:true,
		margin:30,
		nav:true,
		smartSpeed: 700,
		autoplay: false,
		navText: [ '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>', '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>' ],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			800:{
				items:1
			},
			1024:{
				items:1
			}
		}
	});  
	// testimonial carousel js ends here


    // clients carousel js starts here
    $('.portfolio-section-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause:true,
        autoplayTimeout: 3000,
        smartSpeed: 1700,
        items: 4,
        mouseDrag: false,
        nav: false,
        dots:false,
        responsiveClass: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            800:{
                items:4
            },
            1024:{
                items:4
            }
        }
    });  
    // clients carousel js ends here


    // technology carousel js starts here
    $('.technologies-carousel').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayHoverPause:true,
        autoplayTimeout: 3000,
        smartSpeed: 1700,
        items: 8,
        mouseDrag: true,
        margin:20,
        nav: true,
        dots:false,
        responsiveClass: true,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:5
            },
            800:{
                items:8
            },
            1024:{
                items:8
            }
        }
    });  
    // technology carousel js ends here


    // portfolio carousel js starts here
    $('.portfolio-carousel').owlCarousel({
        loop: false,
        autoplay:false,
        autoHeight:true,
        autoplayTimeout: 5000,
        smartSpeed: 1700,
        items: 1,
        mouseDrag: false,
        nav: true,
        navText: [
          "<i class='fa fa-angle-left'></i>",
         "<i class='fa fa-angle-right'></i>"
        ]
    });
    // portfolio carousel js ends here


	// clients carousel js starts here
	$('.sponsors-carousel').owlCarousel({
		loop: true,
        autoplay: false,
        autoplayHoverPause:true,
        autoplayTimeout: 3000,
        smartSpeed: 1700,
        items: 5,
        margin:40,
        mouseDrag: false,
        touchDrag: false,
        nav: true,
        dots:false,
        responsiveClass: true,
		responsive:{
			0:{
				items:3
			},
			600:{
				items:4
			},
			800:{
				items:5
			},
			1024:{
				items:5
			}
		}
	});  
	// clients carousel js ends here

	// wow js starts here
	new WOW().init()
    // wow js ends here


    // project box-move js starts here

    var nodes = [].slice.call(document.querySelectorAll('.mouse-move'), 0);
    var directions  = { 0: 'top', 1: 'right', 2: 'bottom', 3: 'left' };
    var classNames = ['in', 'out'].map((p) => Object.values(directions).map((d) => `${p}-${d}`)).reduce((a, b) => a.concat(b));

    var getDirectionKey = (ev, node) => {
        var { width, height, top, left } = node.getBoundingClientRect();
        var l = ev.pageX - (left + window.pageXOffset);
        var t = ev.pageY - (top + window.pageYOffset);
        var x = (l - (width/2) * (width > height ? (height/width) : 1));
        var y = (t - (height/2) * (height > width ? (width/height) : 1));
        return Math.round(Math.atan2(y, x) / 1.57079633 + 5) % 4;
    }

    class Item {
            constructor(element) {
            this.element = element;    
            this.element.addEventListener('mouseover', (ev) => this.update(ev, 'in'));
            this.element.addEventListener('mouseout', (ev) => this.update(ev, 'out'));
        }
    
        update(ev, prefix) {
          this.element.classList.remove(...classNames);
          this.element.classList.add(`${prefix}-${directions[getDirectionKey(ev, this.element)]}`);
        }
    }

    nodes.forEach(node => new Item(node));

    // project box-move js ends here

    // scrolltotop js starts here
    $(window).on('scroll', function () {
        var $totalHeight = $(window).scrollTop();
        var $scrollToTop = $(".scrolltotop");
        if ($totalHeight > 300) {
            $(".scrolltotop").fadeIn();
            $('.click-contactpop').addClass('show');
        } else {
            $(".scrolltotop").fadeOut();
            $('.click-contactpop').removeClass('show');
            $('.contact-popup').removeClass('contact-show');
        }

        if ($totalHeight + $(window).height() === $(document).height()) {
            $scrollToTop.css("bottom", "90px");
        } else {
            $scrollToTop.css("bottom", "20px");
        }
    });

    $('.scrolltotop').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 1600);
        return !1
    });
    // scrolltotop js ends here

    // start contactpopup
    $('.click-contactpop').click(function(){
      $(this).removeClass('show');
      $('.contact-popup').addClass('contact-show');
    });

    $('.contact-cancel').click(function(){
      $('.contact-popup').removeClass('contact-show');
      $('.click-contactpop').addClass('show');
    });
    // end contactpopup


    // start auto type writer js
    var content = 'Our belief “Success is simple. Do what’s right, the right way, at the right time.” — Arnold H. Glascow';

    var ele = '<span>' + content.split('').join('</span><span>') + '</span>';


    $(ele).hide().appendTo('.typed-text').each(function (i) {
        $(this).delay(60 * i).css({
            display: 'inline',
            opacity: 0
        }).animate({
            opacity: 1
        }, 100);
    });
    // end auto type writer js

    // start sticky footer js
    var window_width = $(window).width();
    if (window_width > 900) {
        $('.footer-area').footerReveal({
            shadow: false,
            zIndex: -999
        });
    }
    // end sticky footer js


    // start select option js
    (function() {
        [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {    
            new SelectFx(el);
        } );
    })();
    // end select option js


    // uploadfile js starts here
      $("#uploadresume").change(function(){
        $(".filename").text(this.files[0].name);
      });
    // uploadfile js starts here


    // mobile menu js starts here
      $('.main-menu-handle').click(function () {
        $(this).toggleClass("active")
        $('.mobile-menu').toggleClass("menuactive")
      });
    // mobile menu js end here


    document.body.classList.add('js-loading');

      window.addEventListener("load", showPage, false);

      function showPage() {
        document.body.classList.remove('js-loading');
      }

      $(".project").hover3d({
        selector: ".project__card"
        });

        // $(".movie").hover3d({
        //     selector: ".movie__card",
        //     shine: true,
        //     sensitivity: 20,
        // });
});