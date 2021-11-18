<div class="highlight-box recent-articles">
      <h2 class="no-background no-padding no-margin-top">Recent <?php echo $category; ?> Articles</h2>
      <?php
            $category = get_post_meta($post->ID, 'page-cat', true);
            $args = array(
            'post__not_in' => array($post->ID),
            'post_type' => 'post',
            'post_status' => 'publish',
            'category_name' => $category,
            'posts_per_page' => 2,
            );
            $arr_posts = new WP_Query( $args );

            if ( $arr_posts->have_posts() )
            {

            while ( $arr_posts->have_posts()) :
                $arr_posts->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h5 class="entry-title"><?php the_title(); ?></h5>
                    <div class="entry-content">
                        <?php
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail', true);
                            echo "<p class='excerpt'><img src=$thumb_url[0] class='img-fluid float-left add-small-margin-right'>". wp_trim_words( get_the_content(), 50 ). "</p>";
                        ?>
                        <br>
                        <p class="clearfix"><a href="<?php the_permalink(); ?>" class="float-right btn btn-warning text-light btn-sm add-small-margin-bottom">Read More</a></p>
                    </div>
                </article>
                <?php
            endwhile;
          }else{
            echo '<p>Sorry no posts yet. Check back soon!</p>';
          }
       ?>
      </div>