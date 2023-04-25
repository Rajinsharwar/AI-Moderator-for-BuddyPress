<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Register custom component
 *
 * @since 1.0.0
 *
 * @param array $component_names
 *
 * @return array
 */
function aimod_buddyboss_notifications_register_notifications_component( $component_names = array() )
{
    // Force $component_names to be an array
    if ( !is_array( $component_names ) ) {
        $component_names = array();
    }
    // Add the custom component
    array_push( $component_names, 'ai_buddyboss_notifications' );
    return $component_names;
}

add_filter( 'bp_notifications_get_registered_components', 'aimod_buddyboss_notifications_register_notifications_component' );
function aimod_buddyboss_notifications_format_notifications(
    $content,
    $item_id,
    $secondary_item_id,
    $action_item_count,
    $format,
    $component_action_name,
    $component_name,
    $id
)
{
    // Bail if not is our component
    if ( $component_action_name !== 'ai_buddyboss_notifications' ) {
        return $content;
    }
    $user_id = get_current_user_id();
    /**
     * Filter to override the notification content for this item
     *
     * @since 1.0.0
     *
     * @param string  $content
     * @param int   $user_id
     * @param int   $post_id
     * @param int   $user_earning_id
     *
     * @return string
     */
    $content = sprintf( __( 'Your post has been marked as spam. Please review your content to ensure that it meets our community guidelines', 'my-textdomain' ) );
    return $content;
}

add_filter(
    'bp_notifications_get_notifications_for_user',
    'aimod_buddyboss_notifications_format_notifications',
    10,
    8
);