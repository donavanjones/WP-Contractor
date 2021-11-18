<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/banners/contaminants-archive-banner.php"); ?>







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
  if ( function_exists('yoast_breadcrumb')  && ($dj_web_media["show-breadcrumbs"] == 1)) {
    yoast_breadcrumb( '<div class="row"><p id="breadcrumbs">','</p></div>' );
  }
  ?>
<?php
      if ( $dj_web_media["show-count-down-timer"] == 1 ) 
      {
          echo '<div class="row">';
          echo '<div class="highlight-box-no-radius mt-0 pb-5">';
          echo ' <div class="container text-center">';
          echo '<p class="h1 count-down-timer-title">There Are 2 Spots Still Available Today:</p>';
          echo '<div id="timer_header"></div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
    }
      ?>



<?php
            $taxonomy = 'water-utility';
            $terms = get_terms($taxonomy, array(
              'hide_empty' => false,
              'orderby' => 'title',
              'order'   => 'ASC',
          )); // Get all terms of a taxonomy
           
          

        ?>
        
                      <div class="card-deck text-center">
                        <?php foreach ( $terms as $term ) { ?>
                        <?php 
                          $term_id = $term->term_id;
                          $image_id = get_term_meta ( $term_id, 'category-image-id', true );
                          $the_image = wp_get_attachment_image_src ( $image_id, 'large' )[0];
                        ?>

                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xm-12 mb-4">
                            <div class="border hover-box mb-4'">
                              <h2 class="card-title text-center card-title-bg p-2 d-flex justify-content-center align-items-center align-self-center mt-0 mb-0" style='min-height: 80px;'><?php echo $term->name; ?></h2>
                            
                            <div class="card-body" style="padding: 0;"><img class="img-fluid alignnone" src="<?php echo $the_image; ?>" alt="<?php echo $term->name ?>" />
                            <p class="btn btn-warning text-light" style=" margin-top: 2%;">View Utility</p>
                            </div>
                            </div>
                            </a>









                          </div>
                        <?php } ?>
                      </div>
              




      </div>



<!--<h4 class="make-bold">If like to know more about Florida Water Analysis, please call (863) 662-5570 or complete our <a href="https://www.floridawateranalysis.com/contact-us/">online request</a> form.</h4>-->
</div>
<?php
  if ( $dj_web_media["show-count-down-timer"] == 2 ) 
  {
      echo '<div class="row">';
      echo '<div class="highlight-box-no-radius mt-0 pb-5">';
      echo ' <div class="container text-center">';
      echo '<p class="h1 count-down-timer-title">There Are 2 Spots Still Available Today:</p>';
      echo '<div id="timer_header"></div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
}
  ?>


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
  }
}
</script>
    <?php include("inc/footer.php"); ?>
