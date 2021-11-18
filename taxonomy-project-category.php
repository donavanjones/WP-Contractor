<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php //include("inc/banner-tax-products.php"); ?>






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

            $terms = get_terms('project-category');
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
                      'post_type' => 'latest-projects',
                      //'orderby' => 'title',
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
                      

                    echo "<div class=''>";
                    echo "<div class='row'>";

                      foreach($posts as $post): // begin cycle through posts of this taxonmy
                        {
                        //print_r($post);
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
                        echo "<div class='col-lg-4 col-md-4 col-sm-6 col-xm-12'>";
                        echo "<div class='border hover-box mb-4'>";
                        echo "<h2 class='text-center bg-primary text-light p-2 mb-0 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . $post->post_title ."</h2>";
                            echo "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
                            echo '<img src="' . $featured_img_url .  '" class="img-fluid float-left add-small-margin-right" alt="'.$post->post_title.'" />';
                            echo "</div>";
                            echo "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light mt-2'>Learn More</a></p>";
                        echo "</div>";
                        echo "</div>";
                        
                      } // end while
                      
                      endforeach;
                      echo "</div>";
                      echo "</div>";
              }
            endforeach;
            echo "<div class='row prime-bg-color-darken text-light pt-2 mt-5'>";
            echo "<div class='row big-wrap mx-auto center-align-items text-center pb-2'>";
            echo  "<div class='col-md-4 col-12'>";
            echo "<h2>No Contracts<br>";
            echo "No Start-Up Fees<br>";
            echo "90 Day Money Back Guarantee</h2>";
            echo "<p class='lead text-light'>All From A Company That Exclusively Provides Marketing For Contractors</p>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'>";
            echo "<p class='lead text-light'><em>Starting At</em></p>";
            echo "<p class='display-5 text-light'><strong>$249 Per Month</strong></p>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'>";
            echo "<div class='btn-group-vertical w-100'>";
            echo "<a class='btn btn-cta w-100 mb-0' href='tel:863-225-2918'>Call</a>";
            echo "<a class='btn btn-primary w-100 mb-0' href='https://djwebmedia.com/product-category/web-marketing/'>I Want More Leads</a>";
            echo "<a class='btn btn-danger w-100 mb-0' href='https://djwebmedia.com/contractor-programs/'>I Have Enough Leads</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            ?>                         
                                          
      <div class="row prime-bg-color-light text-light align-items-center">
			<div class="row big-wrap mx-auto text-center text-light">
			<div class="col-12">
			<h2>…It's Like Having A Full Time Marketing Employee In Your Office!</h2>
			</div>
			</div>
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
