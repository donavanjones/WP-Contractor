<?php include("inc/schema.php"); ?>
<?php include("inc/header-landing.php"); ?>
<?php //include("inc/banner-blog.php"); ?>









<br class="clearfix">

    <div class="container" style="padding-top: 0px;padding-bottom: 0px;">
      <div class="row">
      <div class="col-md-12">
        

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
      
                //echo "<h1>" . $title ."</h1>";
                //echo '<p><i class="far fa-calendar-alt"></i> <strong>Written by:</strong> '.get_author_name().' <strong>on '.$post_date.'</strong></p>';
                //echo '<div class="fb-like" data-href="'.$current_url.'" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>';
                //echo '<p></p>';
                the_content();
            	} // end while
            } // end if
            
            //echo '<p>&nbsp;</p>';
        ?>

<?php //include("inc/why-us-ads.php"); ?>
        
        <!-- <hr>

        <div class="row">
    <div class="col-md-12 mx-auto w-50 p-3 text-center">
      <h2><strong>Are You Ready To Schedule An Appointment? Do You Still Have Unanswered Questions?</strong></h2>
      <p>Give us a call or email us and one of our specialists will be able to help!</p>
      <p><a href="Tel:8636625570" class="btn btn-warning text-light btn-lg mx-auto p-4 text-center">Call Us</a></p>
      <p><a href="mailto:geno@floridawateranalysis.com" class="btn btn-warning text-light btn-lg mx-auto p-4 text-center">Email Us</a></p>
    </div>
  </div> -->


 
       

        
        
        
      




      

      
</div>

</div>
</div>



    <?php include("inc/footer-ads.php"); ?>
