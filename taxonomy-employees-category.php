<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php //include("inc/banner-tax-products.php"); ?>







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
        
        <?php

            $terms = get_terms('employees-category');
            $theTerm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
            
            // echo("SLUG IS: " . $theTerm->slug);
            // echo("<br>");
            
            // echo("<br>");
            // print_r($terms);


            if(!is_paged())
          {
            the_archive_description( '<div class="category-description">', '</div>' );
          }
            
            foreach( $terms as $term ):
              if($theTerm->slug == $term->slug)
              {
                
               
                    $posts = get_posts(array(
                      'post_type' => 'employees',
                      'orderby' => 'title',
                      'order'   => 'ASC',
                      'tax_query' => array(
                        array(
                        'taxonomy' => $term->taxonomy,
                        'field' => 'term_id',
                        'terms' => get_queried_object_id()
                        )
                        ),
                      //'taxonomy' => $term->taxonomy,
                      'term' => $term->slug,                                 
                      'nopaging' => true, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
                    ));
                      foreach($posts as $post): // begin cycle through posts of this taxonmy
                        //print_r($post);
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        echo "<div class='zebra-stripe'>";
                          echo "<h2>" . $post->post_title ."</h2>";
                          echo "<p>";
                          echo '<img src="' . $featured_img_url .  '" class="img-fluid float-left add-small-margin-right" alt="'.$post->post_title.'" />';
                          echo $post->post_excerpt;
                          echo "</p>";
                          echo "<p class='clearfix'><a href='".get_the_permalink()."'"."class='float-right btn btn-warning text-light add-small-margin-bottom'>Read More</a></p>";
                        echo "</div>";
                      endforeach;
              }
            endforeach;
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
  },
  "hasMap": "https://www.google.com/maps/place/2155+Sandra+Beaujard+Blvd,+Lakeland,+FL+33813/@27.9842448,-81.9195614,17z/data=!3m1!4b1!4m5!3m4!1s0x88dd3f1ca3f9c72f:0x3e5d4254d4bf2860!8m2!3d27.9842448!4d-81.9173727",
   "openingHours": "Mo 08:00-17:00 Tu 08:00-17:00 We 08:00-17:00 Th 08:00-17:00 Fr 08:00-17:00",
  "telephone": "2516430934"
}
</script>
    <?php include("inc/footer.php"); ?>
