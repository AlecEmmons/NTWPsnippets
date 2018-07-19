// twitter inline enqueue

define('TWITTER', true);

if (defined('TWITTER')) { 
    function twitter_sdk() {
        wp_enqueue_script('twitter_sdk', 'https://platform.twitter.com/widgets.js');
    } 

    add_action('wp_enqueue_scripts', 'twitter_sdk', 1); 

}
    function twitter_sdk_inline() {
        if (wp_script_is('twitter_sdk', 'done')) {
     ?> 
     <script type="text/javascript">
        try {

        } 
        catch (e) { }
    </script> 
<?php } } 

add_action('wp_head', 'twitter_sdk_inline');