<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/banners/home.php"); ?>







<?php


        if($dj_web_media["layout-type"] == 1)
                {
                  echo("<div class='container-fluid'>");
                }

                if($dj_web_media["layout-type"] == 2)
                {
                  echo("<div class='container body-container mb-5 mt-5'>");
                }
        ?>
      <div class="row">
      <div class="col-md-12">
        <?php
  if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<div class="row"><p id="breadcrumbs">','</p></div>' );
  }
  ?>


      <div id="content">
        <?php //include("inc/banner-blog-home.php"); ?>
        <?php
        //if(!is_paged())
      //  {
      //    echo '<p>The blog feed</p>';
      //  }
      echo '<h1>Marketing Tips For The Home Improvement Industry</h1>';
            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post();
                $title = get_the_title();
                $theContent = wp_trim_words( get_the_content(), 150, '...' );
                //$theContent = get_the_excerpt();
                echo "<div class='excerpt zebra-stripe'>";
                    echo "<h2>" . $title ."</h2>";
                    echo "<p>";
                      echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'float-left add-small-margin-right' ) );
                      echo $theContent;
                    echo "</p>";
                    echo "<p class='clearfix'><a href='".get_the_permalink()."'"."class='float-right btn btn-warning text-light add-small-margin-bottom'>Read More</a></p>";
                echo "</div>";
            	} // end while
            } // end if
        ?>
<?php fwa_pagination(); ?>




        <br>

      </div>



<!--<h4 class="make-bold">If like to know more about Florida Water Analysis, please call (863) 662-5570 or complete our <a href="https://www.eaglewater.net/contact-us.php">online request</a> form.</h4>-->
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
