<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php //include("inc/banner-services.php"); ?>







<br class="clearfix">

    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <?php
  if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<div class="row"><p id="breadcrumbs">','</p></div>' );
  }
  ?>

<div class="row">
<div class="col-sm-12">
<h1>Our Talented &amp; Experienced Team Delivers Amazing Results.</h1>
</div>
<div class="col-sm"><img class="alignnone img-fluid" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/02/the-team.jpg" alt="the team" width="1200" height="1200" />
<p>Florida Water Analysis has grown over the past few years and have built a team dedicated to delivering the highest level of quality and service to our customers. We also strive to maintain a positive and productive work environment. Our team includes:</p>
</div>
<div class="col-sm">
<div class="container basic-container">
<div class="row-fluid">
<h3>Leadership</h3>
<p><img class="aimg-fluid float-left add-small-margin-right add-small-margin-bottom" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/02/business-woman-and-business-team.jpg" alt="learder" width="150" height="150" />The secret to truly successful work isn’t just about technology; it’s about working with the right team.</p>
</div>
<div class="row-fluid clearfix">
<h3>Customer Service</h3>
<p><img class="img-fluid float-left add-small-margin-right add-small-margin-bottom" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/02/handshake.jpg" alt="handshake" width="150" height="150" />Our team is here to help. Do you have any questions? Give us a call today so we can help you understand your water.</p>
</div>
<div class="row-fluid">
<h3>Results</h3>
<p><img class="img-fluid float-left add-small-margin-right add-small-margin-bottom" src="https://www.floridawateranalysis.com/wp-content/uploads/2020/02/results.jpg" alt="results" width="150" height="150" />Our team has a can-do attitude backed up by more than 10 years of experience delivering high-end water purification systems on time and on budget.</p>
</div>
</div>
</div>
</div>


<?php
            $taxonomy = 'employees-category';
            $terms = get_terms($taxonomy, array(
              'hide_empty' => false,
              'orderby' => 'title',
              'order'   => 'ASC',
          )); // Get all terms of a taxonomy
           
          

        ?>
        <?php
            $row_one = array_slice($terms, 0, 2);
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
                            <p class="btn btn-warning text-light" style=" margin-top: 2%;">View Team</p>
                            </div></a>
                          </div>
                        <?php } ?>
                      </div>
              <?php endif;//row_one
        ?>

<?php
            $row_two = array_slice($terms, 2, 4);
            if ( $row_two && !is_wp_error( $row_two ) ) :
              ?>
                      <div class="card-deck text-center">
                        <?php foreach ( $row_two as $term_two ) { ?>
                        <?php 
                          $term_two_id = $term_two->term_id;
                          $image_id = get_term_meta ( $term_two_id, 'category-image-id', true );
                          $the_image = wp_get_attachment_image_src ( $image_id, 'large' )[0];
                          //print_r($term_two->description);
                        ?>
                        <a href="<?php echo get_term_link($term_two->slug, $taxonomy); ?>">
                          <div class="card mb-2 box-shadow hover">
                            <div class="card-header">
                              <h2 class="text-light my-0"><?php echo $term_two->name; ?></h2>
                            </div>
                            <div class="card-body" style="padding: 0;"><img class="img-fluid alignnone" src="<?php echo $the_image; ?>" alt="<?php echo $term_two->name ?>" />
                            <p class="btn btn-warning text-light" style=" margin-top: 2%;">View Team</p>
                            </div></a>
                          </div>
                        <?php } ?>
                      </div>
              <?php endif;//row_two
        ?>

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
  }
}
</script>
    <?php include("inc/footer.php"); ?>
