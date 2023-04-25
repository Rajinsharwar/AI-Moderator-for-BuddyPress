<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add the plugin settings page to the BuddyPress admin menu
function ai_moderator_for_buddypress_settings() {
    add_menu_page(
        'AI Moderator for BuddyPress & BuddyBoss',
        'AI Moderator',
        'manage_options',
        'ai-moderator-for-buddypress',
        'ai_moderator_for_buddypress_settings_page',
        'dashicons-code-standards'
    );
}
add_action( 'admin_menu', 'ai_moderator_for_buddypress_settings' );
