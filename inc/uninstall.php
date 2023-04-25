<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Define the uninstall function
function ai_mod_bp_bb_track_uninstall()
{
    $ai_moderator_options = array( 'ai_moderator_for_buddypress_moderation_enabled', 'ai_moderator_for_buddypress_prohibited_words', 'ai_moderator_for_buddypress_openai_api_key' );
    $options = implode( "', '", $ai_moderator_options );
    global  $wpdb ;
    $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name IN ('{$options}')" );
}

// Hook the uninstall function to the Freemius uninstall action
ai_mod_bp_bb_track()->add_action( 'after_uninstall', 'ai_mod_bp_bb_track_uninstall' );