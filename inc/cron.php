<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function ai_mod_for_bp_schedule_moderation_check( $activity ) {
    $moderation_enabled = get_option('ai_moderator_for_buddypress_moderation_enabled');
    if ( intval($moderation_enabled) === 0 ){
        return;
    }
    
    $is_spam = $activity->is_spam;

    // Check if the activity post has already been marked as spam
    if ( $is_spam ) {
        return;
    }
    
    $scheduled = wp_next_scheduled( 'ai_moderator_check', array( $activity ) );
    if ( $scheduled === false ) {
        wp_schedule_single_event( time() + 30, 'ai_moderator_check', array( $activity ) );
    }
}

add_action( 'bp_activity_after_save', 'ai_mod_for_bp_schedule_moderation_check', 10, 1 );