<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/banners/project-archive-banner.php"); ?>







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
      <?php
         echo "<h1>".$dj_web_media['projects-archive-title']."</h1>";
         echo "<p class='lead h3'>".$dj_web_media['projects-archive-subtitle-section']."</p>";
         echo "<p>".$dj_web_media['projects-archive-body']."</p>";

         echo "<div class='mb-2 mt-2'>";
          
            echo "<div class='row prime-bg-color-darken text-light pt-2 pb-4 mb-4''>";
          echo "<div class='row big-wrap mx-auto center-align-items text-center pb-3>";
          echo "<div class='col-12'>";
          echo "<p class='h2 text-light'>".$dj_web_media["cta-banner-text"]."</p>";

          echo "</div>";
          echo "<div class='col-md-12 col-12'>";
          echo "<p class='lead text-light text-center'>".$dj_web_media["cta-banner-sub-text"]."</p>";

          echo "</div>";
          echo "<div class='col-md-12 col-12'>";
          echo "<div class='btn-group w-100'>";
          echo "<a class='btn btn-cta w-100' href='tel:863-225-2918'>Call</a>";
          echo "<a class='btn btn-primary w-100' href='http://localhost/fwapinellas/request-free-water-test/'>FREE Water Test</a>";
          echo "<a class='btn btn-danger w-100' href='http://localhost/fwapinellas/request-free-water-test/'>My Water Is Fine</a>";
          echo "</div>";
          echo "</div>";

          echo "</div>";
          echo "</div>";
          echo "</div>";
      ?>

      

        <?php
           $terms = get_terms( array(
            'taxonomy' => 'project-category',
            'hide_empty' => false
        ) );
           
           // echo("SLUG IS: " . $theTerm->slug);
           // echo("<br>");
           
           // echo("<br>");
           //print_r($terms);


         echo "<div class=''>";
         echo "<div class='row'>";
           
           foreach( $terms as $term ):
                   

                   //print_r($term);
                   //$term_id = get_term_by('slug', 'project-category', 'project-category'); 
                   $term_id = get_term_meta ( $term -> term_id, 'category-image-id', true );
                     $featured_img_url = wp_get_attachment_image( $term_id, 'medium' );
                       echo "<div class='col-lg-4 col-md-6 col-sm-12'>";
                       echo "<a href='http://localhost/djwebmedia/project-category/".$term->slug."/'"."class='w-100 ml-auto mr-auto text-light'>";
                       echo "<div class='border hover-box mb-4'>";
                       echo "<h2 class='card-title text-center card-title-bg p-2 d-flex justify-content-center align-items-center align-self-center' style='min-height: 120px;'>" . $term->name ." Projects</h2>";
                           echo "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
                           echo $featured_img_url;
                           echo "</div>";
                           echo "<p href='http://localhost/djwebmedia/project-category/".$term->slug."/'"."class='w-100 ml-auto mr-auto btn btn-cta text-light'>Learn More</p>";
                       echo "</div>";
                       echo "</a>";
                       echo "</div>";
                       
                   
                     
                    
                     
             
           endforeach;
           echo "</div>";
           echo "</div>";


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




<?php //fwa_pagination(); ?>



<?php //include("inc/why-us.php"); ?>


<?php //include("inc/lets-get-started.php"); ?>


       

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
