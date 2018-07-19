<!-- // this query finds the parent category of the current cateogry and lists -->
<?php

function query_get_sibling_posts() {
      $this_post_ID = $post->ID;
      $cat_ID = array_pop(wp_get_post_terms($post->ID, 'category', array("fields" => "ids")));
      $categories = get_categories(
      array( 
          'term_taxonomy_id' => $cat_ID
        )
      );
      $parent_ID = $categories[0]->parent;
      $parent_children = get_categories(
      array( 
          'child_of' => $parent_ID
        )
      );
      $family_size = count($parent_children);
      if ($family_size <= 2) {
        $cousin_categories = get_categories(
        array( 
            'term_taxonomy_id' => $parent_ID
          )
        );
        $cousin_ID = $cousin_categories[0]->parent;
        $cousins = get_categories(
        array( 
            'child_of' => $cousin_ID
          )
        );
          $parent_children = $cousins;
      }
    }
?>