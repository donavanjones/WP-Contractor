<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>










<br class="clearfix">

    <div class="container body-container">
      <div class="row">
      <div class="col-md-12">
        <?php
  if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<div class="row"><p id="breadcrumbs">','</p></div>' );
  }
  ?>

        <?php
            if ( have_posts() ) {
              while ( have_posts() ) {
                the_post();
                $title = get_the_title();
                $theLink = get_the_permalink();
                $category = get_the_category();
                $firstCategory = $category[0]->cat_name;
                $category_id = get_cat_ID( $firstCategory );
                $cat_link = get_category_link($category_id);
                $obj_id = get_queried_object_id();
                $current_url = get_permalink( $obj_id );
                $post_date = get_the_date( 'F j, Y' );
                $author_profile_image = get_avatar( get_the_author_meta('user_email'), $size = '150');
      echo '<div id="content">';
                //echo "<h1>" . $title ."</h1>";
                echo '<p><i class="far fa-calendar-alt"></i> <strong>Written by:</strong> '.get_author_name().' <strong>on '.$post_date.'</strong></p>';
                //echo '<h1>'.$title.'</h1>';
                the_content();
            	} // end while
            } // end if
            echo '<div class="fb-like" data-href="'.$current_url.'" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>';
            //echo '<p>&nbsp;</p>';
        ?>
        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
            <div id="secondary" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>
        <?php endif; ?>
        <br>



        <div class="highlight-box recent-articles">
        <h2 class="no-background no-padding no-margin-top">Recent <?php echo $firstCategory; ?> Articles</h2>
        <?php
              $args = array(
              'post__not_in' => array($post->ID),
              'post_type' => 'post',
              'post_status' => 'publish',
              'category_name' => $firstCategory,
              'posts_per_page' => 2,
              );
              $arr_posts = new WP_Query( $args );

              if ( $arr_posts->have_posts() )
              {

              while ( $arr_posts->have_posts()) :
                  $arr_posts->the_post();
                  ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <h5 class="entry-title"><?php the_title(); ?></h5>
                      <div class="entry-content">
                          <?php
                          $thumb_id = get_post_thumbnail_id();
                          $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail', true);
                              echo "<p class='excerpt'><img src=$thumb_url[0] class='img-fluid float-left add-small-margin-right' alt='".get_the_title()."' width='".$thumb_url[1]."' height='".$thumb_url[2]."'>". wp_trim_words( get_the_content(), 50 ). "</p>";
                          ?>
                          <br>
                          <p class="clearfix"><a href="<?php the_permalink(); ?>" class="float-right btn btn-warning text-light btn-sm add-small-margin-bottom">Read More</a></p>
                      </div>
                  </article>
                  <?php
              endwhile;
            }else{
              echo '<p>Sorry no posts yet. Check back soon!</p>';
            }
         ?>
       </div>



<?php //comments_template(); ?>


      <div class="row author-box">
          <div class="col-lg-3 col-md-12">
                  <?php
                      echo $author_profile_image;
                  ?>
            </div>

            <div class="col-lg-9 col-md-12">
                <p class="h4">About <?php echo get_author_name(); ?></p>
                <p><?php echo the_author_meta( 'description', $userId);  ?></p>
                <p>
                  <!--<a href="https://www.facebook.com/donavan.jones.75" style="color:#fff;font-size:2em;"><i class="fab fa-facebook-square"></i></a>-->
                  <!--<a href="https://www.linkedin.com/in/donavanjones/" style="color:#fff;font-size:2em;margin-left:1%;"><i class="fab fa-linkedin"></i></a>-->
                  <!--<a href="http://www.djwebmedia.com/" style="color:#fff;font-size:2em;margin-left:1%;"><i class="far fa-address-card"></i></a>-->
                </p>
            </div>
      </div>


      </div>
<!--<h4 class="make-bold">If like to know more about Florida Water Analysis, please call (863) 662-5570 or complete our <a href="https://www.eaglewater.net/contact-us/">online request</a> form.</h4>-->
</div>



<?php //include("inc/sidebar.php"); ?>
</div>
</div>

<?php
/* get a specific post object by ID */
global $post;
global $wp;

/* grab the url for the full size featured image */
if(isset($featured_img_url))
{
  $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
}
else{
  $featured_img_url = "https://djwebmedia.com/wp-content/themes/fwa/images/logo.jpg";
}
$post_slug = $post->post_name;
$post_desc =  get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); 

$url =  home_url( $wp->request );
$url .= "/";
?>
<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "ProfessionalService",
  "name": "DJ Web Media",
  "url": "<?php echo $url; ?>",
  "sameAs": [
     "https://www.facebook.com/DJWebMedia"
  ],
  "logo": "https://djwebmedia.com/wp-content/themes/fwa/images/logo.jpg",
  "priceRange": "$",
  "image": "<?php echo $featured_img_url; ?>",
  "description": "<?php echo $post_desc; ?>",
  "address": {
     "@type": "PostalAddress",
     "streetAddress": "2155 Sandra Beaujard Blvd Apt 108",
     "addressLocality": "Lakeland",
     "addressRegion": "FL",
     "postalCode": "33813",
     "addressCountry": "United States"
  },
  "geo": {
     "@type": "GeoCoordinates",
     "latitude": "27.98408371802175",
     "longitude": "-81.91932535137747"
  },
  "hasMap": "https://www.google.com/maps/place/2155+Sandra+Beaujard+Blvd,+Lakeland,+FL+33813/@27.9842448,-81.9195614,17z/data=!3m1!4b1!4m5!3m4!1s0x88dd3f1ca3f9c72f:0x3e5d4254d4bf2860!8m2!3d27.9842448!4d-81.9173727",
   "openingHours": "Mo 08:00-17:00 Tu 08:00-17:00 We 08:00-17:00 Th 08:00-17:00 Fr 08:00-17:00",
  "telephone": "2516430934"
}
</script>
    <?php include("inc/footer.php"); ?>
