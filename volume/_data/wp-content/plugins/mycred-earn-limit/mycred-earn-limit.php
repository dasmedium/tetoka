
application/x-httpd-php mycred-earning-limits.php 
PHP script text
<?php
/*
Plugin Name: Mycred Earning Limits
Plugin URI: https://www.codex.mycred.me
Description: Customizations for Mycred
Version: .1
Author: Das Medium
Author URI: http://www.dasmedium.co
*/

/*   Daily Limit of 200
add_filter( 'mycred_add', 'mycred_pro_global_daily_limit', 1, 3 );
function mycred_pro_global_daily_limit( $reply, $request, $mycred ) {

	if ( $reply === false || $request['ref'] == 'manual' ) return $reply;
	$user_id = absint( $request['user_id'] );

	// Get total for today starting from midnight til now
	$total = mycred_get_total_by_time( 'today', 'now', NULL, $user_id );

	// If we have earned 1000 points today decline everything else
	if ( $total >= 200 )
		return false;

	return $reply;

}
*/

// Daily Limit of 30
add_filter( 'mycred_add', 'mycred_pro_global_daily_limit', 1, 3 );
function mycred_pro_global_daily_limit( $reply, $request, $mycred ) {

	if ( $reply === false ) return $reply;
	$user_id = absint( $request['user_id'] );

	// Get total for today starting from midnight til now
	$total = mycred_get_total_by_time( 'today', 'now', NULL, $user_id );

	// If we have earned 1000 points today decline everything else
	if ( $total >= 30 )
		return false;

	return $reply;

}


/* Max Amount Per User
add_filter( 'mycred_add', 'mycred_pro_enforce_max_balance', 90, 3 );
function mycred_pro_enforce_max_balance( $reply, $request, $mycred ) {

	// Not applicable if already declined or amount is below zero
	if ( $reply === false || $request['amount'] < 0 ) return $reply;

	extract( $request );

	$max = 2000;
	$current_balance = $mycred->get_users_balance( $user_id, $type );

	// If we already reached max we decline now
	if ( $current_balance >= $max )
		return false;

	// If the user exceeds the limit once this process is finished, decline now.
	if ( $current_balance + $amount > $max )
		return false;

	return $reply;

}

*/
