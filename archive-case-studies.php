<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php //include("inc/banner-services.php"); ?>







<br class="clearfix">

    <div class="container body-container">
      <div class="row">
      <div class="col-md-12">
        <?php
  if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<div class="row"><p id="breadcrumbs">','</p></div>' );
  }
  ?>


      <div id="content">
        <?php
            $category = single_cat_title("", false);
          echo "<h1>What's Included In Our Contractor Marketing Program</h1>";
          echo "<p class='lead'>More Than Contractor Websites</p>";
          echo "<p>Online marketing is a continual process. While the initial website design and build is very important, you need to continually grow online presence and overall marketing - which includes search engine optimization, local optimization, our automated review management system, and continual updates to your website.</p>";
          
          

        ?>
        <?php
            if ( have_posts() ) {
              echo "<div class='d-flex justify-content-center align-items-center align-self-center'>";
              echo "<div class='row'>";
            	while ( have_posts() ) {
            		the_post();
                $title = get_the_title();
                if($category_slug == ('water-softening' || 'water-filtration'  || 'well-water-treatment') && has_excerpt())
                {
                  $theContent = get_the_excerpt();
                }else{
                  $theContent = wp_trim_words( get_the_excerpt(), 16, '...' );
                }

                echo "<div class='col-lg-4 col-md-4 col-sm-6 col-xm-12'>";
                echo "<div class='border hover-box mb-4'>";
                echo "<h2 class='text-center bg-primary text-light p-2 mb-0 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . $title ."</h2>";
                    echo "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
                      echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto', 'alt' => esc_html ( get_the_title() ) ) );
                    echo "</div>";
                    echo "<p class='p-3 text-center' style='min-height: 145px;'>";
                      echo $theContent;
                    echo "</p>";
                    echo "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-aouto mr-auto btn btn-warning text-light'>Learn More</a></p>";
                echo "</div>";
                echo "</div>";
                
              } // end while
              echo "</div>";
              echo "</div>";
            } // end if
            echo "<div class='row prime-bg-color-darken text-light mt-2 mb-2 pt-2'>";
            echo "<div class='row big-wrap mx-auto center-align-items text-center pb-2'>";
            echo "<div class='col-md-4 col-12'>";
            echo "<h2><strong>Get Your Complete Contractor Marketing Program Today</strong></h2>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'>";
            echo "<p class='display-5'><strong>$249 Per Month</strong></p>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'><a class='btn btn-cta w-100 sml f-prime' href='http://localhost/fwapinellas/request-free-water-test/'><strong>Sign Up Now</strong></a></div>";
            echo "</div>";
            echo  "</div>";

            

            



            


           

        ?>
<?php fwa_pagination(); ?>



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
