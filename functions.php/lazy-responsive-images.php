

add_image_size( 'thumbnail@1.5x', 225, 225 );
add_image_size( 'medium@1.5x', 450, 450 );
add_image_size( 'large@1.5x', 1536, 1536 );

add_image_size( 'medium@2x', 600, 600 );
add_image_size( 'large@2x', 2048, 2048 );

add_image_size( 'medium@3x', 900, 900 );


function add_responsive_class($content){

        
            $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
            $document = new DOMDocument();
            libxml_use_internal_errors(true);
            
            if (!($content == "")) {

            
            $document->loadHTML(utf8_decode($content));

            $imgs = $document->getElementsByTagName('img');
            if (isset($imgs)) {
                foreach ($imgs as $img) {           
                    $existing_class = $img->getAttribute('class');
                    $src = $img->getAttribute('src');
                    $srcset = $img->getAttribute('srcset');
                    $img->setAttribute('class', "lazy $existing_class");
                    $img->setAttribute('style', "display: none;");
                    $img->removeAttribute('src');
                    $img->removeAttribute('srcset');
                    $img->setAttribute('data-src', "$src");
                    $img->setAttribute('data-srcset', "$srcset");
                }
            }

            $html = $document->saveHTML();
            return $html;   
        }
}

add_filter ('the_content', 'add_responsive_class');
