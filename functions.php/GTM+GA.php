// NOTE: this is set up for the pantehon multidev environment. Only works when combined with wp-config "define pantheon environments" snippet

// google tag manager + analytics inline
if(defined( 'IS_PANTHEON_LIVE' )) {
    define('GOOGLETM', 'GTM-T49RMKQ');
    define('GOOGLEANALYTICS', 'UA-110395628-4');
} elseif(defined( 'IS_PANTHEON_DEV_TEST' )) {
    define('GOOGLETM', 'GTM-PGSWSDB');
    define('GOOGLEANALYTICS', 'UA-110395628-1');
}

if (defined('GOOGLETM')) { 

    function googletm_inline() {
     ?> 
     <script ajax type="text/javascript">
        try {    
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer', <?php echo GOOGLETM; ?>);
        } 
        catch (e) { }
    </script>

    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo GOOGLETM;?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

<?php } 

    add_action('wp_head', 'googletm_inline');
}


if (defined('GOOGLEANALYTICS')) {

    function googleANALYTICS() {

        wp_enqueue_script('googleanalytics', 'https://www.googletagmanager.com/gtag/js?id='. GOOGLEANALYTICS); }

        add_action('wp_enqueue_scripts', 'googleANALYTICS', 1); 

    function googleanalytics_inline() {
    if (wp_script_is('googleanalytics', 'done')) {
     ?> 
     <script ajax type="text/javascript">
        try {   
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo GOOGLEANALYTICS; ?>');
        } 
        catch (e) { }
    </script> 

<?php } }

    add_action('wp_head', 'googleanalytics_inline');
}
