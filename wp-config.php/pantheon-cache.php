// Define a special Dir for Pantheon's Cache (if necessary)
    if ( defined( 'PANTHEON_BINDING' ) ):
      define ('PANTHEON_CACHE_DIR', $_SERVER['HOME'] .'/code/wp-content/uploads/');
      
