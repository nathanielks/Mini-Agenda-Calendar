<?php

function mac_deregister_conflicts(){
    wp_deregister_style('ai1ec-calendar');
    wp_deregister_style('ai1ec-event');
}
add_action('wp_enqueue_scripts', 'mac_deregister_conflicts', 999);

function mini_agenda_calendar_scripts_styles() {
	$mini_agenda_calendar_url = apply_filters(
		'ai1ec_template_root_url',
		apply_filters( 'ai1ec_template', 'mini_agenda_calendar' )
	);

	wp_enqueue_style( 'mini_agenda_calendar-style', "$mini_agenda_calendar_url/css/mini-agenda-calendar.css" );
	wp_enqueue_script( 'mini_agenda_calendar-scripts', "$mini_agenda_calendar_url/js/mini-agenda-calendar.js", array('jquery') );
}
add_action( 'wp_print_styles', 'mini_agenda_calendar_scripts_styles' );

