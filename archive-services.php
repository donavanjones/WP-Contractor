<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/banner-services.php"); ?>







<br class="clearfix">

    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <?php
  if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<div class="row"><p id="breadcrumbs">','</p></div>' );
  }
  ?>


      <div id="content">
      <div class="row">
        <div class="col-sm-12">
        <h1>Water Purification Services</h1>
        </div>
        <div class="col-sm"><img class="alignnone img-fluid" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/01/water-purification-services-1024x1024.jpg" alt="home water purification services" width="1200" height="1200" />
        <p>As one of the leading water purification companies in Florida, we have an experienced team of technicians to provide <strong>water purification services</strong> for system to ensure the solution you choose is running effectively at your home. Florida Water Analysis service technicians are trained to operate, maintain and troubleshoot all types of water purification systems.</p>
        </div>
        <div class="col-sm">
        <div class="container basic-container">
        <div class="row-fluid">
        <h3>Professional Services</h3>
        <p><img class="img-fluid float-left add-small-margin-right add-small-margin-bottom" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/01/plumber-clipboard.jpg" alt="Professional Water Purification Tech" width="150" height="150" />Our experienced team of technicians will provide professional water purification services for your system to ensure it is running at peak performance at your home.</p>
        </div>
        <div class="row-fluid clearfix">
        <h3>Save Time</h3>
        <p><img class="img-fluid float-left add-small-margin-right add-small-margin-bottom" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/01/save-time.jpg" alt="save time" width="150" height="150" />All of our technicians have many years of water purification service experience. This allows them to work efficiently thus saving you time.</p>
        </div>
        <div class="row-fluid">
        <h3>Peace Of Mind</h3>
        <p><img class="img-fluid float-left add-small-margin-right add-small-margin-bottom" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/01/woman-yoga.jpg" alt="woman doing yoga, peace of mind" width="150" height="150" />By using our water purification services you will be ensured that you have clean and safe water for many years to come.</p>
        </div>
        </div>
        </div>
        </div>
        
        <?php
            $taxonomy = 'services-category';
            $terms = get_terms($taxonomy, array(
              'hide_empty' => false,
              'orderby' => 'title',
              'order'   => 'ASC',
          )); // Get all terms of a taxonomy
           
          

        ?>
        <?php
            $row_one = array_slice($terms, 0, 4);
            if ( $row_one && !is_wp_error( $row_one ) ) :
              ?>
                      <div class="card-deck text-center">
                        <?php foreach ( $row_one as $term_one ) { ?>
                        <?php 
                          $term_one_id = $term_one->term_id;
                          $image_id = get_term_meta ( $term_one_id, 'category-image-id', true );
                          $the_image = wp_get_attachment_image_src ( $image_id, 'large' )[0];
                          //print_r($term_one->description);
                        ?>
                        <a href="<?php echo get_term_link($term_one->slug, $taxonomy); ?>">
                          <div class="card mb-2 box-shadow hover">
                            <div class="card-header">
                              <h2 class="text-light my-0"><?php echo $term_one->name; ?></h2>
                            </div>
                            <div class="card-body" style="padding: 0;"><img class="img-fluid alignnone" src="<?php echo $the_image; ?>" alt="<?php echo $term_one->name ?>" />
                            <p class="btn btn-warning text-light" style=" margin-top: 2%;">View Services</p>
                            </div>
                            </a>
                          </div>
                        <?php } ?>
                      </div>
              <?php endif;//row_one
        ?>
<?php fwa_pagination(); ?>

<h3>If you are looking for a water purification company in Florida, then please call <u><strong><em><a href="tel:863-662-5570" class="text-light h5">863-662-5570</a></em></strong></u> or complete our <u><strong><em><a href="https://www.floridawateranalysis.com/contact-us/" class="text-light h5">online request form.</a></em></strong></u></h3>

<?php //include("inc/why-us.php"); ?>


<?php //include("inc/lets-get-started.php"); ?>


        <br>

      </div>



<!--<h4 class="make-bold">If like to know more about Florida Water Analysis, please call (863) 662-5570 or complete our <a href="https://www.floridawateranalysis.com/contact-us/">online request</a> form.</h4>-->
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
