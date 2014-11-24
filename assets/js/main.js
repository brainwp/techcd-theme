jQuery(document).ready(function($) {	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

});
jQuery(document).ready(function($) {
    $("#top-menu .main > ul").tinyNav({
    	header: 'Menu', // String: Specify text for "header" and show header instead of the active item
    });
    $('#help-faq a').on('click',function(e){
    	var faq_id = $(this).attr('data-faq-id');
    	if($(this).hasClass('open')){
    		$('#faq-'+faq_id).fadeOut('fast');
    		$(this).removeClass('open')
    	}
    	else{
    		$('#faq-'+faq_id).fadeIn('fast');
    	    $(this).addClass('open');
    	}
    });
    var _calc = $(window).width() - 20;
    var string_css = '<style id="img_slider_size">.is_slider {max-width:'+_calc +'px !important}</style>';
    $('body.single').append(string_css);
    console.log(string_css);
    $('#reveal-modal-id').addClass('tiny');
});
