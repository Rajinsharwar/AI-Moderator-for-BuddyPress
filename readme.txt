=== AI Moderator for BuddyPress ===
Contributors: rajinsharwar
Tags: ai, openai, buddypress, buddyboss, moderation, ai bot, bot
Requires at least: 3.9
Tested up to: 6.2
Requires PHP: 5.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
AI Moderator for BuddyPress is a WordPress plugin that uses OpenAI to automatically moderate your activity feed posts from BuddyPress and BuddyBoss.

== HOW DOES IT WORKS? ==
IMPORTANT: In order to use this plugin, you will need to provide your own OpenAI API key as this is a Bring-Your-Own-Key (BYOK) plugin.

Ready to use cutting-edge AI technology to put your community's moderation in auto-pilot mode? Here's what you need to do:

1. To begin, head to [OpenAI’s official platform website](https://platform.openai.com/). If you haven’t already, create an account following the simple steps on the website. After that, you can enter the email address and password linked to your OpenAI account to sign in or log in with an existing Google or Microsoft account.

2. Once you’ve created an account or have logged into an existing account, you’ll see your name and your profile icon at the top-right corner of OpenAI’s platform homepage.

3. To get an API Key, click on your name in the top-right corner to bring up a dropdown menu. Then, click the “[View API keys](https://platform.openai.com/account/api-keys)” option. 

4. At this point, you’ll be on a page that has an option to “Create new secret key” near the center. If you do not have an API key, click this button to get one. Make sure to save the API key as soon as possible. Once the window showing it closes, you won’t be able to reopen it. 

5. Now, you can follow the [documentation of the plugin](https://rajinsharwar.github.io/ai-moderator-bp-&-bb/) to learn further on how to use the API key, and the plugin.

## Is an OpenAI API Key Free?

You can create an OpenAI API key for free. New free trial users receive $5 (USD) worth of credit. However, this expires after three months. Once your credit has been used up or expires, you can enter billing information to continue using the API of your choice. Keep in mind that if you don’t enter any billing information, you will still have login access but won’t be able to make further API requests.

OpenAI enforces rate limits at the organization level; if you’re using their tools for business, you’ll have to pay depending on a few factors. Rate limits are measured in two ways: RPM (requests per minute) and TPM (tokens per minute).

If you’re looking for specific costs based on the AI model you want to use (for example, GPT-4 or gpt-3.5-turbo, as used in ChatGPT), check out OpenAI’s AI model pricing page. In many cases, the API could be much cheaper than a paid ChatGPT Plus subscription—though it depends how much you use it. For a complete overview of exact rate limits, examples, and other helpful information, visit OpenAI’s Rate Limits page.

== Frequently Asked Questions ==

= Can I use this plugin without access to OpenAI API Key? =

No, you can't. You must sign up for an account at [OpenAI](https://beta.openai.com) to get the respective API key in order to use this plugin.

= What data of mine does get shared with OpenAI? =

None of your personal data, such as you WordPress email, or username gets shared with OpenAI. Only, the contents that are sent for moderation gets sent to OpenAI as a prompt. After that, it's upto OpenAI regarding how they use the contents in that prompt. Learn more about the [Terms of service](https://openai.com/policies/terms-of-use), and [Privacy Policy](https://openai.com/policies/privacy-policy) of openAI.

== Installation ==
1. Upload the 'ai-moderator-for-buddypress' folder to the /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to 'AI Moderator' in the BuddyPress admin menu and configure the plugin settings

== Features ==
<ol> Moderates activity feed posts using OpenAI. </ol>
<ol> Allows you to enable or disable moderation of activity posts. </ol>
<ol> Allows you to choose the AI model to use for sending requests to OpenAI. </ol>
<ol> Allows you to define a list of prohibited words that will trigger moderation. </ol>
<ol> Allows you to set an OpenAI API key for sending requests to OpenAI. </ol>
<ol> Allows you to define the notification message that will be displayed to users whose posts have been moderated </ol>
<ol> Allows you to set an URL to the notification that will be sent to the user when his post will be marked as spam. </ol>

== Configuration ==
To configure the plugin, go to 'AI Moderator' in the BuddyPress admin menu. Here, you can enable or disable moderation, choose the AI model to use, define the list of prohibited words, set the OpenAI API key, set the post policy URL, and define the notification message.

Note: This plugin won't work unless you enable moderation check.

== Credits ==
AI Moderator for BuddyPress was developed by Rajin Sharwar.

== License ==
AI Moderator for BuddyPress is licensed under the GPL2.
