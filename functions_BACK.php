<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
remove_filter ('the_content', 'wpautop');



function fwa_scripts() {
    //wp_enqueue_style( 'fwa', get_stylesheet_uri() );
    //wp_enqueue_script( 'fwa-scripts', get_template_directory_uri() . '/js/bundle.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'fwa_scripts' );


// stop wp removing div tags
function uncoverwp_tiny_mce_fix( $init )
{
    // html elements being stripped
    $init['extended_valid_elements'] = 'div[*], article[*]';

    // don't remove line breaks
    $init['remove_linebreaks'] = false;

    // convert newline characters to BR
    $init['convert_newlines_to_brs'] = true;

    // don't remove redundant BR
    $init['remove_redundant_brs'] = false;

    // pass back to wordpress
    return $init;
}
add_filter( 'tiny_mce_before_init', 'uncoverwp_tiny_mce_fix' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');

}

// remove dashicons in frontend to non-admin
    function wpdocs_dequeue_dashicon() {
        if (current_user_can( 'update_core' )) {
            return;
        }
        wp_deregister_style('dashicons');
    }
    add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );



if (is_user_logged_in()) {
    show_admin_bar(true);
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';



function register_my_menu() {
register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function fwa_styles() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'fwa_styles' );
function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );










// Numbered Pagination
if ( !function_exists( 'fwa_pagination' ) ) {

	function fwa_pagination() {

		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}

}


function fwa_widgets_init()
{
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'fwa' ),
        'id' => 'sidebar-1',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'fwa' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action( 'widgets_init', 'fwa_widgets_init' );


function fwa_footer_widgets_init()
{
    register_sidebar( array(
        'name' => __( 'Main Bottom', 'fwa' ),
        'id' => 'sidebar-2',
        'description' => __( 'The footer sidebar appears the bottom of a of post', 'fwa' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'fwa_footer_widgets_init' );


function get_first_image() {
    global $post;
    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    return $first_img;
}


function fwa_comment_text_before($arg) {
    $arg['comment_notes_before'] = "<p class='comment-policy'>We are glad you have chosen to leave a comment. Please keep in mind that comments are moderated according to our <a href='https://www.floridawateranalysis.com/comment-privacy/'>comment policy</a>.</p>";
    return $arg;
}

add_filter('comment_form_defaults', 'fwa_comment_text_before');
function fwa_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'fwa_move_comment_field_to_bottom');
function fwa_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'fwa_remove_comment_url');

// Change posts per page in the design category
add_action( 'pre_get_posts', 'fwa_cat_posts_per_page' );
function fwa_cat_posts_per_page( $query )
{
	if( $query->is_main_query() && is_category( 'water-softener') || is_category('inline-water-filter')  ||  is_category('air-purification') || is_category('reverse-osmosis-system') || is_category('uv-water-sterilizer') || is_category('water-conditioner') || is_category('water-test') || is_category('well-water-treatment') && ! is_admin() )
  {
		$query->set( 'posts_per_page', '10' );
	}
}

function yoastVariableToTitle($post_id) {
    $yoast_title = get_post_meta($post_id, '_yoast_wpseo_title', true);
    $title = strstr($yoast_title, '%%', true);
    if (empty($title)) {
        $title = get_the_title($post_id);
    }
    return $title;
}



//exclude the latest projects category from displaying on the blog home page
function exclude_category( $query ) {
if ( $query->is_home() && $query->is_main_query() ) {
$query->set( 'cat', '-65' );
}
}
add_action( 'pre_get_posts', 'exclude_category' );



//* Exclude Categories from Category Widget - basicWP.com
function custom_category_widget($args) {
	$exclude = "65"; // Category IDs to be excluded
	$args["exclude"] = $exclude;
	return $args;
}
add_filter("widget_categories_args","custom_category_widget");






function wpassist_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
} 
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );


function remove_google_fonts_stylesheet() {  
    wp_dequeue_style( 'google-fonts-roboto' );
}
add_action( 'wp_enqueue_scripts', 'remove_google_fonts_stylesheet', 999 );





