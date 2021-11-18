<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>







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

      <div id="content">
        
        <?php

            $terms = get_terms('water-utility');
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
                      'post_type' => 'contaminants',
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
                    echo "<div class='justify-content-center align-items-center align-self-center'>";
              echo "<div class='row'>";
                      foreach($posts as $post): // begin cycle through posts of this taxonmy
                        //print_r($post);
                       
        
                        echo "<div class='col-lg-4 col-md-4 col-sm-6 col-xm-12'>";
                        echo "<div class='border hover-box mb-4 health-guidline'>";
                        echo "<h2 class='card-title text-center contaminates-card-title-bg p-2 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_post_meta($post->ID,'ContaminantTitle', true ) ."</h2>";
                            echo "<p class='text-center'>Potential Effect: <span class='danger'><strong>" . get_post_meta($post->ID,'PotentialEffect', true ) ."</strong></span></p>";
                            echo "<div class='text-center'>";
                            echo "<p class='display-1 danger'><strong>" . get_post_meta($post->ID,'EwgHealthGuideline', true ) ."x</strong></p>";
                            echo "<p class='small'>EWG'S HEALTH GUIDELINE</p>";
                            echo '</div>';
                            echo "<ul class='list-group text-center'>";
                            echo "<li class='list-group-item lgi-2'>THIS UTILITY - <span class='danger'><strong>" . get_post_meta($post->ID,'ThisUtility', true ) .  get_post_meta($post->ID,'MeasurementType', true ) ." </strong></span></li>";
                            echo "<li class='list-group-item lgi-2'>EWG HEALTH GUIDELINE - <span class='danger'><strong>" . get_post_meta($post->ID,'EwgStandardHealthGuideline', true ) .  get_post_meta($post->ID,'MeasurementType', true ) ." </strong></span></li>";
                            if(get_post_meta($post->ID,'LegalLimit', true ) > 0)
                            {
                              echo "<li class='list-group-item lgi-2'>LEGAL LIMIT - <span class='danger'><strong>" . get_post_meta($post->ID,'LegalLimit', true ) .  get_post_meta($post->ID,'MeasurementType', true ) ." </strong></span></li>";
                            }else{
                              echo "<li class='list-group-item lgi-2'><span class='danger'><strong>No Legal Limit</strong></span></li>";
                            }
                            

                            echo "</ul>";
                            echo "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light'>Learn More</a></p>";
                        echo "</div>";
                        echo "</div>";
                      endforeach;
                      echo "</div>";
                      echo "</div>";
              }
            endforeach;
            ?>                         
                                          
          
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
