<?php
  //global $post;
  //echo $post->ID;

  $banner_pc_image =  get_post_meta($post->ID, 'banner-pc', true);
  $banner_mobile_image =  get_post_meta($post->ID, 'banner-mobile', true);

  if( !is_page(array( 38, 22, 24, 26, 28, 30, 32, 34, 36, 1598, 1638, 1648, 1652, 1654 ))  )
  {
      if(!is_tag( '64' ))
      {
      echo '<div class="container-fluid d-none d-sm-block" style="padding-Left:0;padding-right:0">';
        echo '<div class="">';
          echo '<div id="" class="">';
              echo '<a href="https://www.eaglewater.net/contact-us/"><img src="'.$banner_pc_image.'" alt="water treatment banner" width="2500" class="img-fluid"></a>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    }
  }

  if( !is_page(array( 38, 22, 24, 26, 28, 30, 32, 34, 36, 1598, 1638, 1648, 1652, 1654 ))  )
  {
    if(!is_tag( '64' ))
    {
    echo '<div class="container-fluid d-sm-none" style="padding-Left:0;padding-right:0">';
      echo '<div class="">';
        echo '<div id="" class="">';
            echo '<a href="https://www.eaglewater.net/contact-us/"><img src="'.$banner_mobile_image.'" alt="water treatment banner" width="2500" class="img-fluid"></a>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
    }
  }
?>
