@php
	$imgID = get_post_thumbnail_id($post->ID);
	$imgURL = wp_get_attachment_image_url($imgID, 'full');
	$imgsrcURL = wp_get_attachment_image_srcset( $imgID, 'large' );
@endphp

@if ($imgURL) 
            data-src="{{ $imgURL }}"
            data-srcset="{{ $imgsrcURL }}"
@endif