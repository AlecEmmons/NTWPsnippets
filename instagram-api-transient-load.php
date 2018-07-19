<h1 class="container fff text-center fancy-text2 text-l1"> Find Driftr on Instagram</h1>

<?php

function instagram_feed( $count ) {
  $ig_token = '{{IG_TOKEN}}'; 
  $ig_user_id = '{{IG_USER_ID}}';
  $ig_client = '{{IG_CLIENT}}';

  $token_id   =  $ig_token;
  $client_id   = $ig_client;
  $instagram_id = $ig_user_id;

  if ( false === ( $feed = get_transient( 'instagram_feed' ) ) ) {
    $url      = 'https://api.instagram.com/v1/users/' . $instagram_id . '/media/recent/?count=' . $count . '&access_token=' . $token_id . '&client_id=' . $client_id;
    $response = wp_remote_get( $url );
  
    $body = json_decode( $response['body'] );
    $feed = $body->data;

    set_transient( 'instagram_feed', $feed, 24 * HOUR_IN_SECONDS );
  }
  return $feed;
}


?>

<?php
  if ( wp_is_mobile() ) {
    $ig_count = '6';
    $counter_count = '6';
  } else {
    $ig_count = '10';
    $counter_count = '10';
  }



  $feed = instagram_feed( $ig_count);


  if ( $feed ) {
      foreach ( $feed as $data ) {
        echo '<a id="media-' . $data->id . '" target="_blank" rel="noopener" href="' . $data->link . '" class="bezier1  type-image" ><img class="lazy-ig" data-src="' . $data->images->standard_resolution->url . ' title="'. $data->caption->text . '" width="' . $data->images->standard_resolution->width . '" height="' . $data->images->standard_resolution->height . '" data-srcset="' . $data->images->standard_resolution->url . ' 768w, ' . $data->images->thumbnail->url . ' 300w"></a>';

     }
  }
?>
