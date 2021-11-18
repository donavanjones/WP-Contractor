<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php //include("inc/banner-services.php"); ?>







<br class="clearfix">

    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <?php
  if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
  }
  ?>


      <div id="content">
        <?php
          echo '<h2>Project Categories</h2>';
        ?>
        <?php
            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post();
                



                //Do something if a specific array value exists within a post
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                // Then you can run a foreach loop to show the taxonomy terms infront.
                foreach($term as $term_single) {
                    print_r($term_single); //do something here
                    echo "<div class='zebra-stripe'>";
                    echo "<h2>" . $term->name ."</h2>";
                    echo "<p>";
                      echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'float-left add-small-margin-right' ) );
                      echo $term_single->description;
                    echo "</p>";
                    echo "<p class='clearfix'><a href='".$term_single->slug."'"."class='float-right btn btn-warning text-light add-small-margin-bottom'>Read More</a></p>";
                echo "</div>";
                }


            	} // end while
            } // end if
        ?>
<?php fwa_pagination(); ?>



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
  $featured_img_url = "https://www.floridawateranalysis.com/wp-content/themes/fwa/images/logo.png";
}
$post_slug = $post->post_name;

$url =  home_url( $wp->request );
$url .= "/";
?>
<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "ProfessionalService",
  "name": "Florida Water Analysis",
  "url": "<?php echo $url; ?>",
  "sameAs": [
     "https://www.facebook.com/FWA.Cares/",
     "https://twitter.com/FWA_Cares",
     "https://www.instagram.com/floridawateranalysis/",
     "https://www.youtube.com/channel/UCT-POyxkXxnZAw1siXiyBag",
     "https://www.pinterest.com/floridawateranalysis/"
  ],
  "logo": "https://www.floridawateranalysis.com/wp-content/themes/fwa/images/logo.png",
  "priceRange": "$$$$",
  "image": "<?php echo $featured_img_url; ?>",
  "description": "Florida Water Analysis is a free water testing and water treatment company that has been serving Florida Homeowners since 2010. Want to know what's in your water? Call Florida Water Analysis for an expert consultation on your drinking and whole home water. The free water testing and information is available for all homeowners in our service area to determine your water quality. Florida Water Analysis is a full-service water treatment company that provides a wide variety of essential services such as Reverse Osmosis Installations (under sink and whole house), Water Softener Installations, Water Conditioner Installations (No Salt systems, in-line carbon filtration), and Well Water Treatment Systems (Iron, Sulfur, Tannins, pH, bacteria, etc.).",
  "address": {
     "@type": "PostalAddress",
     "streetAddress": "119 Avenue D SE",
     "addressLocality": "Winter Haven",
     "addressRegion": "FL",
     "postalCode": "33880",
     "addressCountry": "United States"
  },
  "geo": {
     "@type": "GeoCoordinates",
     "latitude": "28.0173829",
     "longitude": "-81.72611419999998"
  },
  "hasMap": "https://www.google.com/maps/place/Florida+Water+Analysis/@28.0214427,-81.7458411,14z/data=!4m5!3m4!1s0x0:0xe74f3940799d941b!8m2!3d28.01737!4d-81.7261",
   "openingHours": "Mo 08:00-17:00 Tu 08:00-17:00 We 08:00-17:00 Th 08:00-17:00 Fr 08:00-17:00",
  "telephone": "8636625570"
}
</script>
    <?php include("inc/footer.php"); ?>
