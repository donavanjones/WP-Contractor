<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/banners/products-archive-banner.php"); ?>







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
          if ( function_exists('yoast_breadcrumb')   && ($dj_web_media["show-breadcrumbs"] == 1) ) 
          {
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


      <div id="content">
      <div class="row">
        <div class="col-sm-12">
        <h1><?php echo $dj_web_media["products-archive-title"]; ?></h1>
        <p class="lead"><?php echo $dj_web_media["products-archive-subtitle-section"]; ?></p>
        </div>
        <?php echo $dj_web_media["products-archive-body"]; ?>
        
        
        
        
        <?php
            $taxonomy = 'product-category';
            $terms = get_terms($taxonomy, array(
              'hide_empty' => false,
              'orderby' => 'title',
              'order'   => 'ASC',
          )); // Get all terms of a taxonomy
            //echo $terms;
          

        ?>
        <?php
            $row_one = array_slice($terms, 0, 4);
            if ( $row_one && !is_wp_error( $row_one ) ) :
              ?>
                      <div class="row">
                        <?php foreach ( $row_one as $term_one ) { ?>
                        <?php 
                          $term_one_id = $term_one->term_id;
                          $image_id = get_term_meta ( $term_one_id, 'category-image-id', true );
                          $the_image = wp_get_attachment_image_src ( $image_id, 'medium' )[0];
                        ?>


                      


                            <?php
                               echo "<div class='col-lg-6 col-md-6 col-sm-12'>";
                               echo "<div class='border hover-box mb-4'>";
                               echo "<h2 class='card-title text-center card-title-bg p-2 d-flex justify-content-center align-items-center align-self-center' style='min-height: 120px;'>" . $term_one->name ." Products</h2>";
                                   echo "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
                                   echo "<img src='".$the_image."' />";
                                   echo "</div>";
                                   echo "<p class='col-12'><a href='". get_term_link($term_one->slug, $taxonomy)."' class='w-100 ml-auto mr-auto btn btn-cta text-light'>Learn More</a></p>";
                               echo "</div>";
                               echo "</div>";
                            ?>


                          
                        <?php } ?>
                      </div>
                      </div>
              <?php endif;//row_one
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
   
              echo "<div class='row'>";
             echo "<div class='highlight-box-no-radius mt-0 pb-5'>";
             echo "<div class='container text-center'>";
             echo "<p class='h1 count-down-timer-title'>Get Your Free In-Home Water Test Today!</p>";
             echo  "<div class='col-md-12 col-12'>";
             echo  "<div class='btn-group w-100'>";
             echo "<a class='btn btn-cta w-100' href='tel:863-225-2918'>Call</a>";
             echo "<a class='btn btn-primary w-100' href='http://localhost/fwapinellas/request-free-water-test/'>FREE Water Test</a>";
             echo "<a class='btn btn-danger w-100' href='http://localhost/fwapinellas/request-free-water-test/'>My Water Is Fine</a>";
             echo "</div>";
             echo "</div>";
             echo "</div>";
             echo "</div>";
             echo "</div> "; 
        ?>
<?php fwa_pagination(); ?>


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
