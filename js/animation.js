jQuery(document).ready(function(){
    "use strict";
    /* Global Variables */

    var window_w = jQuery(window).width(); // Window Width
    var window_h = jQuery(window).height(); // Window Height
    var window_s = jQuery(window).scrollTop(); // Window Scroll Top

    var $html = jQuery('html'); // HTML



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

    enableContentAnimation();
    /* Modernizr Fix */

    var supportPerspective = Modernizr.testAllProps('perspective');
    if(supportPerspective)
        $html.addClass('csstransforms3d');
    else
        $html.addClass('notcsstransforms3d');
    function enableContentAnimation(){

    if($html.hasClass('cssanimations')){

        jQuery('.animate-onscroll').animate({opacity:0},0);

        jQuery(window).load(function(){

            jQuery('.animate-onscroll').filter(function(index){
                return this.offsetTop < (window_s + window_h);
            }).each(function(index, value){

                var el = jQuery(this);
                var el_y = jQuery(this).offset().top;
                if((window_s) > el_y){
                    jQuery(el).addClass('animated fadeInDown').removeClass('animate-onscroll').removeClass('animated fadeInDown');
                }

            });

            animateOnScroll();

        });

        jQuery(window).resize(function(){
            animateOnScroll();
        });

        jQuery(window).scroll(function(){
            animateOnScroll();
        });

    }

    // Start Animation When Element is scrolled
    function animateOnScroll(){

        jQuery('.animate-onscroll').filter(function(index){

            return this.offsetTop < (window_s + window_h);

        }).each(function(index, value){

            var el = jQuery(this);
            var el_y = jQuery(this).offset().top;

            if((window_s + window_h) > el_y){

                setTimeout(function(){

                    jQuery(el).addClass('animated fadeInDown');

                    setTimeout(function(){
                        jQuery(el).removeClass('animate-onscroll');
                    }, 500);

                    setTimeout(function(){
                        jQuery(el).css('opacity','1').removeClass('animated fadeInDown');
                    },500);

                },index*200);

            }

        });

    }

}
});