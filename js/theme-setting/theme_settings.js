jQuery(document).ready(function ($) {
    $(".form-colorpicker").spectrum({
        showAlpha: true,
        showInput: true,
        allowEmpty:true,
        showInitial: true,
        preferredFormat: "hex3"
    })

    var cim = $('#edit-upload-image').attr('value');
    $('.c-image').attr('src',cim);
	
	$("#edit-seo .fieldset-wrapper").hide();
	$("#edit-seo .fieldset-legend").click(function(){
		$("#edit-seo .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-seo .plus').toggleClass('minus');
	});
	
	$("#edit-socials .fieldset-wrapper").hide();
	$("#edit-socials .fieldset-legend").click(function(){
		$("#edit-socials .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-socials .plus').toggleClass('minus');
	});
	
	$("#edit-header .fieldset-wrapper").hide();
	$("#edit-header .fieldset-legend").click(function(){
		$("#edit-header .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-header .plus').toggleClass('minus');
	});
	
	$("#edit-footer .fieldset-wrapper").hide();
	$("#edit-footer .fieldset-legend").click(function(){
		$("#edit-footer .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-footer .plus').toggleClass('minus');
	});
	
	$("#edit-rtl-layout .fieldset-wrapper").hide();
	$("#edit-rtl-layout .fieldset-legend").click(function(){
		$("#edit-rtl-layout .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-rtl-layout .plus').toggleClass('minus');
	});
	
	$("#edit-layout-style .fieldset-wrapper").hide();
	$("#edit-layout-style .fieldset-legend").click(function(){
		$("#edit-layout-style .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-layout-style .plus').toggleClass('minus');
	});
	
	$("#edit-header-style .fieldset-wrapper").hide();
	$("#edit-header-style .fieldset-legend").click(function(){
		$("#edit-header-style .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-header-style .plus').toggleClass('minus');
	});
	
	$("#edit-footer-style .fieldset-wrapper").hide();
	$("#edit-footer-style .fieldset-legend").click(function(){
		$("#edit-footer-style .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-footer-style .plus').toggleClass('minus');
	});
	
	$("#edit-color .fieldset-wrapper").hide();
	$("#edit-color .fieldset-legend").click(function(){
		$("#edit-color .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-color .plus').toggleClass('minus');
	});
	
	$("#edit-background .fieldset-wrapper").hide();
	$("#edit-background .fieldset-legend").click(function(){
		$("#edit-background .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-background .plus').toggleClass('minus');
	});
	
	$("#edit-css .fieldset-wrapper").hide();
	$("#edit-css .fieldset-legend").click(function(){
		$("#edit-css .fieldset-wrapper").slideToggle("slow");
		$(this).toggleClass("active");
		$('#edit-css .plus').toggleClass('minus');
	});
  
});



