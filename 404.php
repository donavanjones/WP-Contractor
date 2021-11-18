<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>








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
      <h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
					<ul>
        <li><a href="https://djwebmedia.com/">The Home Page</a></li>
        <li><a href="http://localhost/fwapinellas/request-free-water-test/">Marketing Programs</a></li>
        <li><a href="https://djwebmedia.com/marketing-tips/">Latest Articles</a></li>
      </ul>
  
        <br>

      </div>

      <?php //include("inc/recent-articles-pages.php"); ?>


      </div>

<!--<h4 class="make-bold">If like to know more about Florida Water Analysis, please call (863) 662-5570 or complete our <a href="https://www.eaglewater.net/contact-us/">online request</a> form.</h4>-->
</div>



<?php //include("inc/sidebar.php"); ?>
</div>
</div>
<?php
/* get a specific post object by ID */
global $post;
global $wp;

/* grab the url for the full size featured image */
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
$post_slug = $post->post_name;

$url =  home_url( $wp->request );
$url .= "/";
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Plumber",
  "name": "Eagle Water",
  "image": "<?php echo $featured_img_url; ?>",
  "@id": "<?php echo $url . "#" . $post_slug; ?>",
  "url": "<?php echo $url; ?>",
"contactPoint": [
  { "@type": "ContactPoint",
    "telephone": "+1-863-660-2264",
    "contactType": "customer service"
  }
],
  "telephone": "+1-863-660-2264",
  "priceRange": "$$",
"logo": "https://www.eaglewater.net/wp-content/themes/fwa/images/logo.png",
"sameAs": [
    "https://www.facebook.com/eaglewaterus/"
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "516 Lake Lulu Dr",
    "addressLocality": "Winter Haven",
    "addressRegion": "FL",
    "postalCode": "33880",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 28.000767,
    "longitude": -81.719007
  },
  "paymentAccepted": [ "cash", "check", "credit card" ],
  "openingHours": "Mo,Tu,We,Th,Fr 08:00-17:00",
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday"
    ],
    "opens": "08:00",
    "closes": "17:00"
  }
}
</script>
    <?php include("inc/footer.php"); ?>
