<?php
/*
Plugin Name: Change Post Ownership
Plugin URI: https://www.codex.mycred.me
Description: Changes the post author to the user who purchased the post using the myCRED Sell Content add-on.
Version: .1
Author: Das Medium/Mycred
Author URI: http://www.dasmedium.co
*/

add_filter( 'mycred_add_finished', 'mycred_pro_change_post_author_on_sale', 10, 3 );
function mycred_pro_change_post_author_on_sale( $reply, $request, $mycred ) {

        // Only applicable to post purchases (if approved)
        if ( $request['ref'] != 'buy_content' || $reply === false ) return $reply;

        // Make sure this is not the author payout
        if ( ! isset( $request['data']['seller'] ) ) return $reply;

        extract( $request );

        // Start by getting the post from the reference id
        $post = get_post( absint( $ref_id ) );

        // Make sure the post still exist
        if ( isset( $post->post_author ) && $post->post_author != $user_id ) {

                // Update
                wp_insert_post( array(
                        'ID'          => $post->ID,
                        'post_author' => $user_id
                ) );

        }

        return $reply;

}

/**
 * Movie Sell Content Filter
 * @version 1.0
 */
function mycred_pro_run_sale_filter_later( $priority ) {

	return 50;

}
add_filter( 'mycred_sell_content_priority', 'mycred_pro_run_sale_filter_later' );
