
    jQuery(document).ready(function(){
        "use strict";
        /* Global Variables */

        var window_w = jQuery(window).width(); // Window Width
        var window_h = jQuery(window).height(); // Window Height
        var window_s = jQuery(window).scrollTop(); // Window Scroll Top

        var $html = jQuery('html'); // HTML
        var $body = jQuery('body'); // Body
        var $header = jQuery('#header');	// Header
        var $footer = jQuery('#footer');	// Footer



        // On Resize
        jQuery(window).resize(function(){
            window_w = jQuery(window).width();
            window_h = jQuery(window).height();
            window_s = jQuery(window).scrollTop();

        });

        // On Scroll
        jQuery(window).scroll(function(){

            window_s = jQuery(window).scrollTop();

        });


        /* Modernizr Fix */

        var supportPerspective = Modernizr.testAllProps('perspective');
        if(supportPerspective)
            $html.addClass('csstransforms3d');
        else
            $html.addClass('notcsstransforms3d');





        /* Main Functions */


        /* Layout Options */

        enableStickyHeader(); // Sticky Header
        enableFullWidth(); // Full Width Section

        enableTooltips(); // Tooltips

        enableSpecialCssEffects(); // CSS Animations

        enableBackToTop(); // Back to top button

        enableMobileNav(); // Mobile Navigation

        enableCustomInput(); // Custom Input Styles



        /* Sliders */

        enableFlexSlider(); // FlexSlider

        enableOwlCarousel(); // Owl Carousel

        //enableRevolutionSlider(); // Revolution Slider



        /* Social Media Feeds */


        enableInstagramFeed(); // Instagram Feed

        //enableTwitterFeed(); // Twitter Feed



        /* Elements */

        enableAccordions(); // Accordion

        enableTabs(); // Tabs

        enableAlertBoxes(); // Alert Boxes

        enableProgressbars(); // Progress Bars

        enableCustomAudio(); // Custom Audio Player

        enableShoppingCart(); // Shopping Cart

        enableCustomizeBox(); // Customize Box

        enableSocialShare(); // Social Share Buttons




        /* Other Plugins */

        enableJackBox(); // JackBox Plugin

        enableCalendar(); // Full Calendar

        enableStarRating(); // Star Rating

        enableMixItup(); // MixItUp (Filtering and Sorting)

        enableProductSlider(); // ClouZoom Products Slider




        /* AJAX forms */

        enableContactForm(); // AJAX Contact Form

        enableNewsletterForm(); // AJAX Newsletter Form



        /* ============================== */
        /* 			FUNCTIONS		      */
        /* ============================== */



        /* Sticky Header */

        function enableStickyHeader(){

                var stickyHeader = $body.hasClass('sticky-header-on');

                var resolution = 991;
                if($body.hasClass('tablet-sticky-header'))
                    resolution = 767
                jQuery(document).ready(function(){
                    if(stickyHeader && window_w > resolution){
                        $header.addClass('sticky-header');
                        var header_height = $header.innerHeight();
                        $body.css('padding-top', header_height+'px');
                    }
                })

                jQuery(window).scroll(function(){
                    animateHeader();
                });

                var resizeTimeout;

                jQuery(window).resize(function(){

                    animateHeader();

                    if(window_w < resolution){

                        $header.removeClass('sticky-header').removeClass('animate-header');
                        $body.css('padding-top', 0+'px');

                    }else{

                        $header.addClass('sticky-header');
                        var header_height = $header.innerHeight();
                        $body.css('padding-top', header_height+'px');
                        $header.addClass('resizing').removeClass('animate-header');;

                        resizeTimeout = setTimeout(function(){

                            header_height = $header.innerHeight();
                            $body.css('padding-top', header_height+'px');
                            $header.removeClass('resizing');
                            animateHeader();

                        }, 420);

                    }

                });

                function animateHeader(){

                    if(window_s>100){

                        jQuery('#header.sticky-header:not(.resizing)').addClass('animate-header');

                    }else{

                        jQuery('#header.sticky-header').removeClass('animate-header');

                    }

                }

            }











        function enableFullWidth(){

            // Full Width Elements
            var $fullwidth_el = jQuery('.full-width, .full-width-slider');


            // Set Full Width on resize
            jQuery(window).resize(function(){

                setFullWidth();

            });

            // Fix Full Width at Window Load
            jQuery(window).load(function(){

                setFullWidth();

            });

            // Set Full Width Function
            function setFullWidth(){

                $fullwidth_el.each(function(){

                    var element = jQuery(this);

                    // Reset Styles
                    element.css('margin-left', '');
                    element.css('width', '');


                    if(!$body.hasClass('boxed-layout')){

                        var element_x = element.offset().left;

                        // Set New Styles
                        element.css('margin-left', -element_x+'px');
                        element.css('width', window_w+'px');

                    }

                });

            }

        }










        /* Flex Slider */
        function enableFlexSlider(){



            // Main Flexslider
            jQuery('.main-flexslider').flexslider({

                animation: "slide",
                controlNav: false,
                prevText: "",
                nextText: "",
                slideshow: true,
                pauseOnHover:true
            });




            // Banner Rotator
            jQuery('.banner-rotator-flexslider').flexslider({
                animation: "slide",
                controlNav: true,
                directionNav: false,
                prevText: "",
                nextText: "",
            });



            // Portfolio Slideshow
            jQuery('.portfolio-slideshow').flexslider({
                animation: "fade",
                controlNav: false,
                slideshowSpeed: 4000,
                prevText: "",
                nextText: "",
            });

        }






        /* Revolution Slider */
        /*function enableRevolutionSlider(){

         jQuery('.tp-banner').not('.full-width-revolution').revolution({
         delay:9000,
         startwidth:1170,
         startheight:500,
         hideThumbs:10,
         navigationType:"none"
         });

         jQuery('.tp-banner.full-width-revolution').revolution({
         delay:9000,
         startwidth:1170,
         startheight:500,
         hideThumbs:10,
         navigationType:"none",
         fullWidth:"on",
         forceFullWidth:"on"
         });

         }*/







        /* Owl Carousel */
        function enableOwlCarousel(){

            jQuery('.owl-carousel').each(function(){

                /* Number Of Items */
                var max_items = jQuery(this).attr('data-max-items');
                var tablet_items = max_items;
                if(max_items > 1){
                    tablet_items = max_items - 1;
                }
                var mobile_items = 1;


                /* Initialize */
                jQuery(this).owlCarousel({
                    items:max_items,
                    pagination : false,
                    itemsDesktop : [1600,max_items],
                    itemsDesktopSmall : [1170,max_items],
                    itemsTablet: [991,tablet_items],
                    itemsMobile: [767,mobile_items],
                    slideSpeed:400
                });


                var owl = jQuery(this).data('owlCarousel');

                // Left Arrow
                jQuery(this).parent().find('.carousel-arrows span.left-arrow').click(function(e){
                    owl.prev();
                });

                // Right Arrow
                jQuery(this).parent().find('.carousel-arrows span.right-arrow').click(function(e){
                    owl.next();
                });

            });


        }





        /* Tooltips */
        function enableTooltips(){

            // Tooltip on TOP
            jQuery('.tooltip-ontop').tooltip({
                placement: 'top'
            });

            // Tooltip on BOTTOM
            jQuery('.tooltip-onbottom').tooltip({
                placement: 'bottom'
            });

            // Tooltip on LEFT
            jQuery('.tooltip-onleft').tooltip({
                placement: 'left'
            });

            // Tooltip on RIGHT
            jQuery('.tooltip-onright').tooltip({
                placement: 'right'
            });

        }

        /* Instagram Feed */
        function enableInstagramFeed(){

            if(jQuery('#instagram-feed').length){
                var instagram = Drupal.settings.instagram;
                var instagram_feed = new Instafeed({
                    get: 'popular',
                    clientId: instagram.instagramID,
                    target: 'instagram-feed',
                    template: '<li><a target="_blank" href="{{link}}"><img src="{{image}}" /></a></li>',
                    resolution: 'standard_resolution',
                    limit: instagram.instagramNum
                });
                instagram_feed.run();
            }

        }


        /* Twitter Feed */
        function enableTwitterFeed(){

            /* Twitter WIdget */
            jQuery('.twitter-widget').tweet({
                modpath: 'php/twitter/',
                count: 1,
                loading_text: 'Loading twitter feed...',
            })

                /* Twitter Share Button */
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');



        }







        /* Content Animation */








        /* Special CSS Effects */
        function enableSpecialCssEffects(){

            /* Sidebar Banner Hover Effect */
            jQuery('.banner').each(function(){

                var new_icon = jQuery(this).find('.icons').clone().addClass('icons-fadeout');
                jQuery(this).prepend(jQuery(new_icon));

            });


            /* Firefox Pricing Tables Height Fix */
            jQuery(window).load(function(){
                fixPricingTables();
            });

            jQuery(window).resize(function(){
                fixPricingTables();
            });

            /* Fix Pricing Tables */
            function fixPricingTables(){

                jQuery('.pricing-tables').each(function(){

                    jQuery(this).find('.pricing-table').attr('style', '');

                    if(window_w > 767){
                        var pricing_tables_h = jQuery(this).height();
                        jQuery(this).find('.pricing-table').innerHeight(pricing_tables_h);
                    }

                });

            }



            /* Sorting Float Fix */

            jQuery(window).load(function(){
                mediaSortFix();
            });

            jQuery(window).resize(function(){
                mediaSortFix();
            });

            function mediaSortFix(){
                if(window_w > 767){
                    var media_item_height = 0;
                    jQuery('.media-items .mix').css('height','');

                    jQuery('.media-items .mix').each(function(){
                        if(jQuery(this).height() > media_item_height)
                            media_item_height = jQuery(this).height();
                    });
                    jQuery('.media-items .mix').height(media_item_height);
                }else{
                    jQuery('.media-items .mix').css('height','');
                }
            }

        }







        /* Back To Top Button */
        function enableBackToTop(){

            jQuery('#button-to-top').hide();

            /* Show/Hide button */
            jQuery(window).scroll(function(){

                if(window_s > 100 && window_w > 991){
                    jQuery('#button-to-top').fadeIn(300);
                }else{
                    jQuery('#button-to-top').fadeOut(300);
                }

            });

            jQuery('#button-to-top').click(function(e){

                e.preventDefault();
                jQuery('body,html').animate({scrollTop:0}, 600);

            });

        }






        /* Mobile Navigation */
        function enableMobileNav(){

            /* Menu Button */
            jQuery('#menu-button').click(function(){

                if(!jQuery('#navigation').hasClass('navigation-opened')){

                    jQuery('#navigation').slideDown(500).addClass('navigation-opened');

                }else{

                    jQuery('#navigation').slideUp(500).removeClass('navigation-opened');

                }

            });


            /* On Resize */
            jQuery(window).resize(function(){

                if(window_w > 991){

                    jQuery('#navigation').show().attr('style','').removeClass('navigation-opened');

                }

            });


            /* Dropdowns */
            jQuery('#navigation li').each(function(){

                if(jQuery(this).find('ul').length > 0){
                    jQuery(this).append('<div class="dropdown-button"></div>');
                }

            });

            jQuery('#navigation .dropdown-button').click(function(){

                jQuery(this).parent().toggleClass('dropdown-opened').find('>ul').slideToggle(300);

            });


        }








        /* Custom Input Styles */
        function enableCustomInput(){

            /* Chosen Select Box */
            var config = {
                '.chosen-select'             : {disable_search_threshold:10, width:'100%'}
            }
            for (var selector in config) {

                jQuery(selector).chosen(config[selector]);

            }


            /* Numeric Input */
            jQuery('.numeric-input').each(function(){

                jQuery(this).wrap('<div class="numeric-input-holder"></div>');
                jQuery(this).parent().prepend('<div class="decrease-button"></div>');
                jQuery(this).parent().append('<div class="increase-button"></div>');

                // Decrease Button
                jQuery(this).parent().find('.decrease-button').click(function(){

                    var value = parseInt(jQuery(this).parent().find('.numeric-input').val());
                    value--;
                    jQuery(this).parent().find('.numeric-input').val(value);

                });

                // Increase Button
                jQuery(this).parent().find('.increase-button').click(function(){

                    var value = parseInt(jQuery(this).parent().find('.numeric-input').val());
                    value++;
                    jQuery(this).parent().find('.numeric-input').val(value);

                });

                // Prevent Not A Number(NaN) Value
                jQuery(this).keypress(function(e){

                    var value = parseInt(String.fromCharCode(e.which));
                    if(isNaN(value)){
                        e.preventDefault();
                    }

                });

            });

        }







        /* JackBox Plugin */
        function enableJackBox(){

            jQuery(window).load(function(){

                jQuery(".jackbox[data-group]").jackBox("init", {
                    deepLinking: false
                });

            });

        }









        /* Accordions */
        function enableAccordions(){

            jQuery('.accordions').each(function(){

                // Set First Accordion As Active
                jQuery(this).find('.accordion-content').hide();
                if(!jQuery(this).hasClass('toggles')){
                    jQuery(this).find('.accordion:first-child').addClass('accordion-active');
                    jQuery(this).find('.accordion:first-child .accordion-content').show();
                } else {
					jQuery(this).find('.accordion:first-child').removeClass('accordion-active');
				}

                // Set Accordion Events
                jQuery(this).find('.accordion-header').click(function(){

                    if(!jQuery(this).parent().hasClass('accordion-active')){

                        // Close other accordions
                        if(!jQuery(this).parent().parent().hasClass('toggles')){
                            jQuery(this).parent().parent().find('.accordion-active').removeClass('accordion-active').find('.accordion-content').slideUp(300);
                        }

                        // Open Accordion
                        jQuery(this).parent().addClass('accordion-active');
                        jQuery(this).parent().find('.accordion-content').slideDown(300);

                    }else{

                        // Close Accordion
                        jQuery(this).parent().removeClass('accordion-active');
                        jQuery(this).parent().find('.accordion-content').slideUp(300);

                    }

                });

            });



            /* Link Toggles */
            jQuery('.toggle-link').each(function(){

                var target = jQuery(this).attr('href');
                jQuery(target).hide();

                jQuery(this).click(function(e){

                    e.preventDefault();

                    var target = jQuery(this).attr('href');
                    jQuery(target).slideToggle(300);

                });

            });



            /* Payment Options Accordion */
            jQuery('.payment-options').each(function(){

                jQuery(this).find('.payment-content').hide();
                jQuery(this).find('input[type="radio"]:checked').parent().parent().addClass('active').find('.payment-content').show();

                jQuery(this).find('.payment-header').click(function(){

                    if(jQuery(this).find('input[type="radio"]').is(':checked')){

                        jQuery(this).parent().parent().find('.payment-content').slideUp(300);
                        jQuery(this).parent().parent().find('li.active').removeClass('active');
                        jQuery(this).parent().addClass('active').find('.payment-content').slideDown(300);

                    }

                });

            });


        }






        /* Tabs */
        function enableTabs(){

            jQuery('.tabs').each(function(){

                // Set Active Tab
                jQuery(this).find('.tab').hide();
                jQuery(this).find('.tab:first-child').show();
                jQuery(this).find('.tab-header ul li:first-child').addClass('active-tab');


                // Prevent Default
                jQuery(this).find('.tab-header li a').click(function(e){
                    e.preventDefault();
                });


                // Tab Navigation
                jQuery(this).find('.tab-header li').click(function(){

                    var target = jQuery(this).find('a').attr('href');

                    jQuery(this).parent().parent().parent().find('.tab').fadeOut(200);
                    jQuery(this).parent().parent().parent().find(target).delay(200).fadeIn(200);

                    jQuery(this).parent().find('.active-tab').removeClass('active-tab');
                    jQuery(this).addClass('active-tab');


                });


            });

        }








        /* Alert Boxes */
        function enableAlertBoxes(){

            jQuery('.alert-box .icons').click(function(){

                jQuery(this).parent().slideUp(300, function(){

                    jQuery(this).remove();

                });

            });

        }










        /* Progressbars */
        function enableProgressbars(){

            jQuery('.progressbar').each(function(){
                jQuery(this).attr('data-current', 0);
            });

            jQuery(window).load(function(){

                animateProgressBars();

            });

            jQuery(window).scroll(function(){

                animateProgressBars();

            });


            /* Animate Progress BArs */
            function animateProgressBars(){

                var pr_offset = window_h/8;

                jQuery('.progressbar').each(function(){

                    var bar = jQuery(this);
                    var bar_y = jQuery(bar).offset().top;

                    if((bar_y < (window_s + window_h - pr_offset))){

                        barStartAnimation(bar);

                    }

                });


                /* Bar FillIn Animation */
                function barStartAnimation(el){

                    var bar = el;
                    var bar_progress = el.find('.progress-width');
                    var bar_percent = el.find('.progress-percent');

                    jQuery(bar).addClass('progressbar-animating').addClass('progessbar-start');
                    jQuery(bar_percent).fadeIn(200);
                    var percent = parseInt(jQuery(bar).attr('data-percent'));

                    var animationDuration = 2000;
                    var intervalDuration = animationDuration / percent;

                    var barInterval = setInterval(function(){

                        var current = jQuery(bar).attr('data-current');

                        if(current <= percent){

                            jQuery(bar_progress).css('width', current+'%');
                            jQuery(bar_percent).text(current+'%');
                            current++;
                            jQuery(bar).attr('data-current', current);

                        }else{

                            clearInterval(barInterval);
                            jQuery(bar).removeClass('progessbar-start');

                        }

                    }, intervalDuration);

                }

            }

        }










        // Custom Audio Player
        function enableCustomAudio(){

            jQuery('audio').each(function(){

                /* Setup Audio Player */
                jQuery(this).wrap('<div class="audio-player"></div>');
                jQuery(this).parent().append('<div class="audio-play-button"></div>'); // Play Button
                jQuery(this).parent().append('<div class="audio-current-time">00:00</div>'); // Current Time
                jQuery(this).parent().append('<div class="audio-progress" data-mousedown=""><div class="audio-progress-wrapper"><div class="audio-buffer-bar"></div><div class="audio-progress-bar"></div></div></div>'); // Progress bar
                jQuery(this).parent().append('<div class="audio-time">00:00</div>'); // Time
                jQuery(this).parent().append('<div class="audio-volume"><div class="volume-bar"><div class="audio-volume-progress"></div></div></div>'); // Volume


                /* Set Volume */
                var audio_volume = 0.5;
                jQuery(this)[0].volume = audio_volume;
                jQuery(this).parent().find('.audio-volume-progress').css('width', (audio_volume*100)+'%');


                /* Initialize */
                jQuery(this).bind('canplay', function(){

                    /* Set Track Time */
                    var audio_length = Math.floor(jQuery(this)[0].duration);
                    var audio_length_m = Math.floor(audio_length/60);
                    var audio_length_s = Math.floor(audio_length%60);

                    if(audio_length_m < 10){
                        audio_length_m = '0'+audio_length_m;
                    }

                    if(audio_length_s < 10){
                        audio_length_s = '0'+audio_length_s;
                    }

                    audio_length = audio_length_m + ':' + audio_length_s;
                    jQuery(this).parent().find('.audio-time').text(audio_length);

                });



                /* Play/Pause Button */
                jQuery(this).parent().find('.audio-play-button').click(function(){

                    if(jQuery(this).hasClass('pause')){

                        jQuery(this).removeClass('pause');
                        jQuery(this).parent().find('audio')[0].pause();

                    }else{

                        jQuery(this).addClass('pause');
                        jQuery(this).parent().find('audio')[0].play();

                    }

                });




                /* Progress Bar */
                jQuery(this).bind('timeupdate', function(){

                    var audio = jQuery(this)[0];
                    var progress_bar = jQuery(this).parent().find('.audio-progress-bar');
                    var track_current = jQuery(this).parent().find('.audio-current-time');

                    var audio_length = audio.duration;
                    var audio_current = audio.currentTime

                    /* Progress bar */
                    var progress = (audio_current / audio_length)*100;
                    jQuery(progress_bar).css('width', progress+'%');

                    /* Current Time */
                    var audio_current_m = Math.floor(audio_current/60);
                    var audio_current_s = Math.floor(audio_current%60);

                    if(audio_current_m < 10){
                        audio_current_m = '0'+audio_current_m;
                    }

                    if(audio_current_s < 10){
                        audio_current_s = '0'+audio_current_s;
                    }

                    audio_current = audio_current_m + ':' + audio_current_s;
                    jQuery(this).parent().find('.audio-current-time').text(audio_current);

                });


                /* Progress Change */
                jQuery('.audio-progress-wrapper').mousedown(function(e){

                    jQuery(this).attr('data-mousedown', 'true');

                    var audio_x = jQuery(this).offset().left;
                    var audio_w = jQuery(this).width();
                    var mouse_x = e.pageX;

                    var progress = (mouse_x - audio_x) / audio_w * 100;

                    var track_length = jQuery(this).parent().parent().find('audio')[0].duration;
                    var update_time = track_length / (100 / progress);

                    jQuery(this).parent().parent().find('audio')[0].currentTime = update_time;

                });

                jQuery(document).mouseup(function(){

                    jQuery('.audio-progress-wrapper').attr('data-mousedown', '');
                    jQuery('.volume-bar').attr('data-mousedown', '');

                });

                jQuery('.audio-progress-wrapper').mousemove(function(e){

                    if(jQuery(this).attr('data-mousedown') == 'true'){

                        var audio_x = jQuery(this).offset().left;
                        var audio_w = jQuery(this).width();
                        var mouse_x = e.pageX;

                        var progress = (mouse_x - audio_x) / audio_w * 100;

                        var track_length = jQuery(this).parent().parent().find('audio')[0].duration;
                        var update_time = track_length / (100 / progress);

                        jQuery(this).parent().parent().find('audio')[0].currentTime = update_time;

                    }

                });





                /* Buffering Bar */
                jQuery(this).bind('progress', function(){

                });




                /* Volume Bar */
                jQuery(this).bind('volumechange', function(){

                    var audio = jQuery(this)[0];
                    var volume_bar = jQuery(this).parent().find('.audio-volume-progress');
                    var audio_volume = audio.volume;

                    /* Volume Progress bar */
                    var progress = audio_volume*100;
                    jQuery(volume_bar).css('width', progress+'%');

                    if(audio_volume >= 0.5){
                        jQuery(volume_bar).parent().parent().removeClass('volume-down').removeClass('volume-off');
                    }

                    if(audio_volume < 0.5){
                        jQuery(volume_bar).parent().parent().addClass('volume-down').removeClass('volume-off');
                    }

                    if(audio_volume == 0){
                        jQuery(volume_bar).parent().parent().addClass('volume-off');
                    }

                });

                jQuery('.volume-bar').mousedown(function(e){

                    jQuery(this).attr('data-mousedown', 'true');

                    var audio_x = jQuery(this).offset().left;
                    var audio_w = jQuery(this).width();
                    var mouse_x = e.pageX;

                    var update_volume = (mouse_x - audio_x) / audio_w;
                    jQuery(this).parent().parent().find('audio')[0].volume = update_volume;

                });

                jQuery('.volume-bar').mousemove(function(e){

                    if(jQuery(this).attr('data-mousedown') == 'true'){

                        var audio_x = jQuery(this).offset().left;
                        var audio_w = jQuery(this).width();
                        var mouse_x = e.pageX;

                        var update_volume = (mouse_x - audio_x) / audio_w;
                        jQuery(this).parent().parent().find('audio')[0].volume = update_volume;

                    }

                });



            });

        }










        /* Full Calendar */
        function enableCalendar(){

            /* Sidebar Calendar */
            jQuery('.sidebar-calendar').responsiveCalendar({
                events: {
                    "2014-03-03": {"number": 1, "class": "calendar-event", "url": "event-post-v1.php"},
                    "2014-03-05": {"number": 1, "class": "calendar-event", "url": "event-post-v1.php"},
                    "2014-03-08": {"number": 1, "class": "calendar-event", "url": "event-post-v1.php"},
                    "2014-03-12": {"number": 1, "class": "calendar-event", "url": "event-post-v1.php"},
                    "2014-03-18": {"number": 1, "class": "calendar-event", "url": "event-post-v1.php"},
                    "2014-03-22": {"number": 1, "class": "calendar-event", "url": "event-post-v1.php"},
                }
            });

        }









        /* MixItUp (Filtering and Sorting) */
        function enableMixItup(){

            // Mix It Up
            jQuery('.media-items').mixItUp();
            jQuery('.shop-items').mixItUp();



            /* Filtering Dropdown */
            jQuery('.filter-dropdown>li').click(function(){

                jQuery(this).parent().toggleClass('opened');

            });
            jQuery('.filter-dropdown ul li').click(function(){

                var value = jQuery(this).text();
                jQuery(this).parent().find('.active-filter').removeClass('active-filter');
                jQuery(this).addClass('active-filter');
                jQuery(this).parent().parent().find('>span').text(value);

            });


            /* Sorting Options */
            jQuery('.order-group>button:last-child').hide();
            jQuery('.order-group.ascending-sort>button:first-child').hide();
            jQuery('.order-group.ascending-sort>button:last-child').show();
            jQuery('.order-group.descending-sort>button:last-child').hide();
            jQuery('.order-group.descending-sort>button:first-child').show();

            jQuery('.filter-sorting button').click(function(){

                if(!jQuery(this).parent().hasClass('active-sort')){

                    jQuery(this).parent().parent().find('.active-sort').removeClass('active-sort');

                    jQuery(this).parent().addClass('active-sort');

                }

                jQuery(this).hide();
                jQuery(this).parent().find('button').not(jQuery(this)).show();

            });

        }










        /* Start Rating */
        function enableStarRating(){

            // Read Only Rating
            jQuery('.shop-rating.read-only').raty({
                readOnly: true,
                path:'img/rating',
                score: function() {
                    return jQuery(this).attr('data-score');
                }
            });

            // Rate Only Rating
            jQuery('.shop-rating.rate-only').raty({
                readOnly: false,
                path:'img/rating',
                score: function() {
                    return jQuery(this).attr('data-score');
                }
            });

            // Read Only Rating Small
            jQuery('.shop-rating.read-only-small').raty({
                readOnly: true,
                path:'img/rating/small',
                score: function() {
                    return jQuery(this).attr('data-score');
                }
            });

        }







        /* Shopping Cart */
        function enableShoppingCart(){

            jQuery('.shopping-cart-table .remove-shopping-item').click(function(){

                jQuery(this).parent().parent().fadeOut(300, function(){
                    jQuery(this).remove();
                });

            });


            jQuery('.shopping-cart-dropdown .remove-shopping-item').click(function(){

                jQuery(this).parent().parent().parent().fadeOut(300, function(){
                    jQuery(this).remove();
                });

            });

        }









        /* Customize Box */
        function enableCustomizeBox(){

            jQuery(window).load(function(){

                /* Show Customize Box on Load */
                jQuery('.customize-box').fadeIn(300).addClass('opened');

                setTimeout(function(){

                    jQuery('.customize-box').removeClass('opened');

                }, 2000);


                /* Customize Box Open Button */
                jQuery('.customize-box-button').click(function(){

                    jQuery(this).parent().toggleClass('opened');

                });


                // ColorPicker
                jQuery('#colorpicker').ColorPicker({
                    color: '#232830',
                    onShow: function (colpkr){
                        jQuery(colpkr).fadeIn(500);
                        return false;
                    },
                    onHide: function (colpkr) {
                        jQuery(colpkr).fadeOut(500);
                        return false;
                    },
                    onChange: function (hsb, hex, rgb){
                        jQuery('body').css('background-image','none');
                        jQuery('#colorpicker,body').css('backgroundColor', '#' + hex);
                    }
                });
        /*        jQuery('#colorpicker').ColorPicker({

                    onSubmit: function(hsb, hex, rgb, el) {
                        jQuery('#colorpicker-value').val('#'+hex);
                        jQuery(el).ColorPickerHide();
                    },
                    onBeforeShow: function () {
                        jQuery(this).ColorPickerSetColor(jQuery('#colorpicker-value').val());
                    },
                    onChange: function (hsb, hex, rgb) {
                        jQuery('#colorpicker-value').val('#'+hex);
                        jQuery('#colorpicker').css('backgroundColor', '#' + hex);
                    }

                });*/


                /* Background Option Accordion */
                var background_option = jQuery('#background-option option:selected').val();
                jQuery('#customize-box ' + background_option).show();

                jQuery('#background-option').on('change', function() {

                    jQuery('#customize-box ' + background_option).slideUp(300);
                    background_option = jQuery(this).find('option:selected').val();
                    jQuery('#customize-box ' + background_option).slideDown(300);

                });




                /* Customize Box Submit */
                jQuery('#customize-box').submit(function(e){

                    e.preventDefault();

                    var layout = jQuery(this).find('input[type="radio"]:checked').val();

                    switch(layout){

                        case 'boxed':
                            jQuery('body').addClass('boxed-layout');
                            setTimeout(function(){
                                jQuery(window).trigger('resize');
                            }, 300);
                            break;

                        case 'wide':
                            jQuery('body').removeClass('boxed-layout');
                            setTimeout(function(){
                                jQuery(window).trigger('resize');
                            }, 300);
                            break;

                        default:
                            jQuery('body').removeClass('boxed-layout');
                            setTimeout(function(){
                                jQuery(window).trigger('resize');
                            }, 300);
                            break;

                    }

                    /* Background Change */
                    var background_type = jQuery('#background-option option:selected').val();

                    if(background_type == '.background-image'){

                        var background_image = jQuery('input[name="background-image-radio"]:checked').val();
                        jQuery('body').css('background-image', 'url('+background_image+')');

                    }else if(background_type == '.background-color'){

                        var background_color = jQuery('#colorpicker-value').val();
                        jQuery('body').css('background-image','none').css('background-color', background_color);

                    }


                });

            });

        }


        /* Social Share Buttons */
        function enableSocialShare(){

            jQuery('.social-share').each(function(){

                var page_url = encodeURIComponent(document.URL);

                jQuery(this).find('.facebook>a').attr('href', 'http://www.facebook.com/sharer/sharer.php?u='+page_url).attr('target','_blank');
                jQuery(this).find('.twitter>a').attr('href', 'https://twitter.com/home?status='+page_url).attr('target','_blank');
                jQuery(this).find('.google>a').attr('href', 'https://plus.google.com/share?url='+page_url).attr('target','_blank');
                jQuery(this).find('.pinterest>a').attr('href', 'http://pinterest.com/pin/create/button/?url='+page_url).attr('target','_blank');

            });

        }



        /* AJAX Contact Form */
        function enableContactForm(){

            jQuery('#contact-form>*').wrap('<div class="form-content"></div>');
            jQuery('#contact-form').append('<div class="form-report"></div>');

            jQuery('#contact-form').submit(function(e){

                e.preventDefault();

                var form = jQuery(this);
                var action = jQuery(this).attr('action');
                var data = jQuery(this).serialize();

                $.ajax({
                    type: "POST",
                    url: action,
                    data: data,
                    beforeSend: function(){
                        form.css('opacity', '0.5');
                    },
                    success: function(data){

                        // Display returned data
                        form.css('opacity', '1');
                        form.find('.form-report').html(data);

                        // Hide Form on Success
                        if (data.indexOf('class="success"') >= 0){
                            form.find('.form-content').slideUp(300);
                        }

                    }
                });

            });

        }




        /* AJAX Newsletter Form */
        function enableNewsletterForm(){

            jQuery('#newsletter>*').wrap('<div class="form-content"></div>');
            jQuery('#newsletter').append('<div class="form-report"></div>');


            jQuery('#newsletter').submit(function(e){

                e.preventDefault();

                jQuery('#newsletter .newsletter-email input').tooltip('destroy');
                jQuery('#newsletter .newsletter-zip input').tooltip('destroy');

                var form = jQuery(this);
                var action = jQuery(this).attr('action');
                var data = jQuery(this).serialize();

                var error = false;
                var email_val = form.find('.newsletter-email input').val();
                var zip_val = form.find('.newsletter-zip input').val();

                if(email_val == '' || email_val == ' '){

                    error = true;
                    form.find('.newsletter-email input').tooltip({title:'Required', trigger: 'manual'});
                    form.find('.newsletter-email input').tooltip('show');

                }else{

                    var email_re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                    if(!email_re.test(email_val)){
                        error = true;
                        form.find('.newsletter-email input').tooltip({title:'Email not valid', trigger: 'manual'});
                        form.find('.newsletter-email input').tooltip('show');

                    }else{
                        form.find('.newsletter-email input').tooltip('hide');
                    }

                }

                if(zip_val == '' || zip_val == ' '){

                    error = true;
                    form.find('.newsletter-zip input').tooltip({title:'Required', trigger: 'manual'});
                    form.find('.newsletter-zip input').tooltip('show');

                }else{
                    form.find('.newsletter-zip input').tooltip('hide');
                }


                if(!error){
                    $.ajax({
                        type: "POST",
                        url: action,
                        data: data,
                        beforeSend: function(){
                            form.css('opacity', '0.5');
                        },
                        success: function(data){

                            // Display returned data
                            form.css('opacity', '1');
                            form.find('.form-report').html(data);

                            // Hide Form on Success
                            if (data.indexOf('class="success"') >= 0){
                                form.find('.form-content').slideUp(300);
                            }
                        }
                    });
                }

            });

        }






        /* ClouZoom Products Slider */
        function enableProductSlider(){

            if(jQuery('.shop-product-gallery').length > 0){

                var current_img = jQuery('.shop-product-gallery .main-image img').attr('src');
                jQuery('.shop-product-gallery .slider-navigation li').find('a[href="'+current_img+'"]').parent().addClass('active');

            }

            /* Slider Navigation */
            jQuery('.shop-product-gallery .slider-navigation li').click(function(e){

                var image = jQuery(this).find('a').attr('href');
                jQuery(this).parent().find('.active').removeClass('active');
                jQuery(this).addClass('active');

                jQuery('.shop-product-gallery .main-image img').animate({opacity:0},300,function(){
                    jQuery(this).attr('src',image).animate({opacity:1}, 300);
                });

            });


            /* JackBox */
            jQuery('.shop-product-gallery .main-image .fullscreen-icon').click(function(){

                var image = jQuery(this).parent().find('>img').attr('src');
                jQuery('.shop-product-gallery .slider-navigation li').find('a[href="'+image+'"]').trigger('click');

            });


            /* Cloud Zoom */
            jQuery(".cloud-zoom-image").imagezoomsl({
                zoomrange: [3, 3]
            });

            jQuery('.tracker').click(function(){
                alrt('a');
            });


        }





    });
