jQuery(document).ready(function($) {
    $(document).ready(function() {

        // Only for big displays
        if ($(window).width() >= '975'){

            // Init fullpage slider
            $('#fullpage').fullpage({
                //options here
                fadingEffect: true,
                navigation: true,
                scrollingSpeed: 900,
                navigationPosition: 'left',
                touchSensitivity: 10,
                loopBottom: true,
                dragAndMove: true,
                anchors:['page1', 'page2', 'page3', 'page4', "page5", "page6"],
                afterLoad: function( section, origin){
                    $("#slide_number1").html("0" + origin);

                    $('.section.active [data-aos]').each(function(){
                        $(this).addClass("aos-animate")
                    });
                },
                onLeave: function(){
                    $('.section [data-aos]').each(function(){
                        $(this).removeClass("aos-animate")
                    });
                },
                onSlideLeave: function(){
                    $('.slide [data-aos]').each(function(){
                        $(this).removeClass("aos-animate")
                    });
                },
                afterSlideLoad: function(){
                    $('.slide.active [data-aos]').each(function(){
                        $(this).addClass("aos-animate")
                    });
                }

            });


            //methods
            $.fn.fullpage.setAllowScrolling(true);

            $(document).on('click', 'footer .footer-content .arrow', function(){
                $.fn.fullpage.moveSectionDown();
            });

            $( "<div id='slide_number1' class='slide_number'>01</div>" ).prependTo( "#fp-nav" );

        }else {
            // In small devices, turn off fullpage slider and it anchors
            // After this needed fix anchors, it fix belove
            $("header .navbar-nav").on("click","a", function (event) {
                //отменяем стандартную обработку нажатия по ссылке
                event.preventDefault();

                //забираем идентификатор бока с атрибута href
                var id  = $(this).attr('href').substr(1);

                var $container = $("html,body");
                var $scrollTo = $('.' + id);
                $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top + $container.scrollTop(), scrollLeft: 0}, 1500);
            });


            // SmoothScrolPlugin init
            $(function(){

                var $window = $(window);		//Window object

                var scrollTime = 0.5;			//Scroll time
                var scrollDistance = 250;		//Distance. Use smaller value for shorter scroll and greater value for longer scroll

                $window.on("mousewheel DOMMouseScroll", function(event){

                    event.preventDefault();

                    var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
                    var scrollTop = $window.scrollTop();
                    var finalScroll = scrollTop - parseInt(delta*scrollDistance);

                    TweenMax.to($window, scrollTime, {
                        scrollTo : { y: finalScroll, autoKill:true },
                        ease: Power1.easeOut,	//For more easing functions see https://api.greensock.com/js/com/greensock/easing/package-detail.html
                        autoKill: true,
                        overwrite: 5
                    });

                });

            });

        }



        // Init owl-carusel
        $('.owl-carousel').owlCarousel({
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                769:{
                    items:2,
                },
                1000:{
                    items:3,
                    margin:0
                }
            },
            lazyLoad:true,
            loop:true,
            nav:true,
            dots: false,
            smartSpeed :900,
            navText : ["<div class='arrow'><img src='wp-content/themes/brayx/assets/img/slide-arrow-right.png'></div>","<div class='arrow'><img src='/wp-content/themes/brayx/assets/img/slide-arrow-right.png'></div>"],
            scrollHorizontally: true,
            onInitialized  : counter, //When the plugin has initialized.
            onTranslated : counter, //When the translation of the stage has finished.
            margin:30
        });


        // Counter main slider
        function counter(event) {
            var element = event.target;         // DOM element, in this example .owl-carousel
            var items = event.item.count;     // Number of items
            var item = event.item.index + 1;     // Position of the current item

            // it loop is true then reset counter from 1
            if (item > items) {
                item = item - items
            }
            $('.owl-carousel .owl-nav .owl-slider-counter').html(item + "/" + items)
            console.log(123)
        }



        $( "<div id='owl-slider-counter' class='owl-slider-counter'>1/" + $('.owl-item:not(.cloned)').length + "</div>" ).prependTo( ".owl-carousel .owl-nav" );
    });


    // Animation with scroll
    AOS.init({
        duration: 700,
        once: true
    });
    $('[data-aos]').each(function(){ $(this).addClass("aos-init"); });

});

