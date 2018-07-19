function page_has_children($queriedpost) {
  
  if(!empty($queriedpost)) {
        $pages = get_pages('child_of=' . $queriedpost->ID);
    } else {
        global $post;
        $pages = get_pages('child_of=' . $post->ID);
    }
  
  if (count($pages) > 0):
    return true;
  else:
    return false;
  endif;
}