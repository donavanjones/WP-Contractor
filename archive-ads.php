<?php include("inc/schema.php"); ?>
<?php include("inc/header.php"); ?>
<?php //include("inc/banner-services.php"); ?>







<br class="clearfix">

    <div class="container">
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
          echo '<h1>Ads</h1>';
         

        ?>
        <?php
            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post();
                $title = get_the_title();
                if($category_slug == ('water-softening' || 'water-filtration'  || 'well-water-treatment') && has_excerpt())
                {
                  $theContent = get_the_excerpt();
                }else{
                  $theContent = wp_trim_words( get_the_content(), 50, '...' );
                }


                echo "<div class='excerpt zebra-stripe'>";
                    echo "<h2>" . $title ."</h2>";
                    echo "<p>";
                      echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'float-left add-small-margin-right' ) );
                      echo $theContent;
                    echo "</p>";
                    echo "<p class='clearfix'><a href='".get_the_permalink()."'"."class='float-right btn btn-warning text-light add-small-margin-bottom'>Read More</a></p>";
                echo "</div>";
            	} // end while
            } // end if
        ?>
<?php fwa_pagination(); ?>



<?php include("inc/why-us.php"); ?>


<?php //include("inc/lets-get-started.php"); ?>


        <br>

      </div>



<!--<h4 class="make-bold">If like to know more about Florida Water Analysis, please call (863) 662-5570 or complete our <a href="https://www.floridawateranalysis.com/contact-us/">online request</a> form.</h4>-->
</div>



<?php //include("inc/sidebar.php"); ?>
</div>
</div>

    <?php include("inc/footer.php"); ?>
