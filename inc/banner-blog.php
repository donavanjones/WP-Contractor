<?php
    if(get_post_meta($post->ID, 'banner-pc', true))
    {
      $img_pc = get_post_meta($post->ID, 'banner-pc', true);
      $link_pc = 'https://www.eaglewater.net/contact-us/';
    }else{
      $img_pc = "https://www.eaglewater.net/wp-content/themes/fwa/images/banners/slider-blog.jpg";
      $link_pc = 'https://www.eaglewater.net/newsletter/';
    }

    if(get_post_meta($post->ID, 'banner-mobile', true))
    {
      $img_mobile = get_post_meta($post->ID, 'banner-mobile', true);
      $link_mobile = 'https://www.eaglewater.net/contact-us/';
    }else{
      $img_mobile = "https://www.eaglewater.net/wp-content/themes/fwa/images/banners/slider-blog-mobile.jpg";
      $link_mobile = 'https://www.eaglewater.net/newsletter/';
    }
?>




<div class="container-fluid d-none d-sm-block" style="padding-Left:0;padding-right:0">
  <div class="">
    <div id="" class="">
        <a href="<?php echo $link_pc; ?>"><img src="<?php echo $img_pc; ?>" alt="water treatment banner" width="2500" class="img-fluid"></a>
    </div>
  </div>
</div>

<div class="container-fluid d-sm-none" style="padding-Left:0;padding-right:0">
  <div class="">
    <div id="" class="">
        <a href="<?php echo $link_mobile; ?>"><img src="<?php echo $img_mobile; ?>" alt="water treatment banner" width="600" class="img-fluid"></a>
    </div>
  </div>
</div>
