<?php

/*
* Check the URL of the WordPress login page for a specific query string.
*
* assumes login string is
* http://yoursite/wp-login.php?question=answer
*/

add_action( 'login_init', 'slp_login_stringcheck' );
function slp_login_stringcheck() {
 
	// set the location a failed attempt goes to
	$redirect = $slp_settings('redirect_url');
 
	// missing query string all together
	if (!isset ($_GET['question']) )
		wp_redirect( esc_url_raw ($redirect), 302 );
 
	// incorrect value for query string
	if ($_GET['question'] !== 'answer' )
		wp_redirect( esc_url_raw ($redirect), 302 );
 
}