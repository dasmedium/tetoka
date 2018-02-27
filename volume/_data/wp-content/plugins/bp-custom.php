<?php

/*
define ( 'BP_AVATAR_DEFAULT', 'http://app.kidscoin.co.nz/wp-content/uploads/2016/11/KC-Mascot-head-drop-shadow-1.png' );
define ( 'BP_AVATAR_DEFAULT_THUMB', 'http://app.kidscoin.co.nz/wp-content/uploads/2016/11/KC-Mascot-head-drop-shadow-1.png' );
*/

function add_account_tabs() {
	global $bp;
	
		
	bp_core_new_subnav_item( array(
		'name'              => 'Account Details',
		'slug'              => 'account',
		'parent_url'        => trailingslashit( bp_displayed_user_domain() . 'profile' ),
		'parent_slug'       => 'profile',
		'screen_function'   => 'account_screen',
		'position'          => 100,
		'user_has_access'   => bp_is_my_profile()
	) );		


}
add_action( 'bp_setup_nav', 'add_account_tabs', 100 );



function account_screen() {
    add_action( 'bp_template_content', 'account_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function account_screen_content() { 
	echo do_shortcode( '[pmpro_account]' );
}


/* 
THE ORIGINAL INSPIRATION came from a GitHubGist - this is BP Navigation API
the main nav creation function is omited on my plugin because i correctly refferenced the parent sub nav slug of the item I was looking to edit.
hoarding this lines of text here, in case this disappears from the web haha 

https://gist.github.com/shanebp/5d3d2f298727a0a036e5


*/

// Banking BP Subnavs for Mycred Shortcodes
function add_banking_tabs() {
	global $bp;
	
	bp_core_new_nav_item( array(
		'name'                  => 'Banking',
		'slug'                  => 'banking',
		'parent_url'            => $bp->displayed_user->domain,
		'parent_slug'           => $bp->profile->slug,
		'screen_function'       => 'banking_screen',			
		'position'              => 200,
		'default_subnav_slug'   => 'banking'
	) );
		
	bp_core_new_subnav_item( array(
		'name'              => 'Taxes',
		'slug'              => 'taxes',
		'parent_url'        => trailingslashit( bp_displayed_user_domain() . 'banking' ),
		'parent_slug'       => 'banking',
		'screen_function'   => 'taxes_screen',
		'position'          => 100,
		'user_has_access'   => bp_is_my_profile()
	) );		

	bp_core_new_subnav_item( array(
		'name'              => 'Cheque',
		'slug'              => 'cheque',
		'parent_url'        => trailingslashit( bp_displayed_user_domain() . 'banking' ),
		'parent_slug'       => 'banking',
		'screen_function'   => 'cheque_screen',
		'position'          => 150,
		'user_has_access'   => bp_is_my_profile()
	) );	
	bp_core_new_subnav_item( array(
		'name'              => 'Savings',
		'slug'              => 'savings',
		'parent_url'        => trailingslashit( bp_displayed_user_domain() . 'banking' ),
		'parent_slug'       => 'banking',
		'screen_function'   => 'savings_screen',
		'position'          => 170,
		'user_has_access'   => bp_is_my_profile()
	) );	
	bp_core_new_subnav_item( array(
		'name'              => 'Transfer',
		'slug'              => 'transfer',
		'parent_url'        => trailingslashit( bp_displayed_user_domain() . 'banking' ),
		'parent_slug'       => 'banking',
		'screen_function'   => 'transfer_screen',
		'position'          => 190,
		'user_has_access'   => bp_is_my_profile()
	) );	

}
add_action( 'bp_setup_nav', 'add_banking_tabs', 100 );



function banking_screen() {
    add_action( 'bp_template_title', 'banking_screen_title' );
    add_action( 'bp_template_content', 'banking_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function banking_screen_title() { 
	echo '<h4 style="color:#08D88C;">How To Earn</h4>';
	
}
function banking_screen_content() { 
	echo do_shortcode( '[mycred_hook_table]' );
}


function taxes_screen() {
    add_action( 'bp_template_title', 'taxes_screen_title' );
    add_action( 'bp_template_content', 'taxes_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

function taxes_screen_title() { 
	echo '<h4 style="color:#08D88C;">Pay Taxes</h4>';
}
function taxes_screen_content() { 
	echo do_shortcode( '[mycred_transfer ref="Tax" button="Pay Tax" pay_to=1]' );
}

function cheque_screen() {
    add_action( 'bp_template_content', 'cheque_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function cheque_screen_content() { 
	echo do_shortcode( '[mycred_exchange from="mycred_default" to="toka_savings" button="Tranfer"]' );
}

function savings_screen() {
    add_action( 'bp_template_content', 'savings_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function savings_screen_content() { 
	echo do_shortcode( '[mycred_exchange from="toka_savings" to="mycred_default" button="Tranfer"]' );
}

function transfer_screen() {
    add_action( 'bp_template_content', 'transfer_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function transfer_screen_content() { 
	echo do_shortcode( '[mycred_transfer ref="Transfer to peers" button="Transfer money" show_balance=1]' );
}

//Restrict groups to course authors
/*
add_filter( 'bp_user_can_create_groups', 'limit_bp_group_creation' );
function limit_bp_group_creation (){
	      
	
	if( current_user_can('wdm_course_author', 'parent', 'instructor') ) return true;

	else

	return false;

}
*/



// Redirect to Profile


/*
add_filter( 'bp_login_redirect', 'bpdev_redirect_to_profile', 11, 3 );
 
function bpdev_redirect_to_profile( $redirect_to_calculated, $redirect_url_specified, $user ){

	if( empty( $redirect_to_calculated ) )
		$redirect_to_calculated = admin_url();
 
	//if the user is not site admin,redirect to his/her profile

	if( isset( $user->ID) && ! is_super_admin( $user->ID ) )
		return bp_core_get_user_domain( $user->ID );
	else
		return $redirect_to_calculated; // if site admin or not logged in, do not do anything

 
}

*/


// Buy Tokas

function add_buy_tokas() {
        global $bp;


        bp_core_new_subnav_item( array(
                'name'              => 'Buy Tokas',
                'slug'              => 'buy-tokas',
                'parent_url'        => trailingslashit( bp_displayed_user_domain() . 'profile' ),
                'parent_slug'       => 'profile',
                'screen_function'   => 'account_screen',
                'position'          => 100,
                'user_has_access'   => bp_is_my_profile()
        ) );            


}
add_action( 'bp_setup_nav', 'add_buy_tokas', 100 );



function buy_screen() {
    add_action( 'bp_template_content', 'buy_screen_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function buy_screen_content() { 
        echo do_shortcode( '[myced_buy_form]' );
}




?>
