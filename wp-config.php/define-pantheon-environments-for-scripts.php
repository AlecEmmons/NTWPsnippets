 if ( in_array( $_ENV['PANTHEON_ENVIRONMENT'], array('live') ) && ! defined( 'IS_PANTHEON_LIVE' ) ) :
      define('IS_PANTHEON_LIVE', true);
    endif;
    
    if ( in_array( $_ENV['PANTHEON_ENVIRONMENT'], array( 'dev', 'test' ) ) && ! defined( 'IS_PANTHEON_DEV_TEST' ) ) :
      define('IS_PANTHEON_DEV_TEST', true);
    endif;
