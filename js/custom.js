(function($){
    "use strict";
	jQuery(document).ready(function(){
        /*Review*/
        $('.c-review').click(function(){
            $('body,html').animate({scrollTop:900}, 800);
            $('.product-single-tabs .tab-header ul > li:last-child').click();
        });
        /*OWL Multiproduct*/
        $('.slider-navigation').owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            pagination : true,
            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3],
            itemsMobile: [767,3]
        });
        $('.slider-navigation li').on('click', function() {
            $('.slider-navigation li').removeClass('active');
            $(this).addClass('active');

        });
		$('.home-button .icon-home').text('');
        $('.delete-line-item.form-submit').attr('value','x');
		$('.banners-inline-wrapper .banner-wrapper').wrapAll('<div class="banners-inline"></div>');
        if($('#navigation').length){
            $('#navigation a.active-trail').parents('ul').siblings().addClass('active-trail');
        }
        $('#navigation > li').removeClass('current-menu-item');
       //Add to cart
        $('.commerce-add-to-cart .form-item-quantity').prepend('<a href="#" class="custom-minus"><i class="icon icon-minus"></i></a>');
        $('.commerce-add-to-cart .form-item-quantity').append('<a href="#" class="custom-plus"><i class="icon icon-plus"></i></a>');

        $('td.views-field-edit-quantity > div').prepend('<a href="#" class="custom-minus"><i class="icon icon-minus"></i></a>');
        $('td.views-field-edit-quantity > div').append('<a href="#" class="custom-plus"><i class="icon icon-plus"></i></a>');
        $('.custom-minus').click(function() {
            $(this).siblings("input").val(function( index, value ) {
                if(value > 0){
                    return parseInt(value) - 1;
                }else{
                    return parseInt(value);
                }
            });
            return false;
        });
        $('.custom-plus').on('click',function() {
            $(this).siblings("input").val(function( index, value ) {
                return parseInt(value) + 1;
            });
            return false;
            $(this).unbind();
        });
	});
})(jQuery);