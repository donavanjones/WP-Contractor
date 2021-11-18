<?php include("inc/schema.php"); ?>
<title>Life Is Better With Clean And Healthy Water | Water Treatment Company</title>
<meta name="description" content="Live a life that is well balanced and full of good choices. The water you choose to drink should be free of natural and man-made contaminants.">
<?php include("inc/header.php"); ?>







<br class="clearfix">

    <div class="container body-container">
      <div id="breadcrumb" class="hide-from-mobile">
          <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="http://localhost/eaglewater/"><span itemprop="name" class=" ">Home</span></a>
              <meta itemprop="position" content="1">
            </li>
          </ul>
        </div>
      <?php /*include("inc/services.php");*/ ?>

      <div id="content" class="">
        <!--
        <h1 class="">We Love Water!</h1>
        <p class="lead">With our home water treatment systems, anything that involves water - like laundry, cleaning, showering and cooking - gets better.</p>
      -->
      <?php
          if ( have_posts() ) {
          	while ( have_posts() ) {
          		the_post();
          		//
          		// Post Content here
          		//
          	} // end while
          } // end if
      ?>


      </div>

      <div class="row">
        <div class="col-12 col-md">
        <h2>Our Water Treatment Solutions</h2>
        <?php include("inc/services.php"); ?>
      </div>
      </div>




      <h2 class="">The Florida Water Analysis Difference</h2>
      <p class="">We put on our thinking caps to create smarter products that bring families like yours the very best water. Our commitment in providing Florida with clean safe water shows in every install we do. We are changing families lives at one home at a time. Will yours be next? <a href="http://localhost/eaglewater/contact-us/">Contact us</a> today to start experiencing a hydrated lifestyle.</p>

      <h2>Read What Our Water Treatment Clients Are Saying About Us!</h2>
      <div class="row">
      <div class="testimonial-wrapper">
        <div class="testimonial">Installation technician was excellent. Very Helpful.
        </div>
        <div class="media">
          <div class="media-left d-flex mr-3">
          <i class="fas fa-user-circle" style="font-size:5em"></i>
          </div>
          <div class="media-body">
            <div class="overview">
            <div class="name"><b>Suzanne Grainick</b></div>
              <div class="star-rating">
                <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="testimonial-wrapper">
        <div class="testimonial">We are very pleased!
        </div>
        <div class="media">
          <div class="media-left d-flex mr-3">
          <i class="fas fa-user-circle" style="font-size:5em"></i>
          </div>
          <div class="media-body">
            <div class="overview">
            <div class="name"><b>Jacqueline Blake</b></div>
              <div class="star-rating">
                <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <a href="http://localhost/eaglewater/testimonials.php" class="btn btn-warning text-light add-small-margin-bottom">Read More Reviews</a>
      </div>
  </div>


  <div class="row">

    <div class="col-12 col-md">
      <p class="d-none d-lg-block"><a href="http://localhost/eaglewater/contact-us/" class=""><img src="images/large-leaderboard-contact-us-now-home.jpg" class="img-fluid" alt="contact us banner"></a></p>
      <p class="d-lg-none"><a href="http://localhost/eaglewater/contact-us/" class=""><img src="images/medium-rectangle-contact-us-now.jpg" class="img-fluid" alt="contact us banner"></a></p>
    </div>
  </div>











  <?php /*include("inc/recent-articles.php");*/ ?>


<!--<h4 class="make-bold">If You Are Looking For An Affordable Water Treatment Company, Please Call (863) 662-5570 Or Complete Our  <a href="http://localhost/eaglewater/contact-us/">Online Request</a> Form.</h4>-->
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