// Register Custom Taxonomy
function custom_taxonomy_project_category() {

	$labels = array(
		'name'                       => _x( 'Project Categories', 'Project Category General Name', 'text_domain' ),
		'singular_name'              => _x( 'Project Category', 'Project Category Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Project Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Project Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Project Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Project Category', 'text_domain' ),
		'update_item'                => __( 'Update Project Category', 'text_domain' ),
		'view_item'                  => __( 'View Project Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Project Categories', 'text_domain' ),
		'search_items'               => __( 'Search Project Categories', 'text_domain' ),
		'not_found'                  => __( 'Project Category Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Project Categories', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project-category', array( 'latest-projects' ), $args );

}
add_action( 'init', 'custom_taxonomy_project_category', 0 );










	/*
* Creating a function to create our CPT - Latest Projects
*/
 
function custom_post_type_latest_projects() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Latest Projects', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Latest Project', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Latest Projects', 'fwa' ),
			'parent_item_colon'   => __( 'Parent Latest Project', 'fwa' ),
			'all_items'           => __( 'All Latest Projects', 'fwa' ),
			'view_item'           => __( 'View Latest Project', 'fwa' ),
			'add_new_item'        => __( 'Add New Latest Project', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Latest Project', 'fwa' ),
			'update_item'         => __( 'Update Latest Project', 'fwa' ),
			'search_items'        => __( 'Search Latest Project', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
	
		$args = array(
			'label'               => __( 'Latest Projects', 'fwa' ),
			'description'         => __( 'Latest Projects', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'project-category' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 8,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'latest-projects', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_latest_projects', 0 );




// >> Create Shortcode to Display Projects Post Types
 
function dj_create_shortcode_latest_projects_post_type(){
 
    $args = array(
                    'post_type'      => 'latest-projects',
                    'posts_per_page' => '3',
                    'publish_status' => 'published',
					'order' => 'DESC'
                 );
 
    $query = new WP_Query($args);
 
    if($query->have_posts()) :
		$result = "<div class='card-deck text-center'>";
        while($query->have_posts()) :
 
            $query->the_post() ;
			$result .= "<div class='col-lg-4 col-md-6 col-sm-12 col-xm-12'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .= "<h2 class='text-center bg-primary text-light p-2 mb-0 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_the_title() ."</h2>";
			$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
			$result .=  get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto' ) );
			$result .=  "</div>";
			$result .=  "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light mt-2'>Learn More</a></p>";
			$result .=  "</div>";
			$result .=  "</div>";
		endwhile;
		
		$result .= "</div>";
 
        wp_reset_postdata();
		$result .= '<a href="https://djwebmedia.com/latest-projects/" class="btn btn-success w-100">View More Projects</a>'; 
    endif;    
 
    return $result;            
}
 
add_shortcode( 'latest-projects', 'dj_create_shortcode_latest_projects_post_type' );








// >> Create Shortcode to Display Projects Post Types
 
// Creating Shortcodes to display posts from category
function dj_shortcode_display_post($attr, $content = null){
 
    global $post;
 
    // Defining Shortcode's Attributes
    $shortcode_args = shortcode_atts(
                        array(
                                'cat'     => '',
                                'num'     => '4',
                                'order'  => 'desc'
                        ), $attr);    
     
    // array with query arguments
    $args = array(
                    'cat'              => $shortcode_args['cat'],
                    'posts_per_page' => $shortcode_args['num'],
                    'order'          => $shortcode_args['order'],
                     
                 );
 
     
    $recent_posts = get_posts($args);
 
    
	$result = "<div class='card-deck text-center'>";
	$counter = 0;
	if( wp_count_posts()->publish == 0 )
		{
			$result .= "<div class='col-12'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .=  "<p>Not Post Yet, Check back soon!</p>";
			$result .=  "</div>";
			$result .=  "</div>";
		}

    foreach ($recent_posts as $post) {
        setup_postdata($post);
 

		

		if( wp_count_posts()->publish == 1 )
		{
			$result .= "<div class='col-12'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .= "<h2 class='text-center bg-primary text-light p-2 mb-0 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_the_title() ."</h2>";
			$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
			$result .=  get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto' ) );
			$result .=  "</div>";
			$result .=  "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light mt-2'>Learn More</a></p>";
			$result .=  "</div>";
			$result .=  "</div>";
		}

		if( wp_count_posts()->publish == 2 )
		{
			$result .= "<div class='col-lg-6 col-xm-12'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .= "<h2 class='text-center bg-primary text-light p-2 mb-0 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_the_title() ."</h2>";
			$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
			$result .=  get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto' ) );
			$result .=  "</div>";
			$result .=  "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light mt-2'>Learn More</a></p>";
			$result .=  "</div>";
			$result .=  "</div>";
		}

		if( wp_count_posts()->publish == 3 )
		{
			$result .= "<div class='col-lg-4 col-sm-6 col-xm-12'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .= "<h2 class='text-center bg-primary text-light p-2 mb-0 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_the_title() ."</h2>";
			$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
			$result .=  get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto' ) );
			$result .=  "</div>";
			$result .=  "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light mt-2'>Learn More</a></p>";
			$result .=  "</div>";
			$result .=  "</div>";
		}
        
		if( wp_count_posts()->publish >= 4 )
		{
			$result .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xm-12'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .= "<h2 class='text-center bg-primary text-light p-2 mb-0 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_the_title() ."</h2>";
			$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
			$result .=  get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto' ) );
			$result .=  "</div>";
			$result .=  "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light mt-2'>Learn More</a></p>";
			$result .=  "</div>";
			$result .=  "</div>";
		}
			
		
			
	
		
		
 
        wp_reset_postdata();
		
		$counter++;
         
 
 
	}   
	$result .= '</div>';
	$result .= '<a href="http://lakelandpressurewashingmaster.com/home-tips/" class="btn btn-success w-100 mb-5">Read More Posts</a>';  
    wp_reset_postdata();
 
    
     
    return $result;
 
}
 
add_shortcode( 'recent_posts', 'dj_shortcode_display_post' );




/**
 * Gravatar Alt Fix
 * https://wphelper.site/fix-missing-gravatar-alt-tag-value/
 */
function gravatar_alt($text) {
    $alt = get_the_author_meta( 'display_name' );
    $text = str_replace('alt=\'\'', 'alt=\'Avatar for '.$alt.'\' title=\'Gravatar for '.$alt.'\'',$text);
    return $text;
}
add_filter('get_avatar','gravatar_alt');


//* ADMIN PANEL */
// this will deactive demo mode of reduxframework plugin and will not display and addvertisement
require_once (dirname(__FILE__) . '/admin/admin-config.php');

remove_filter( 'the_content', 'wpautop' );


?>
