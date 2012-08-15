<?php


function joe_dimatteo_calendar_scripts_styles() {
	$joe_dimatteo_calendar_url = apply_filters(
		'ai1ec_template_root_url',
		apply_filters( 'ai1ec_template', 'joe_dimatteo_calendar' )
	);

	wp_enqueue_style( 'joe_dimatteo_calendar-style', "$joe_dimatteo_calendar_url/css/joe-dimatteo-calendar.css" );
	wp_enqueue_script( 'joe_dimatteo_calendar-scripts', "$joe_dimatteo_calendar_url/js/joe-dimatteo-calendar.js", array('jquery') );
}
add_action( 'wp_print_styles', 'joe_dimatteo_calendar_scripts_styles' );

