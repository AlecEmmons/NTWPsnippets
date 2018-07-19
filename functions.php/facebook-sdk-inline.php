//facebook inline

define('FBOOK_APP_ID', '1385258778249441');

if (defined('FBOOK_APP_ID')) { 
    function fbook_sdk() {
        wp_enqueue_script('fbook_sdk', 'https://connect.facebook.net/en_US/sdk.js');
    } 

    add_action('wp_enqueue_scripts', 'fbook_sdk', 1); 

}
    function fbook_sdk_inline() {
        if (wp_script_is('fbook_sdk', 'done')) {
     ?> 
     <script type="text/javascript">
        try {
            window.fbAsyncInit = function() {
              FB.init({
                appId            : '<?php echo FBOOK_APP_ID; ?>',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.11'
              });
            }; 
        } 
        catch (e) { }
    </script> 
<?php } } 

add_action('wp_head', 'fbook_sdk_inline');

