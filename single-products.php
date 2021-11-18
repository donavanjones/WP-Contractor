<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/banner-single-product.php"); ?>









<br class="clearfix">

    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
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
      
                
                the_content();
            	} // end while
            } // end if
            
            //echo '<p>&nbsp;</p>';
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
