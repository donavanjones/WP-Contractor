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
          echo "<h1>Options To Expand Your Contractor Marketing Plans</h1>";
          echo "<p class='lead'>Customize Your Contractor Marketing</p>";
          echo "<p>Your website is just the beginning. From there, our marketing consultants can work with you to review your current operations and make the suggestions that make the most sense for improving your visibility and acheive the ultimate end goals you are looking for with your construction and home service business.</p>";
          
          

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

                echo "<div class='col-lg-3 col-md-4 col-sm-6 col-xm-12'>";
                echo "<div class='border hover-box mb-4'>";
                echo "<h2 class='text-center bg-primary text-light p-2 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . $title ."</h2>";
                    echo "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
                      echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'img-fluid mr-auto ml-auto', 'alt' => esc_html ( get_the_title() ) ) );
                    echo "</div>";
                    echo "<p class='p-3 text-center' style='min-height: 145px;'>";
                      echo $theContent;
                    echo "</p>";
                    echo "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light'>Learn More</a></p>";
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
            echo "<div class='col-md-4 col-12'><a class='btn btn-cta w-100 sml f-prime' href='https://djwebmedia.com/product-category/web-marketing/'><strong>Sign Up Now</strong></a></div>";
            echo "</div>";
            echo  "</div>";

            

            echo "<div class='row bg-light pt-3 pb-3 mb-5'>";
            echo "<div class='col-lg-4 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Contractor Website Design</h2>";
            echo "<p class='lead'>Why A Contractor Website and Mobile Friendly Design Are So Important</p>";
            echo "<p>Using mobile phones and devices to view the web is increasing everyday. Website designs are built on a flexible framework that flows with the wide variety of devices used in today's ever changing marketplace.</p>";
            echo "<p>Having a website presence is important for any business. For contractors and home service professionals, it is one of the places your potential client will review to learn more about you and determine if you are a good fit for their needs. Having the right content and images in the right places can help to satisfy the needs of your prospective customers and convert them into leads.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/website-design/'>Website Design And Management</a></div>";
            echo "</div>";
            echo "<div class='col-lg-8 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/professional-web-design-png8.jpg' alt='Acquire new clients with a contractor website' /></div>";
            echo '</div>';



            echo "<div class='row pb-3'>";
            echo "<div class='col-lg-6 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/seo-png8.jpg' alt='Acquire new clients with a contractor website' /></div>";
            echo "<div class='col-lg-6 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Contractor SEO</h2>";
            echo "<p class='lead'>A Guide To Search Engine Optimization for The Construction & Home Services Industry</p>";
            echo "<p>The #1 reason clients come to Footbridge Media, is because we build a website that works and generates leads for your company. Footbridge Media has the knowledge and experience to direct your web marketing efforts so they bring in the web visitors you need to succeed.</p>";
            echo "<p><strong>Organic Optimization</strong> – This is what most people think about when it comes to optimization. Having the right content amongst other key factors to help improve your web ranking for specific search queries.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/search-engine-optimization/'>Contractor SEO</a></div>";
            echo "</div>";
            echo '</div>';



            echo "<div class='row prime-bg-color-lighten pt-3 pb-3'>";
            echo "<div class='col-lg-6 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Help Getting More Reviews</h2>";
            echo "<p class='lead'>Building Your Social Trust with Online Review Management</p>";
            echo "<p>Nowadays, potential leads are using online reviews from Google and other websites more and more. Most users trust reviews from strangers online as much as they would a review from a friend or family member. That's why a passive review strategy no longer works for home services business and construction businesses.</p>";
            echo "<p>You can gather customer feedback and encourage online reviews for your company manually or with the assistance of an automated review management system. Using an automated system makes the whole processes easier to implement after every job; it is a simple way to start engaging and listening to your customers.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/review-management/'>Review Management</a></div>";
            echo "</div>";
            echo "<div class='col-lg-6 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/review-management-png8.png' alt='Acquire new clients with a contractor website' /></div>";
            echo '</div>';


            echo "<div class='row prime-bg-color-darken text-light mb-2 pt-2'>";
            echo "<div class='row big-wrap mx-auto center-align-items text-center pb-2'>";
            echo "<div class='col-md-4 col-12'>";
            echo "<h2><strong>Get Your Complete Contractor Marketing Program Today</strong></h2>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'>";
            echo "<p class='display-5'><strong>$249 Per Month</strong></p>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'><a class='btn btn-cta w-100 sml f-prime' href='https://djwebmedia.com/product-category/web-marketing/'><strong>Sign Up Now</strong></a></div>";
            echo "</div>";
            echo  "</div>";





            echo "<div class='row prime-bg-color-lighten mt-0 pb-3'>";
            echo "<div class='col-lg-6 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/marketing-consultant-png8.jpg' alt='Acquire new clients with a contractor website' /></div>";
            echo "<div class='col-lg-6 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Personalized Marketing Consultant</h2>";
            echo "<p class='lead'>Custom Marketing Assistance For Your Home Services Business</p>";
            echo "<p>It is important think about your marketing for today and for tomorrow. It can be difficult to juggle the immediate needs of your business while thinking about how you will get tomorrow's customer, and next month's customer, and next year's customer. Having a dedicated team member for your marketing can help you to keep on track.</p>";
            echo "<p>At DJ Web Media specifically - we use marketing consultants to provider personalized services to you and your business. As a dedicated point of contact for planning, contractor marketing ideas, and customer satisfaction, our consultants will stay in contact with you. They stay in touch even in those moments where you may be too busy to prioritize your marketing by yourself.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/marketing-consultant/'>Marketing Consultants</a></div>";
            echo "</div>";
            echo '</div>';




            echo "<div class='row mt-3 pb-3'>";
            echo "<div class='col-lg-6 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Local Optimization Specialists</h2>";
            echo "<p class='lead'>Improving Your Local Listing Presence</p>";
            echo "<p>Local search engine optimization is vital for helping prospective customers in your area to find your business. That is why we take care of optimizing your Google Map and Local Listing presence.</p>";
            echo "<p>As a Yext Certified Partner, we manage your business listing so your local customers can find you in a variety of places online.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/search-engine-optimization/#local'>Local Optimization</a></div>";
            echo "</div>";
            echo "<div class='col-lg-6 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/seo-png8.jpg' alt='Acquire new clients with a contractor website' /></div>";
            echo '</div>';




            echo "<div class='row bg-light mt-0 pb-3 pt-3'>";
            echo "<div class='col-lg-6 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/content-development-png8.jpg' alt='Acquire new clients with a contractor website' /></div>";
            echo "<div class='col-lg-6 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Contractor Content & Updates</h2>";
            echo "<p class='lead'>Creating Strong Content For Engagement & Search Engines</p>";
            echo "<p>With the right tools and support, your online marketing content positions you as a credible authority, expands your online visibility and influence, and drives targeted traffic to your contractor website.</p>";
            echo "<p>Depending on your industry, there is specific information that your propsective customers will be looking for. It's important to provide the appropriate content to answer those most common questions and inquiries, so that they can better understand you and your business.</p>";
            echo "<p>Your website is never done - We work with you to gather project content to keep your website fresh. We take that content and turn it into a page that is designed to impress your prospective clients and search engines at the same time.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/ongoing-website-updates/'>Website Updates</a></div>";
            echo "</div>";
            echo '</div>';




            echo "<div class='row prime-bg-color-darken text-light mb-2 pt-2'>";
            echo "<div class='row big-wrap mx-auto center-align-items text-center pb-2'>";
            echo "<div class='col-md-4 col-12'>";
            echo "<h2><strong>Get Your Complete Contractor Marketing Program Today</strong></h2>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'>";
            echo "<p class='display-5'><strong>$249 Per Month</strong></p>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'><a class='btn btn-cta w-100 sml f-prime' href='https://djwebmedia.com/product-category/web-marketing/'><strong>Sign Up Now</strong></a></div>";
            echo "</div>";
            echo  "</div>";




            echo "<div class='row mt-3 pb-3'>";
            echo "<div class='col-lg-6 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Strong Foundation For Your Website</h2>";
            echo "<p class='lead'>A Well-Optimized Website + Quality Web & Email Hosting</p>";
            echo "<p>Reliable web and email hosting should a no-brainer when it comes to a complete contractor marketing program. If a page loads too slowly, a site visitor may grow impatient and simply exit your website before having the chance to learn more about you or providing their lead information.</p>";
            echo "<p>Without the right foundation of optimization and user experience concerns, your website just may be a glorified brochure. It takes specific optimization planning and technical preparation to build and launch a website the right way - to guide a user to the right path through your website and to ultimately get them to call or contact you online.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/web-hosting-services/'>Website And Email Hosting</a></div>";
            echo "</div>";
            echo "<div class='col-lg-6 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/strong-website-foundation.jpg' alt='Acquire new clients with a contractor website' /></div>";
            echo '</div>';



            echo "<div class='row bg-light mt-0 mb-4 pb-3 pt-3'>";
            echo "<div class='col-lg-6 col-md-6 col-sm-3 col-12'><img class='img-fluid' src='https://www.footbridgemedia.com/fbm-data/images/additional-contractor-marketing-services-available.jpg' alt='Acquire new clients with a contractor website' /></div>";
            echo "<div class='col-lg-6 col-md-6 col-sm-9 col-12'>";
            echo "<h2>Improving Your Business Beyond Your Website</h2>";
            echo "<p class='lead'>Building A More Complex Marketing Plan</p>";
            echo "<p>A website, ongoing optimization, and online marketing plan is simply the beginning. It is the absolute core of what a marketing plan should consist of in today's age. Depending on the size of your business, there are other ways to further develop and expand on your marketing footprint.</p>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/other-programs/'>Additional Services</a></div>";
            echo "</div>";
            echo '</div>';



            echo "<h2>What Contractors Say About DJ Web Media</h2>";
            echo do_shortcode("[reviews]");



            echo "<div class='row prime-bg-color-darken text-light pt-2 mt-5'>";
            echo "<div class='row big-wrap mx-auto center-align-items text-center pb-2'>";
            echo  "<div class='col-md-4 col-12'>";
            echo "<h2>No Contracts";
            echo "No Start-Up Fees";
            echo " 90 Day Money Back Guarantee</h2>";
            echo "<p class='lead'>All From A Company That Exclusively Provides Marketing For Contractors</p>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'>";
            echo "<p class='lead'><em>You Get Everthing Mentioned Above For</em></p>";
            echo "<p class='display-5'><strong>$249 Per Month</strong></p>";
            echo "</div>";
            echo "<div class='col-md-4 col-12'><a class='btn btn-cta w-100 sml f-prime' href='https://djwebmedia.com/product-category/web-marketing/'><strong>Sign Up Now</strong></a></div>";
            echo "</div>";
            echo "</div>";




            echo "<div class='row secondary-bg-color-lighten mt-0 pb-3 pt-3'>";
            echo "<div class='col-12'>";
            echo "<h2>Your Contractor Marketing Plan Starts Here</h2>";
            echo "<p class='lead'>More Than Contractor Websites</p>";
            echo "<p>Online marketing is a continual process. While the initial website design and build is very important, you need to continually grow online presence and overall marketing - which includes search engine optimization, local optimization, our automated review management system, and continual updates to your website.</p>";
            echo do_shortcode("[program-contractor]");
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-danger w-100' href='https://djwebmedia.com/product-category/web-marketing/'>Sign Up Now (Only $249 Per Month)</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-primary w-100' href='tel:+1-251-643-0934'>Speak With A Contractor Marketing Expert</a></div>";
            echo "<div class='col-12 my-2 pl-0'><a class='btn btn-secondary w-100' href='https://djwebmedia.com/contractor-programs/'>Contractor Marketing</a></div>";
            echo "</div>";
            echo '</div>';


           

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
