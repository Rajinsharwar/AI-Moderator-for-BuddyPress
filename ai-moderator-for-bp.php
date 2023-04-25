<?php

/**
 * Plugin Name: AI Moderator for BuddyPress and BuddyBoss
 * Plugin URI: https://rajinsharwar.github.io/ai-moderator-bp-&-bb
 * Description: Automatically moderates your BuddyPress and BuddyBoss powered activity feed posts. Backed-up by OPEN AI.
 * Version: 1.0
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * License: GPL2
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( function_exists( 'ai_mod_bp_bb_track' ) ) {
    ai_mod_bp_bb_track()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'ai_mod_bp_bb_track' ) ) {
        // Create a helper function for easy SDK access.
        function ai_mod_bp_bb_track()
        {
            global  $ai_mod_bp_bb_track ;
            
            if ( !isset( $ai_mod_bp_bb_track ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/libs/start.php';
                $ai_mod_bp_bb_track = fs_dynamic_init( array(
                    'id'             => '12472',
                    'slug'           => 'ai-moderator-for-bp-and-bb',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_bcdcdd0c71cae3da9377a13bee774',
                    'is_premium'     => false,
                    'premium_suffix' => 'Pro',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug'       => 'ai-moderator-for-buddypress',
                    'first-path' => 'admin.php?page=ai-moderator-for-buddypress',
                    'support'    => false,
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $ai_mod_bp_bb_track;
        }
        
        // Init Freemius.
        ai_mod_bp_bb_track();
        // Signal that SDK was initiated.
        do_action( 'ai_mod_bp_bb_track_loaded' );
    }
    
    // Redirect Admin on plugin Activation
    function ai_moderator_for_buddypress_redirect_admin( $plugin )
    {
        if ( $plugin == plugin_basename( __FILE__ ) ) {
            // Redirect to the admin page
            exit( wp_redirect( admin_url( 'admin.php?page=ai-moderator-for-buddypress' ) ) );
        }
    }
    
    add_action( 'activated_plugin', 'ai_moderator_for_buddypress_redirect_admin' );
    require plugin_dir_path( __FILE__ ) . 'admin/admin-menu-render.php';
    require plugin_dir_path( __FILE__ ) . 'admin/admin-settings-render.php';
    require plugin_dir_path( __FILE__ ) . 'inc/register-notifications.php';
    require plugin_dir_path( __FILE__ ) . 'inc/moderate.php';
    require plugin_dir_path( __FILE__ ) . 'inc/cron.php';
    require plugin_dir_path( __FILE__ ) . 'inc/uninstall.php';
}
