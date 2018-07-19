$ACFImageID = get_field('ACF_image');
$ACFImgURL = wp_get_attachment_image_url($ACFImageID, 'full');
$ACFImgSrcURL = wp_get_attachment_image_srcset( $ACFImageID, 'large' );
$ACFImg_meta = wp_prepare_attachment_for_js($ACFImageID);
$ACFImg_title    = $ACFImg_meta['title'] == '' ? : $ACFImg_meta['title'];
$ACFImg_alt      = $ACFImg_meta['alt'] == '' ? $ACFImg_title : $ACFImg_meta['alt'];


<img class="opacity-80 lazy" 
data-src="{{ $ACFImgURL }}"
data-srcset="{{ $ACFImgSrcURL }}"
alt="{{ $ACFImg_alt }}"
>