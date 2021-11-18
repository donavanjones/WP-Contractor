<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/banners/home.php"); ?>








<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



<script type="text/javascript">


      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      
      google.charts.setOnLoadCallback(drawChart);

      window.onresize = resize_chart;
        function resize_chart() {
          google.charts.setOnLoadCallback(drawChart);
        }

   

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
      

        var data = google.visualization.arrayToDataTable([
         ['Element', '<?php echo get_post_meta($post->ID,'MeasurementType', true ); ?>', { role: 'style' }],
         ['Ewg Guideline', <?php echo get_post_meta($post->ID,'EwgStandardHealthGuideline', true ); ?>,  '#009A4F' ],
          ['This Utility', <?php echo get_post_meta($post->ID,'ThisUtility', true ); ?>,  '#3E9CDA'],
          ['<?php if(get_post_meta($post->ID,'LegalLimit', true ) > 0){echo 'Legal Limit';}?><?php if(get_post_meta($post->ID,'LegalLimit', true ) < 1){echo 'No Legal Limit';}?>', <?php if(get_post_meta($post->ID,'LegalLimit', true ) != "0"){echo get_post_meta($post->ID,'LegalLimit', true );}else{echo "0"; }?>, '#19426D'],
          ['National Average', <?php echo get_post_meta($post->ID,'NationalAverage', true ); ?>,  '#E0E1E2'],
          ['State Average', <?php echo get_post_meta($post->ID,'StateAverage', true ); ?>,  '#E0E1E2']
        ]);

        // Set chart options
        var options = {};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

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
            if ( have_posts() ) {
              while ( have_posts() ) {
                the_post();
                $title = get_the_title();
                $theLink = get_the_permalink();
                $category = get_the_category();
                $firstCategory = $category[0]->cat_name;
                $category_id = get_cat_ID( $firstCategory );
                $cat_link = get_category_link($category_id);
                $obj_id = get_queried_object_id();
                $current_url = get_permalink( $obj_id );
                $post_date = get_the_date( 'F j, Y' );
                $author_profile_image = get_avatar( get_the_author_meta('user_email'), $size = '150');
      
                
                echo "<h2 class=''>" . get_post_meta($post->ID,'ContaminantTitle', true ) ."</h2>";
                echo "<p class=''>" . get_post_meta($post->ID,'ContaminantDescription', true ) ."</p>";
                echo "<h3 class=''>" . get_post_meta($post->ID,'ContaminantTitle', true ) ." was found at " . get_post_meta($post->ID,'EwgHealthGuideline', true ) ." times above EWG's Health Guideline.</h3>";
                echo "<div class='embed-responsive'>";
                echo "<div id='chart_div'></div>";
                echo "</div>";
                echo "<p class=''>" . get_post_meta($post->ID,'ContaminantBoxFooterContent', true ) ."</p>";
            	} // end while
            } // end if
            
            //echo '<p>&nbsp;</p>';
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
