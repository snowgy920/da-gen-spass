jQuery(document).ready(function ($){
	$('.cpa-color-picker').wpColorPicker();

    $('.da-content-wrapper .nav-tab-wrapper .nav-tab').bind('click', function(e){
        e.preventDefault();
        var tabs_parent = $(this).parent().parent('.tabs-wrapper');
        jQuery('.nav-tab-wrapper .nav-tab', tabs_parent).removeClass('nav-tab-active');
        jQuery('.tabs-content-wrapper .tab-content', tabs_parent).removeClass('tab-content-active');

        jQuery(jQuery(this).attr('href')).addClass('tab-content-active');
        jQuery(this).addClass('nav-tab-active');
	});
});
