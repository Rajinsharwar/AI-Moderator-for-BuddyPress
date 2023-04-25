<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Define the function that will display the plugin settings page
function ai_moderator_for_buddypress_settings_page()
{
    // Check if the user has the necessary permissions
    if ( !current_user_can( 'manage_options' ) ) {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    
    if ( isset( $_POST['submit'] ) ) {
        $moderation_enabled = ( isset( $_POST['moderation_enabled'] ) ? sanitize_text_field( $_POST['moderation_enabled'] ) : 0 );
        update_option( 'ai_moderator_for_buddypress_moderation_enabled', $moderation_enabled );
        $prohibited_words = explode( ',', sanitize_text_field( $_POST['prohibited_words'] ) );
        $prohibited_words = array_map( 'trim', $prohibited_words );
        // Remove whitespace characters from the beginning and end of each word
        update_option( 'ai_moderator_for_buddypress_prohibited_words', $prohibited_words );
        update_option( 'ai_moderator_for_buddypress_openai_api_key', filter_var( $_POST['openai_api_key'], FILTER_SANITIZE_FULL_SPECIAL_CHARS ) );
        echo  '<div class="updated"><p><strong>' . __( 'Settings saved.' ) . '</strong></p></div>' ;
    }
    
    // Get the current settings
    $enable_moderation = get_option( 'ai_moderator_for_buddypress_moderation_enabled', false );
    $prohibited_words = get_option( 'ai_moderator_for_buddypress_prohibited_words', array() );
    $prohibited_words_str = implode( ', ', $prohibited_words );
    $openai_api_key = get_option( 'ai_moderator_for_buddypress_openai_api_key' );
    ?>
    <div class="wrap">
        <h2><?php 
    _e( 'AI Moderator for BuddyPress Settings' );
    ?></h2>
        <form method="post">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="moderation_enabled"><?php 
    _e( 'Enable Moderation' );
    ?></label></th>
                        <td><input type="checkbox" name="moderation_enabled" id="moderation_enabled" value="1" <?php 
    checked( 1, get_option( 'ai_moderator_for_buddypress_moderation_enabled' ) );
    ?>></td>
                        <td class="description">
                            <em><?php 
    _e( 'Check this box to enable moderation of activity posts. NOTE: This plugin won\'t work unless you check this box.' );
    ?></em>
                        </td>
                    </tr>
                    <tr>
                      <th scope="row"><label for="ai_model"><?php 
    _e( 'AI Model' );
    ?></label></th>
                      <?php 
    ?>
                    <td>
                      <select name="ai_model" id="ai_model">
                        <option value="text-babbage-001" <?php 
    selected( get_option( 'ai_moderator_for_buddypress_ai_model', 'text-babbage-001' ), 'text-babbage-001' );
    ?>><?php 
    _e( 'Text Babbage 001' );
    ?></option>
                        <option value="text-curie-001" <?php 
    disabled( true, true );
    ?>><?php 
    _e( 'Text Curie 001' );
    ?> (<?php 
    _e( 'For Pro users only' );
    ?>)</option>
                        <option value="text-davinci-003" <?php 
    disabled( true, true );
    ?>><?php 
    _e( 'Text Davinci 003' );
    ?> (<?php 
    _e( 'For Pro users only' );
    ?>)</option>
                      </select>
                    </td>
                <?php 
    ?>
                      <td class="description">
                        <em><?php 
    _e( 'Select the AI model to use for sending requests to OpenAI. ' );
    ?></br><a href="https://rajinsharwar.github.io/ai-moderator-bp-&-bb/#open-ai-model-selection" target="_blank">Learn more</a></em>
                      </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="prohibited_words"><?php 
    _e( 'Prohibited Words' );
    ?><span style="color: red;">*</span></label></th>
                        <td><input type="text" name="prohibited_words" id="prohibited_words" value="<?php 
    echo  esc_attr( $prohibited_words_str ) ;
    ?>" class="regular-text" required></td>
                        <td class="description">
                            <em><?php 
    _e( 'Enter a comma-separated list of words that you don\'t in your site. ' );
    ?></br><p> For Example: stupid, dumb, bitch</p><a href="https://rajinsharwar.github.io/ai-moderator-bp-&-bb/#prohibited-words" target="_blank">Learn more</a></em>
                        </td>
                    </tr>
                    <?php 
    ?>
                    <tr>
                        <th scope="row"><label for="ai_moderator_for_buddypress_ai_hint"><?php 
    _e( 'Use prohibited words as a hint to AI?' );
    ?></label></th>
                        <td>
                            <input type="checkbox" name="ai_moderator_for_buddypress_ai_hint" id="ai_moderator_for_buddypress_ai_hint" value="1" disabled>
                            <label for="ai_moderator_for_buddypress_ai_hint"><strong><i>For Pro users only</i></strong></label>
                        </td>
                        <td class="description">
                            <em><?php 
    _e( 'Check this box if you want to use prohibited words as a hint to AI.' );
    ?></em>
                        </td>
                    </tr>
                <?php 
    ?>                
                    <tr>
                        <th scope="row"><label for="openai_api_key"><?php 
    _e( 'OpenAI API Key' );
    ?><span style="color: red;">*</span></label></th>
                        <td><input type="text" name="openai_api_key" id="openai_api_key" value="<?php 
    echo  esc_attr( $openai_api_key ) ;
    ?>" class="regular-text" required></td>
                        <td class="description">
                            <em><?php 
    _e( 'Enter Your OPENAI API key. ' );
    ?></br><a href="https://rajinsharwar.github.io/ai-moderator-bp-&-bb/#open-ai-api-key" target="_blank">Learn more</a></em>
                        </td>
                    </tr>
                    <?php 
    ?>
                    <tr>
                      <th scope="row">
                        <label for="notification_text"><?php 
    _e( 'Notification Text' );
    ?><span style="color: red;">*</span></label>
                      </th>
                      <td>
                        <input type="text" name="notification_text" id="notification_text" value="<?php 
    echo  esc_attr( get_option( 'ai_moderator_for_buddypress_notification_text', 'Your post has been marked as spam. Please review your content to ensure that it meets our community guidelines.' ) ) ;
    ?>" class="regular-text" disabled>
                        <p><em><strong>For Pro users only</strong></em></p>
                      </td>
                      <td class="description">
                        <em><?php 
    _e( 'Enter the content of the notification that will be sent to the user when their post is marked as spam.' );
    ?></em>
                      </td>
                    </tr>
                <?php 
    ?>
                    <tr>
                        <th scope="row"><label for="post_policy_url"><?php 
    _e( 'Notification URL' );
    ?></label></th>
                        <td>
                            <input type="text" name="post_policy_url" id="post_policy_url" value="" class="regular-text" disabled>
                            <p><em><strong>For Pro users only</strong></em></p>
                        </td>
                        <td class="description">
                            <em><?php 
    _e( 'Enter the URL for the notification sent to the user when a post has been marked as SPAM.' );
    ?></em>
                        </td>
                    </tr>
                <?php 
    ?>
                </tbody>
            </table>
            <?php 
    submit_button();
    ?>
        </form>
    </div>
    <?php 
}
