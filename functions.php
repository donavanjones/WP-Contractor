<?php
///////////////////////////////////////////////////
//////////////////admin panel//////////////////////
///////////////////////////////////////////////////

/*********************
* re-order left admin menu
**********************/
function reorder_admin_menu( $__return_true ) 
{
    return array(
         'index.php', // Dashboard
		 'edit.php', // Posts
		 'edit-comments.php', // Comments
		 'edit.php?post_type=page', // Pages
		 'upload.php', // Media
		 'separator1', // First separator
		 'edit.php?post_type=ad', // Ads
		 'edit.php?post_type=case-study', // Case Studies
		 'edit.php?post_type=employee', // Employees
		 'edit.php?post_type=lates-project', // Latest Projects
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

add_action( 'admin_menu', 'my_page_excerpt_meta_box' );



function my_page_excerpt_meta_box() 
{
	add_meta_box( 'postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
}



// this will deactive demo mode of reduxframework plugin and will not display and addvertisement
require_once (dirname(__FILE__) . '/admin/admin-config.php');

//////////////////////////////////////////////////////////////////
//////////////////End ADMIN PANEL/////////////////////////////////
//////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////
//////////////////WooComerece/////////////////////////////////////
//////////////////////////////////////////////////////////////////
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//WooCommerce
/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'fwa_faq_tab' );
function fwa_faq_tab( $tabs ) {

	// Adds the new tab

	$tabs['faq_tab'] = array(
		'title' 	=> __( 'FAQs', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'fwa_faq_tab_content'
	);

	return $tabs;

}
function fwa_faq_tab_content() {

	// The new tab content

	//echo '<h2>FAQs</h2>';
	echo get_secondary_content("FAQs");

}




/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'fwa_specs_tab' );
function fwa_specs_tab( $tabs ) {

	// Adds the new tab

	$tabs['specs_tab'] = array(
		'title' 	=> __( 'Specs', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'fwa_specs_tab_content'
	);

	return $tabs;

}
function fwa_specs_tab_content() {

	// The new tab content

	//echo '<h2>FAQs</h2>';
	echo get_secondary_content("Specs");


}



/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'fwa_warranty_tab' );
function fwa_warranty_tab( $tabs ) {

	// Adds the new tab

	$tabs['warranty_tab'] = array(
		'title' 	=> __( 'Warranty', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'fwa_warranty_tab_content'
	);

	return $tabs;

}
function fwa_warranty_tab_content() {

	// The new tab content

	//echo '<h2>FAQs</h2>';
	echo get_secondary_content("Warranty");


}


/**
 * Shortcode for product sale price.
 *
 * @param $atts
 *
 * @return string
 */
function fwa_woo_product_price_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'fwa_product_price' );

	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}

	$product = wc_get_product( $atts['id'] );

	if ( ! $product ) {
		return '';
	}

	return $product->get_sale_price();
}

add_shortcode( 'fwa_product_price', 'fwa_woo_product_price_shortcode' );







/**
 * Shortcode for product regular price.
 *
 * @param $atts
 *
 * @return string
 */
function fwa_woo_product_regular_price_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'fwa_product_price' );

	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}

	$product = wc_get_product( $atts['id'] );

	if ( ! $product ) {
		return '';
	}

	return $product->get_regular_price();
}

add_shortcode( 'fwa_regular_product_price', 'fwa_woo_product_regular_price_shortcode' );







/**
 * Shortcode for product sale percent.
 *
 * @param $atts
 *
 * @return string
 */
function fwa_sales_percent_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'fwa_sales_percent' );

	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}

	$product = wc_get_product( $atts['id'] );

	if ( ! $product ) {
		return '';
	}

	$regular_price = $product->get_regular_price();
	$sale_price = $product->get_sale_price();
	$pecent_amount = ($sale_price/$regular_price)*100;
  $pecent_amount = 100-substr($pecent_amount,0,5);
	return $pecent_amount."%";
}

add_shortcode( 'fwa_sales_percent', 'fwa_sales_percent_shortcode' );





/**
 * Shortcode for product sku.
 *
 * @param $atts
 *
 * @return string
 */
function fwa_woo_product_sku_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'fwa_product_sku' );

	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}

	$product = wc_get_product( $atts['id'] );

	if ( ! $product ) {
		return '';
	}

	return $product->get_sku();
}

add_shortcode( 'fwa_product_sku', 'fwa_woo_product_sku_shortcode' );




/**
 * Shortcode for product category.
 *
 * @param $atts
 *
 * @return string
 */
function fwa_woo_product_category_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'fwa_product_category' );

	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}

	$product = wc_get_product( $atts['id'] );

	if ( ! $product ) {
		return '';
	}

	return $product->get_categories();
}

add_shortcode( 'fwa_product_category', 'fwa_woo_product_category_shortcode' );


add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
  function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'form-control' );
  return $args;
}


function woocommerce_get_product_thumbnail($size = 'product_small_thumbnail', $placeholder_width = 0, $placeholder_height = 0)
{
    global $post;
    if (has_post_thumbnail()) {
        $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'shop_catalog');
        return get_the_post_thumbnail($post->ID, $size, array('data-src' => $image_src[0], 'class' => 'img-fluid'));
    } elseif (wc_placeholder_img_src()) {
        return fwa_wc_placeholder_img($size);
    }
}

function fwa_wc_placeholder_img( $size = 'woocommerce_thumbnail' ) {
	$dimensions        = wc_get_image_size( $size );
	$placeholder_image = get_option( 'woocommerce_placeholder_image', 0 );

	if ( wp_attachment_is_image( $placeholder_image ) ) {
		$image_html = wp_get_attachment_image(
			$placeholder_image,
			$size,
			false,
			array(
				'alt'   => __( 'Placeholder', 'woocommerce' ),
				'class' => 'woocommerce-placeholder wp-post-image img-fluid',
			)
		);
	} else {
		$image      = wc_placeholder_img_src( $size );
		$image_html = '<img src="' . esc_attr( $image ) . '" alt="' . esc_attr__( 'Placeholder', 'woocommerce' ) . '" width="' . esc_attr( $dimensions['width'] ) . '" class="woocommerce-placeholder wp-post-image" height="' . esc_attr( $dimensions['height'] ) . '" />';
	}

	return apply_filters( 'woocommerce_placeholder_img', $image_html, $size, $dimensions );
}


remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
add_action('woocommerce_shop_loop_item_title', 'fwa_woocommerce_template_loop_product_title', 10 );
function fwa_woocommerce_template_loop_product_title() {
    echo '<h5 class="text-light woocommerce-loop-product_title d-flex justify-content-center align-items-center align-self-center mb-0"><a href="'.get_the_permalink().'" style="color:#fff;">' . get_the_title() . '</a></h5>';
}




remove_filter ('woocommerce_content', 'wc_get_gallery_image_html');
add_filter ('woocommerce_content', 'fwa_wc_get_gallery_image_html');

function fwa_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
	$flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
	$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
	$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
	$image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
	$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
	$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
	$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
	$alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
	$image             = wp_get_attachment_image(
		$attachment_id,
		$image_size,
		false,
		apply_filters(
			'woocommerce_gallery_image_html_attachment_image_params',
			array(
				'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
				'data-src'                => esc_url( $full_src[0] ),
				'data-large_image'        => esc_url( $full_src[0] ),
				'data-large_image_width'  => esc_attr( $full_src[1] ),
				'data-large_image_height' => esc_attr( $full_src[2] ),
				'class'                   => esc_attr( $main_image ? 'img-fluid' : '' ),
			),
			$attachment_id,
			$image_size,
			$main_image
		)
	);

	return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
}


add_filter('woocommerce_billing_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields( $fields ) {
  $fields['billing_address_1']['class'] = array( 'form-group' );
  $fields['billing_address_1']['input_class'] = array( 'form-control' );
  return $fields;
}




/**
 * woocommerce_single_product_summary hook
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 */

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);

/**
 * Hide category product count in product archives
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );


add_action( 'woocommerce_before_subcategory_title', function( $category ){
    // The opening div (priority 8)
    echo '<div class="col-md-12 p-0">';
}, 8, 1);

add_action( 'woocommerce_before_subcategory_title', function( $category ){
    // The closing div (priority 12)
    echo '</div>';
}, 12, 1);


add_filter( 'woocommerce_get_price_html', 'dw_change_default_price_html', 100, 2 );

function dw_change_default_price_html( $price,$product ){
    if ( $product->price > 0 ) {
      if ( $product->price && isset( $product->regular_price ) ) {
        $from = $product->regular_price;
        $to = $product->price;
        return '<p class="mb-0 h2"><ins><span class="amount">'.( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'</span></ins>
		<del><span class="amount">'. ( ( is_numeric( $from ) ) ? woocommerce_price( $from ) : $from ) .' </span></del></p>';
      } else {
        $to = $product->price;
        return '<ins><span class="amount">' . ( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) . '</span></ins>';
      }
   }
}




add_filter('woocommerce_sale_flash', 'dj_hide_sale_flash');
function dj_hide_sale_flash()
{
return false;
}



add_filter( 'dj_woocommerce_shop_loop_item_title', 'dj_woocommerce_shop_loop_item_title_custom' );

function dj_woocommerce_shop_loop_item_title_custom( $category ) {
	?>
    <h5 class="woocommerce-loop-category__title text-light d-flex justify-content-center align-items-center align-self-center mb-0" style="min-height: auto;">
        <?php
        echo esc_html( $category->name );
 
        if ( $category->count > 0 ) {
            echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
        }
        ?>
    </h5>
	<?php
}

//////////////////////////////////////////////////////////////////
//////////////////End WooComerece/////////////////////////////////
//////////////////////////////////////////////////////////////////




add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
remove_filter ('the_content', 'wpautop');



if (is_user_logged_in()) 
{
    show_admin_bar(true);
}



function fwa_scripts() 
{
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




function my_jquery_enqueue() 
{
   wp_deregister_script('jquery');

}
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);




// remove dashicons in frontend to non-admin
function wpdocs_dequeue_dashicon() 
{
    if (current_user_can( 'update_core' )) 
	{
         return;
    }
     wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );





// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';





function register_my_menu() 
{
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );





function fwa_styles() 
{
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'fwa_styles' );





function new_excerpt_more($more) 
{
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );




// Numbered Pagination
if ( !function_exists('fwa_pagination')) 
{
	function fwa_pagination() 
	{
		global $wp_query;
		if ( $wp_query->max_num_pages <= 1 ) return; 

		$big = 999999999; // need an unlikely integer
		
		$pages = paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'type'  => 'array',
			) );

			if( is_array( $pages ) ) 
			{
				$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
				echo '<div class="pagination light-theme simple-pagination"><ul>';
				foreach ( $pages as $page ) 
				{
						echo "<li>$page</li>";
				}
			   echo '</ul>';
			   echo '</div>';
			}
	}
}




function yoastVariableToTitle($post_id) 
{
    $yoast_title = get_post_meta($post_id, '_yoast_wpseo_title', true);
    $title = strstr($yoast_title, '%%', true);

    if (empty($title)) 
	{
        $title = get_the_title($post_id);
    }
    return $title;
}



/**
 * Gravatar Alt Fix
 * https://wphelper.site/fix-missing-gravatar-alt-tag-value/
 */
function gravatar_alt($text) 
{
    $alt = get_the_author_meta( 'display_name' );
    $text = str_replace('alt=\'\'', 'alt=\'Avatar for '.$alt.'\' title=\'Gravatar for '.$alt.'\'',$text);
    return $text;
}
add_filter('get_avatar','gravatar_alt');




/////////////////////////////////////////////////////////
////////////////Breadcrumbs//////////////////////////////
/////////////////////////////////////////////////////////
/**
 * Conditionally Override Yoast SEO Breadcrumb Trail
 * http://plugins.svn.wordpress.org/wordpress-seo/trunk/frontend/class-breadcrumbs.php
 * -----------------------------------------------------------------------------------
 */


function fwa_override_yoast_breadcrumb_trail( $links ) 
{
	global $post;
	$post_id = $post->ID;
	$terms = wp_get_post_terms( $post_id, 'county', array("fields" => "all"));
	$video_category_terms = wp_get_post_terms( $post_id, 'video-category', array("fields" => "all"));
	$project_category_terms = wp_get_post_terms( $post_id, 'project-category', array("fields" => "all"));
	$employee_category_terms = wp_get_post_terms( $post_id, 'employees-category', array("fields" => "all"));
	$product_category_terms = wp_get_post_terms( $post_id, 'product_cat', array("fields" => "all"));
	//print_r($product_category_terms);

	if ( is_singular() || is_archive() || is_tax()) 
	{
		if(is_post_type_archive('case-studies') || 
		is_post_type_archive('employees') || 
		is_post_type_archive('latest-projects') || 
		is_post_type_archive('videos') ||
		is_post_type_archive('product') ||
		is_tax( 'county' ) || 
		is_tax( 'video-category' ) || 
		is_tax( 'project-category' ) ||
		is_tax( 'employees-category' ) || 
		is_tax( 'product_cat' ) || 
		is_home() || 
		is_page($post_id ) ||
		is_singular('employees') ||
		is_singular('latest-projects') ||
		is_singular('case-studies') ||
		is_singular('videos') ||
		is_singular('product') ||
		is_singular('contaminants'))
        {
			//nothing to see here
		}else{
			$breadcrumb[] = array(
				'url' => get_permalink( get_option( 'page_for_posts' ) ),
				'text' => 'Marketing Tips',
			);
	
			array_splice( $links, 1, -2, $breadcrumb );
		}
		
		

		if(is_tax( 'product_cat' ))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/shop/",
				'text' => 'Shop',
			);
	
			array_splice( $links, 1, -2, $breadcrumb );
		}


		if(is_product())
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/product-category/".$product_category_terms[0]->slug."/",
				'text' => $product_category_terms[0]->name,
			);
	
			array_splice( $links, 2, -1, $breadcrumb );
		}


		

		if(is_post_type_archive('videos'))
        {
			$breadcrumb[] = array(
				'url' => get_permalink( get_option( 'page_for_posts' ) ),
				'text' => 'Video Categories'
			);
	
			array_splice( $links, -1, 2, $breadcrumb );
		}

		if(is_post_type_archive('latest-projects'))
        {
			$breadcrumb[] = array(
				'url' => get_permalink( get_option( 'page_for_posts' ) ),
				'text' => 'Project Categories'
			);
	
			array_splice( $links, -1, 2, $breadcrumb );
		}





		if (!is_tax('video-category') && 
		!is_tax('project-category') && 
		!is_tax('employees-category') && 
		!is_tax( 'county' ) &&
		!is_post_type_archive('case-studies') && 
		!is_post_type_archive('employees') && 
		!is_post_type_archive('latest-projects') &&
		!is_post_type_archive('videos') &&
		!is_category()
		)
        



	



		



		if(is_tax('employees-category'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/employees/",
				'text' => 'Employee Categories',
			);
	
			array_splice( $links, -1, -1, $breadcrumb );
		}








		if(is_tax('video-category'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/videos/",
				'text' => 'Video Categories',
			);
	
			array_splice( $links, -1, -1, $breadcrumb );
		}
		

		if(is_tax('project-category'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/latest-projects/",
				'text' => 'Project Categories',
			);
	
			array_splice( $links, -1, -1, $breadcrumb );
		}

		



		if(is_singular('employees'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/employees/",
				'text' => 'Employee Categories',
			);
	
			array_splice( $links, -2, 1, $breadcrumb );
		}


		if(is_singular('employees'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/employees-category/".$employee_category_terms[0]->slug."/",
				'text' => $employee_category_terms[0]->name,
			);
	
			array_splice( $links, -2, 1, $breadcrumb );
		}









		if(is_singular('latest-projects'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/latest-projects/",
				'text' => 'Project Categories',
			);
	
			array_splice( $links, -2, 1, $breadcrumb );
		}

		if(is_singular('latest-projects'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/project-category/".$project_category_terms[0]->slug."/",
				'text' => $project_category_terms[0]->name,
			);
	
			array_splice( $links, -2, 1, $breadcrumb );
		}



		if(is_singular('videos'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/videos/",
				'text' => 'Video Categories',
			);
	
			array_splice( $links, -2, 1, $breadcrumb );
		}

		if(is_singular('videos'))
        {
			$breadcrumb[] = array(
				'url' => "http://localhost/wfo/video-category/".$video_category_terms[0]->slug."/",
				'text' => $video_category_terms[0]->name,
			);
	
			array_splice( $links, -2, 1, $breadcrumb );
		}	
    }

    return $links;
}
add_filter( 'wpseo_breadcrumb_links', 'fwa_override_yoast_breadcrumb_trail' );
/////////////////////////////////////////////////////////
///////////End Breadcrumbs///////////////////////////////
/////////////////////////////////////////////////////////













///////////////////////////////////////////////////////////////////////////
///////////////////////////Shortcodes//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////





// >> Create Shortcode to Display Products shortcode
 
function dj_create_shortcode_products()
{
	$taxonomy = 'product-category';
            $terms = get_terms($taxonomy, array(
              'hide_empty' => false,
              'orderby' => 'title',
              'order'   => 'ASC',
          )); // Get all terms of a taxonomy
             
$result = "";

	if ( $terms && !is_wp_error( $terms ) )
	{
		$result .= 	'<div class="card-deck text-center">';
							foreach ( $terms as $term_one ) 
							{
								$term_one_id = $term_one->term_id;
								$image_id = get_term_meta ( $term_one_id, 'category-image-id', true );
								$the_image = wp_get_attachment_image_src ( $image_id, 'large' )[0];
								//print_r($term_one->description);
							
								
								$result .= 	'<div class="card mb-2 box-shadow hover-box scroll-animations">';
								$result .= '<a href="' .  get_term_link($term_one->slug, $taxonomy).'">';
								$result .= 	'<div class="card-header">';
								$result .= '<h2 class="text-light my-0">' . $term_one->name .'</h2>';
									$result .= 	'</div>';
									$result .= '<div class="card-body" style="padding: 0;">';
									$result .= '<img class="img-fluid alignnone" src="'. $the_image .'"' . ' alt=' .$term_one->name.  '/>';
									$result .= 	'<p class="btn btn-primary text-light w-100 mb-0 mt-0" style=" margin-top: 2%;">View Products</p>';
									$result .= 	'</div>';
									$result .= 	'</a>';
									$result .= 	'</div>';						
							}
		$result .= 	'</div>';			
		return $result;			
	}
}
add_shortcode( 'products', 'dj_create_shortcode_products' );







// >> Create Shortcode to Display Projects
 
function dj_create_shortcode_latest_projects_post_type($atts)
{
	$atts = shortcode_atts(
        array(
            'city' => '',
        ), $atts, 'latest-projects');


		if($atts["city"])
		{
			$args = array(
							'post_type'      => 'latest-projects',
							'posts_per_page' => '3',
							'publish_status' => 'published',
							'order' => 'DESC',
							'meta_key' => 'project_city',
							'meta_value' => $atts["city"]
						);
		}else{
			$args = array(
				'post_type'      => 'latest-projects',
				'posts_per_page' => '3',
				'publish_status' => 'published',
				'order' => 'DESC'
			);
		}
				 
    $query = new WP_Query($args);
	global $post;
	$result ="";
		
			if($query->have_posts())
			{
				$result .= "<div class='card-deck text-center'>";
					while($query->have_posts())
					{
						//$city =  $query->get_post_custom_values($key = "project_city"); 
						//echo $city;
						
						$query->the_post() ;
						$result .= "<div class='col-lg-4 col-md-6 col-sm-12 col-xm-12'>";
						$result .= "<div class='border hover-box mb-4 scroll-animations'>";
						$result .=  "<a href='".get_the_permalink()."'".">";
						$result .= "<h2 class='text-center bg-primary text-light p-2 mb-0 d-flex justify-content-center align-items-center align-self-center' style='min-height: 120px;'>" . get_the_title() ."</h2>";
						$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
						$result .=  get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto w-100' ) );
						$result .=  "</div>";
						$result .=  "<p class='w-100 ml-auto mr-auto btn btn-primary text-light mt-0 mb-0'>Learn More</p>";
						$result .=  "</a>";
						$result .=  "</div>";
						$result .=  "</div>";
						
					}
				$result .= "</div>";
				$result .= '<a href="http://localhost/wfo/latest-projects/" class="btn btn-primary float-right">View Projects</a>';
			}else{
				$result .= "<div class='col'>";
				$result .= "<p class='text-center'>Sorry We Have Not Published Any Projects In ".$atts["city"].". Please Check Back Soon.</p>";
				$result .= '<a href="http://localhost/wfo/latest-projects/" class="btn btn-primary">View Projects</a>';
				$result .=  "</div>";
			}

        wp_reset_postdata();   
    return $result;            
}
add_shortcode( 'latest-projects', 'dj_create_shortcode_latest_projects_post_type' );



 
// Creating Shortcodes to display posts from category
function dj_shortcode_display_post($attr, $content = null)
{
 
    global $post;
 
    // Defining Shortcode's Attributes
    $shortcode_args = shortcode_atts(
                        array(
                                'cat'     => '',
                                'num'     => '3',
                                'order'  => 'desc'
                        ), $attr);    
     
    // array with query arguments
    $args = array(
                    'cat'              => $shortcode_args['cat'],
                    'posts_per_page' => $shortcode_args['num'],
                    'order'          => $shortcode_args['order'],
                     
                 );
 
     
    $recent_posts = get_posts($args);
 
    $result = '<div class="row d-flex justify-content-center align-items-center align-self-center bg-light pt-4 pb-4 text-center">';
	$result .= '<div class="col-lg-8 col-md-12">';
	$result .= '<h2>Recent Articles</h2>';
	$result .= '<p class="lead">Read and subscribe to our content that covers a wide range of topics related to digital marketing</p>';
	$result .= "<div class=''>";
	$result .= '<div class="row">';
	$counter = 0;
    foreach ($recent_posts as $post) :
	
        setup_postdata($post);
 
        
        
 
			
		$result .= "<div class='col-lg-4 col-md-4 col-sm-6 col-xm-12''>";
			$result .= "<div class='border hover-box mb-4 scroll-animations'>";
			$result .= "<a href='".get_the_permalink()."'"."class=''>";
			$result .= "<h2 class='card-title text-center card-header p-2 d-flex justify-content-center align-items-center align-self-center' style='min-height: 114px;'>" . get_the_title() ."</h2>";
			
			$img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "medium" );
			$url = $img[0];
			$width = $img[1];
			$height = $img[2];

			$result .=  "<div class='text-center'>";
			$result .= '<img class="img-fluid w-100" src="'.$url.'" alt="'.get_the_title().'" width="'.$width.'" height="'.$height.'"/>';
			$result .=  '<p class="p-2" style="min-height: 190px;">'.wp_trim_words( get_the_excerpt(), 16, '...' ).'</p>';
			$result .=  "</div>";
			$result .=  "<p class='col-12 m-0 w-100 ml-auto mr-auto btn btn-primary text-light'>Learn More</p>";
			$result .=  "</a>";
			$result .=  "</div>";
			$result .=  "</div>";
	
		
		
 
        wp_reset_postdata();
		
		$counter++;
         
 
 
    endforeach;    
	$result .= '</div>';
	$result .= '<a href="http://localhost/djwebmedia/marketing-tips/" class="btn btn-primary float-right">Read More Articles</a>'; 
		$result .= "</div>";
		$result .= '</div>';
		$result .= '</div>';
    wp_reset_postdata();
 
    
     
    return $result;

 
}
 
add_shortcode( 'recent_posts', 'dj_shortcode_display_post' );


// >> Create Shortcode to Display Reviews of the Case Studies Post Types
 
function dj_create_shortcode_reviews_post_type()
{
 
    $args = array(
                    'post_type'      => 'case-studies',
                    'posts_per_page' => '3',
					'publish_status' => 'published',
					'orderby' => 'date', 
					'order' => 'ASC'
                 );
 
    $query = new WP_Query($args);
 
    if($query->have_posts()) :
		$result = "<div class='d-flex justify-content-center align-items-center align-self-center'>";
		$result .= '<div class="row">';
        while($query->have_posts()) :
 
			$query->the_post() ;

			$result .= '<a href="'.get_the_permalink().'" class="no-underline industries-link col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mt-3">';
					$result .= '<div>';
						$result .= '<div class="col-12 bg-light border border-black hover-box">';
							$result .= '<div class="row align-items-center p-2">';
								$result .= '<div class="col-12 p-0">';
									$result .= '<img class="img-fluid" src="'.get_the_post_thumbnail_url().'" alt=Contractor Marketing, "'.get_the_title().'" />';
								$result .= '</div>';
								$result .= '<div class="col-12 p-0">';
									$result .= '<p class="xs m-0 thirds center-txt"><strong>'.get_post_meta( get_the_ID(), "title", true ).'</strong></p>';
									$result .= '<p class="xs m-0 thirds center-txt">'.get_post_meta( get_the_ID(), "desc", true ).'</p>';
									$result .= '<p class="xs m-0 thirds center-txt"><strong>- '.get_post_meta( get_the_ID(), "owner", true ).' Owner Of</strong></p>';
									$result .= '<p class="xs m-0 thirds center-txt"><strong>'.get_the_title().'</strong></p>';
									
									switch (get_post_meta( get_the_ID(), "rating", true )) {
										case 1:
											$result .= "<p class='center-txt'><span class='fa fa-star checked'></span>
														<span class='fa fa-star'></span>
														<span class='fa fa-star'></span>
														<span class='fa fa-star'></span>
														<span class='fa fa-star'></span></p>";
											break;
										case 2:
											$result .= "<p class='center-txt'><span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star'></span>
														<span class='fa fa-star'></span>
														<span class='fa fa-star'></span></p>";
											break;
										case 3:
											$result .= "<p class='center-txt'><span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star'></span>
														<span class='fa fa-star'></span></p>";
											break;
										case 4:
											$result .= "<p class='center-txt'><span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star'></span></p>";
											break;
										case 5:
											$result .= "<p class='center-txt'><span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span>
														<span class='fa fa-star checked'></span></p>";
											break;
										}
								$result .= '</div>';
							$result .= '</div>';
						$result .= '</div>';
					$result .= '</div>';
				
			$result .= '</a>';
        
 
		endwhile;
		$result .= '</div>';
		$result .= "</div>";
 
        wp_reset_postdata();
 
    endif;    
 
    return $result;            
}
add_shortcode( 'reviews', 'dj_create_shortcode_reviews_post_type' );







// >> Create Shortcode to Display Contaminants shortcode
 
function dj_create_shortcode_employee($atts)
{
	$atts = shortcode_atts(
        array(
            'name' => '',
			"direction" => '',
        ), $atts, 'employee');




 
		
			$args = array(
				'post_type' => 'employees',
				'posts_per_page' => '-1',
				'orderby' => 'title',
				'order'   => 'ASC',
			 );
			 	
	
	



    $query = new WP_Query($args);


//print_r($query);

		$result = '<div class="row">';

        while($query->have_posts() ) :
 
			$query->the_post() ;
			$theContent = get_the_excerpt();
			if(get_the_title() === $atts['name']) 
			{
				
			
				
				if($atts['direction'] == 'left')
				{
					$result .= "<div class='col-lg-3 col-md-12 pr-0 pl-0 '>";
					$result .= '<img class="img-fluid" src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" width="1300"/>';
					$result .=  "</div>";
					$result .= "<div class='col-lg-9 col-md-12'>";
					$result .= '<div class="row-fluid ">';
					$result .= "<h2>" . get_the_title() ."</h2>";
					$result .= '<p>'.$theContent.'</p>';
					$result .= '</div>';
					$result .=  "</div>";

				}

				if($atts['direction'] == 'right')
				{
					$result .= "<div class='col-lg-9 col-md-12'>";
					$result .= '<div class="row-fluid">';
					$result .= "<h2>" . get_the_title() ."</h2>";
					$result .= '<p>'.$theContent.'</p>';
					$result .= '</div>';
					$result .=  "</div>";
					$result .= "<div class='col-lg-3 col-md-12 pr-0 pl-0'>";
					$result .= '<img class="img-fluid" src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" width="1300"/>';
					$result .=  "</div>";
				}

				
}
			endwhile;
			$result .= '</div>';
	
			
        wp_reset_postdata();
 
     
 
    return $result;            
}

add_shortcode( 'employee', 'dj_create_shortcode_employee' );



// >> Create Shortcode to Display Industries Post Types
 
function dj_create_shortcode_latest_industries_post_type(){
 
    $args = array(
                    'post_type'      => 'Industries',
                    'posts_per_page' => '10',
                    'publish_status' => 'published',
                 );
 
    $query = new WP_Query($args);
 
    if($query->have_posts()) :
		$result = "<div class='col-12'>";
		$result .= '<div class="row d-flex justify-content-center align-items-center align-self-center">';
        while($query->have_posts()) :
 
			$query->the_post() ;

			$result .= '<a href="'.get_the_permalink().'" class="industries-link col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">';
					$result .= '<div class="row p-2">';
						$result .= '<div class="col-12 bg-light border border-black hover-box">';
							$result .= '<div class="row align-items-center p-2">';
								$result .= '<div class="col-12 p-0">';
									$result .= '<img class="ml-2 img-fluid" src="'.get_the_post_thumbnail_url().'" alt="Contractor Marketing For The '.get_the_title().' Industry" />';
								$result .= '</div>';
								$result .= '<div class="col-12 p-0">';
									$result .= '<p class="xs m-0 thirds center-txt"><strong>'.get_the_title().'</strong></p>';
								$result .= '</div>';
							$result .= '</div>';
						$result .= '</div>';
					$result .= '</div>';
				
			$result .= '</a>';
        
 
		endwhile;
		$result .= '</div>';
		$result .= "</div>";
 
        wp_reset_postdata();
 
    endif;    
 
    return $result;            
}
 
add_shortcode( 'industries', 'dj_create_shortcode_latest_industries_post_type' );


// >> Create Shortcode to Display Program Post Types
 
function dj_create_shortcode_latest_industy_projects($atts){
	$atts = shortcode_atts(
        array(
            'industry' => '',
        ), $atts, 'industy_projects');
	//print_r($atts);

		



	global $post;
	$taxonomy = 'project-category';
		$terms = get_terms($taxonomy, array(
		  'hide_empty' => false,
		  'orderby' => 'title',
		  'order'   => 'ASC',
	  )); // Get all terms of a taxonomy
	  //print_r($terms);
 foreach($terms as $term) 
	{ 
		
		if($term->name == ucfirst($atts['industry']))
		{
			$args = array(
				'post_type' => 'latest-projects',
				'posts_per_page' => '3',
				'tax_query' => array(
				   'relation' => 'AND',
				   array(
					  'taxonomy' => 'project-category',
					  'field' => 'slug',
					  'terms' => array($term->name),
				   )
				)
			 );
			 $url = $term->slug;
			
		}
	}





//print_r($term);


	
			 //print_r($args);
			 //print_r($args[tax_query][0][terms]);

			 

			//print_r($term_single->name);
			 
		//echo $term_list[0]->name;

//print_r($term_single);


		
	
	
	

    $query = new WP_Query($args);
 
	if($query->have_posts()) :

		$result = "<div class=''>";
		$result .= '<div class="row">';
        while($query->have_posts()) :
 
			$query->the_post() ;
			$theContent = wp_trim_words( get_the_excerpt(), 16, '...' );
			
			
			$result .= "<div class='col-lg-4 col-md-6 col-sm-12 col-xm-12'>";
			$result .=  "<a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto text-light mt-2'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .= "<h2 class='text-center bg-primary text-light p-2 mb-0 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_the_title() ."</h2>";
			$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
			$result .=  get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-fluid mr-auto ml-auto' ) );
			$result .=  "</div>";
			$result .=  "<p class='w-100 ml-auto mr-auto btn btn-primary text-light mt-2 mb-0'>Learn More</p>";
			$result .=  "</div>";
			$result .=  "</div>";
                
              
             
           
        
 
		endwhile;
		$result .= '</div>';
		$result .= "</div>";
				$result .= '<div class="row">';
				$result .=  "<p class='col-12'><a href='https://djwebmedia.com/project-category/".$url."/'"."class='w-100 ml-auto mr-auto btn btn-success'>View More ".ucfirst($atts["industry"])." Projects</a></p>";
				$result .= "</div>";
		
        wp_reset_postdata();
 
    endif;    
 
    return $result;            
}

add_shortcode( 'industy_projects', 'dj_create_shortcode_latest_industy_projects' );




// >> Create Shortcode to Display Program Post Types
 
function dj_create_shortcode_other_programs_post_type($atts){

	

	global $post;
	$term_list = wp_get_post_terms($post->ID, "other-program-category", array("fields" => "all"));
 foreach($term_list as $term_single) 
 { 
		
		
	$args = array(
		'post_type'      => 'other-programs',
		'posts_per_page' => '20',
		'publish_status' => 'published',
		'orderby' => 'date', 
		'order' => 'DSC'
	 );
	 //print_r($args);
	 //print_r($args[tax_query][0][terms]);

	 echo "<br>";

	 print_r($term_single->name);
	 
//echo $term_list[0]->name;







$query = new WP_Query($args);

if($query->have_posts()) :
$result = "<div>";
$result .= "<div class=' d-flex justify-content-center align-items-center align-self-center'>";
$result .= '<div class="row">';
while($query->have_posts()) :

	$query->the_post() ;
	$theContent = wp_trim_words( get_the_excerpt(), 16, '...' );
	
	
	$result .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xm-12'>";
	$result .= "<div class='border hover-box mb-4'>";
	$result .= "<h2 class='text-center bg-primary text-light p-2 h3 d-flex justify-content-center align-items-center align-self-center' style='min-height: 80px;'>" . get_the_title() ."</h2>";
	$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
	$result .=  get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'img-fluid mr-auto ml-auto', 'alt' => esc_html ( get_the_title() ) ) );
	$result .=  "</div>";
	$result .=  "<p class='p-3 text-center' style='min-height: 145px;'>";
	$result .=  $theContent;
	$result .=  "</p>";
	$result .=  "<p class='col-12'><a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn btn-cta text-light'>Learn More</a></p>";
	$result .=  "</div>";
	$result .=  "</div>";
		
	  
	 
   


endwhile;
$result .= '</div>';
$result .= "</div>";
$result .= "</div>";
wp_reset_postdata();

endif;    

return $result;            
}
}
add_shortcode( 'other-programs', 'dj_create_shortcode_other_programs_post_type' );



// >> Create Shortcode to Display Program Post Types
 
function dj_create_shortcode_latest_programs_post_type($atts){

	

	global $post;
	$term_list = wp_get_post_terms($post->ID, "program-category", array("fields" => "all"));
 foreach($term_list as $term_single) 
	{ 
		
		
			$args = array(
				'post_type'      => 'contractor-programs',
				'posts_per_page' => '20',
				'publish_status' => 'published',
				'orderby' => 'date', 
				'order' => 'DSC'
			 );
			 //print_r($args);
			 //print_r($args[tax_query][0][terms]);

			 echo "<br>";

			 print_r($term_single->name);
			 
		//echo $term_list[0]->name;


		
	
	
	

    $query = new WP_Query($args);
 
	if($query->have_posts()) :
		$result = "<div>";
		$result .= "<div class=' d-flex justify-content-center align-items-center align-self-center'>";
		$result .= '<div class="row">';
        while($query->have_posts()) :
 
			$query->the_post() ;
			$theContent = wp_trim_words( get_the_excerpt(), 16, '...' );
			
			
			$result .= "<div class='col-lg-3 col-md-4 col-sm-6 col-xm-12'>";
			$result .=  "<a href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto text-light'>";
			$result .= "<div class='border hover-box mb-4'>";
			$result .= "<h2 class='text-center bg-primary text-light p-2 d-flex justify-content-center align-items-center align-self-center' style='min-height: 110px;'>" . get_the_title() ."</h2>";
			$result .= "<div class='d-flex justify-content-center align-items-center align-self-center m-0'>";
			$result .=  get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'img-fluid mr-auto ml-auto', 'alt' => esc_html ( get_the_title() ) ) );
			$result .=  "</div>";
			$result .=  "<p class='p-3 text-center' style='min-height: 240px;'>";
			$result .=  $theContent;
			$result .=  "</p>";
			$result .=  "<p href='".get_the_permalink()."'"."class='w-100 ml-auto mr-auto btn mb-0 btn-primary text-light'>Learn More</p>";
			$result .=  "</div>";
			$result .=  "</a>";
			$result .=  "</div>";
                
              
             
           
        
 
		endwhile;
		$result .= '</div>';
		$result .= "</div>";
		$result .= "</div>";
        wp_reset_postdata();
 
    endif;    
 
    return $result;            
}
}
add_shortcode( 'program-contractor', 'dj_create_shortcode_latest_programs_post_type' );





///////////////////////////////////////////////////////////////////////////
///////////////////////End Shortcodes//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////





///////////////////////////////////////////////////////////////////////////
///////////////////////////Taxonomies//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
	





// Register Custom Taxonomy
function custom_taxonomy_employees_category() 
{

	$labels = array(
		'name'                       => _x( 'Employee Categories', 'Employee Category General Name', 'text_domain' ),
		'singular_name'              => _x( 'Employee Category', 'Employee Category Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Employee Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Employee Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Employee Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Employee Category', 'text_domain' ),
		'update_item'                => __( 'Update Employee Category', 'text_domain' ),
		'view_item'                  => __( 'View Employee Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Employee Categories', 'text_domain' ),
		'search_items'               => __( 'Search Employee Categories', 'text_domain' ),
		'not_found'                  => __( 'Employee Category Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Employee Categories', 'text_domain' ),
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
	register_taxonomy( 'employees-category', array( 'employees' ), $args );

}
add_action( 'init', 'custom_taxonomy_employees_category', 0 );








// Register Custom Taxonomy
function custom_taxonomy_project_category() 
{

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









// Register Custom Taxonomy
function custom_taxonomy_video_category() 
{

	$labels = array(
		'name'                       => _x( 'Video Categories', 'Video Category General Name', 'text_domain' ),
		'singular_name'              => _x( 'Video Category', 'Video Category Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Video Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Video Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Video Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Video Category', 'text_domain' ),
		'update_item'                => __( 'Update Video Category', 'text_domain' ),
		'view_item'                  => __( 'View Video Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Video Categories', 'text_domain' ),
		'search_items'               => __( 'Search Video Categories', 'text_domain' ),
		'not_found'                  => __( 'Video Category Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Video Categories', 'text_domain' ),
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
	register_taxonomy( 'video-category', array( 'videos' ), $args );

}
add_action( 'init', 'custom_taxonomy_video_category', 0 );


// Register Custom Taxonomy
function custom_taxonomy_industry_category() {

	$labels = array(
		'name'                       => _x( 'Industry Categories', 'Industry Category General Name', 'text_domain' ),
		'singular_name'              => _x( 'Industry Category', 'Industry Category Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Industry Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Industry Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Industry Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Industry Category', 'text_domain' ),
		'update_item'                => __( 'Update Industry Category', 'text_domain' ),
		'view_item'                  => __( 'View Industry Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Industry Categories', 'text_domain' ),
		'search_items'               => __( 'Search Industry Categories', 'text_domain' ),
		'not_found'                  => __( 'Industry Category Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Industry Categories', 'text_domain' ),
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
	register_taxonomy( 'industry-category', array( 'Industries' ), $args );

}
add_action( 'init', 'custom_taxonomy_industry_category', 0 );




///////////////////////////////////////////////////////////////////////////
///////////////////////End Taxonomies//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////









///////////////////////////////////////////////////////////////////////////
///////////////////////Custom Post Types///////////////////////////////////
///////////////////////////////////////////////////////////////////////////	






/*
* Creating a function to create our CPT - ADS
*/
 
function custom_post_type_ads() 
{
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Ads', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Ad', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Ads', 'fwa' ),
			'parent_item_colon'   => __( 'Parent Ad', 'fwa' ),
			'all_items'           => __( 'All Ads', 'fwa' ),
			'view_item'           => __( 'View Ad', 'fwa' ),
			'add_new_item'        => __( 'Add New Ad', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Ad', 'fwa' ),
			'update_item'         => __( 'Update Ad', 'fwa' ),
			'search_items'        => __( 'Search Ad', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'ads', 'fwa' ),
			'description'         => __( 'Ads', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'ads' ),
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
			'menu_position'       => 4,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'ads', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_ads', 0 );




/*
* Creating a function to create our CPT - Case Studies
*/
 
function custom_post_type_case_studies() 
{
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Case Studies', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Case Studies', 'fwa' ),
			'parent_item_colon'   => __( 'Parent Case Study', 'fwa' ),
			'all_items'           => __( 'All Case Studies', 'fwa' ),
			'view_item'           => __( 'View Case Study', 'fwa' ),
			'add_new_item'        => __( 'Add New Case Study', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Case Study', 'fwa' ),
			'update_item'         => __( 'Update Case Study', 'fwa' ),
			'search_items'        => __( 'Search Case Study', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Case Studies', 'fwa' ),
			'description'         => __( 'Case Studies', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'case-studies' ),
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
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'case-studies', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_case_studies', 0 );




	

/*
* Creating a function to create our CPT - Employees
*/
 
function custom_post_type_employees() 
{
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Employees', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Employee', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Employees', 'fwa' ),
			'parent_item_colon'   => __( 'Parent Employee', 'fwa' ),
			'all_items'           => __( 'All Employees', 'fwa' ),
			'view_item'           => __( 'View Employee', 'fwa' ),
			'add_new_item'        => __( 'Add New Employee', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Employee', 'fwa' ),
			'update_item'         => __( 'Update Employee', 'fwa' ),
			'search_items'        => __( 'Search Employee', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Employees', 'fwa' ),
			'description'         => __( 'Employees', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'employees-category' ),
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
			'menu_position'       => 6,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'employees', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_employees', 0 );








/*
* Creating a function to create our CPT - Latest Projects
*/
 
function custom_post_type_latest_projects() 
{
 
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






/*
* Creating a function to create our CPT - Videos
*/
 
function custom_post_type_videos() 
{
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Videos', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Videos', 'fwa' ),
			'parent_item_colon'   => __( 'Parent video', 'fwa' ),
			'all_items'           => __( 'All Videos', 'fwa' ),
			'view_item'           => __( 'View Video', 'fwa' ),
			'add_new_item'        => __( 'Add New Video', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Video', 'fwa' ),
			'update_item'         => __( 'Update Video', 'fwa' ),
			'search_items'        => __( 'Search Video', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Videos', 'fwa' ),
			'description'         => __( 'Videos', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'video-category' ),
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
			'menu_position'       => 10,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'videos', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_videos', 0 );

	
/*
* Creating a function to create our CPT - programs
*/
 
function custom_post_type_contractor_programs() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Contractor Programs', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Contractor Program', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Contractor Programs', 'fwa' ),
			'parent_item_colon'   => __( 'Parent Program', 'fwa' ),
			'all_items'           => __( 'All Contractor Programs', 'fwa' ),
			'view_item'           => __( 'View Program', 'fwa' ),
			'add_new_item'        => __( 'Add New Program', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Program', 'fwa' ),
			'update_item'         => __( 'Update Program', 'fwa' ),
			'search_items'        => __( 'Search Program', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Contractor Programs', 'fwa' ),
			'description'         => __( 'Contractor Programs', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'contractor-program-category' ),
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
			'menu_position'       => 10,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'contractor-programs', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_contractor_programs', 0 );

















/*
* Creating a function to create our CPT - programs
*/
 
function custom_post_type_other_programs() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Other Programs', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Other Program', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Other Programs', 'fwa' ),
			'parent_item_colon'   => __( 'Parent Program', 'fwa' ),
			'all_items'           => __( 'All Other Programs', 'fwa' ),
			'view_item'           => __( 'View Program', 'fwa' ),
			'add_new_item'        => __( 'Add New Program', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Program', 'fwa' ),
			'update_item'         => __( 'Update Program', 'fwa' ),
			'search_items'        => __( 'Search Program', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Other Programs', 'fwa' ),
			'description'         => __( 'Other Programs', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'other-program-category' ),
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
			'menu_position'       => 10,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'other-programs', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_other_programs', 0 );



/*
* Creating a function to create our CPT - Industries
*/
 
function custom_post_type_industries() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Industries', 'Post Type General Name', 'fwa' ),
			'singular_name'       => _x( 'Industry', 'Post Type Singular Name', 'fwa' ),
			'menu_name'           => __( 'Industries', 'fwa' ),
			'parent_item_colon'   => __( 'Parent Industry', 'fwa' ),
			'all_items'           => __( 'All Industries', 'fwa' ),
			'view_item'           => __( 'View Industry', 'fwa' ),
			'add_new_item'        => __( 'Add New Industry', 'fwa' ),
			'add_new'             => __( 'Add New', 'fwa' ),
			'edit_item'           => __( 'Edit Industry', 'fwa' ),
			'update_item'         => __( 'Update Industry', 'fwa' ),
			'search_items'        => __( 'Search Industry', 'fwa' ),
			'not_found'           => __( 'Not Found', 'fwa' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'fwa' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Industries', 'fwa' ),
			'description'         => __( 'Industries', 'fwa' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'industry-category' ),
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
			'menu_position'       => 10,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'Industries', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_industries', 0 );





///////////////////////////////////////////////////////////////////////////
////////////////////End Custom Post Types//////////////////////////////////
///////////////////////////////////////////////////////////////////////////	




//////////////////////////////////////////////////////////////////
//////////////////////Taxonomy Images/////////////////////////////
//////////////////////////////////////////////////////////////////





/**
 * Add images to the County Taxonomy
 **/
if ( ! class_exists( 'CT_TAX_META' ) ) 
{

class CT_TAX_META 
{

  public function __construct() 
  {
    //
  }
 
 /*
  * Initialize the class and start calling our hooks and filters
  * @since 1.0.0
 */
 public function init() 
 {

   add_action( 'county_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
   add_action( 'created_county', array ( $this, 'save_category_image' ), 10, 2 );
   add_action( 'county_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
   add_action( 'edited_county', array ( $this, 'updated_category_image' ), 10, 2 );
   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
   add_action( 'admin_footer', array ( $this, 'add_script' ) );
 }

public function load_media() 
{
 wp_enqueue_media();
}
 
 /*
  * Add a form field in the new category page
  * @since 1.0.0
 */
 public function add_category_image ( $taxonomy ) 
 { ?>
   <div class="form-field term-group">
     <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
    </p>
   </div>
 <?php
 }
 
 /*
  * Save the form field
  * @since 1.0.0
 */
 public function save_category_image ( $term_id, $tt_id ) 
 {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
   {
     $image = $_POST['category-image-id'];
     add_term_meta( $term_id, 'category-image-id', $image, true );
   }
 }
 
 /*
  * Edit the form field
  * @since 1.0.0
 */
 public function update_category_image ( $term, $taxonomy ) 
 { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
       <div id="category-image-wrapper">
         <?php if ( $image_id ) 
		 { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
       </p>
     </td>
   </tr>
 <?php
 }

/*
 * Update the form field value
 * @since 1.0.0
 */
 public function updated_category_image ( $term_id, $tt_id ) 
 {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
   {
     $image = $_POST['category-image-id'];
     update_term_meta ( $term_id, 'category-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'category-image-id', '' );
   }
 }

/*
 * Add script
 * @since 1.0.0
 */
 public function add_script() 
 { ?>
   <script>
     jQuery(document).ready( function($) 
	 {
       function ct_media_upload(button_class) 
	   {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) 
		 {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment)
		   {
             if ( _custom_media ) 
			 {
               $('#category-image-id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     ct_media_upload('.ct_tax_media_button.button'); 
     $('body').on('click','.ct_tax_media_remove',function()
	 {
       $('#category-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) 
	 {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 )
	   {
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!="")
		 {
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
       }
     });
   });
 </script>
 <?php }

  }
 
$CT_TAX_META = new CT_TAX_META();
$CT_TAX_META -> init();
 
}












/**
 * Add images to the Video Category Taxonomy
 **/
if ( ! class_exists( 'CT_TAX_META_VIDEO' ) ) 
{

	class CT_TAX_META_VIDEO 
	{
	
	  public function __construct() 
	  {
		//
	  }
	 
	 /*
	  * Initialize the class and start calling our hooks and filters
	  * @since 1.0.0
	 */
	 public function init() 
	 {
	
	   add_action( 'video-category_add_form_fields', array ( $this, 'add_category_image_VIDEO' ), 10, 2 );
	   add_action( 'created_video-category', array ( $this, 'save_category_image_VIDEO' ), 10, 2 );
	   add_action( 'video-category_edit_form_fields', array ( $this, 'update_category_image_VIDEO' ), 10, 2 );
	   add_action( 'edited_video-category', array ( $this, 'updated_category_image_VIDEO' ), 10, 2 );
	   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
	   add_action( 'admin_footer', array ( $this, 'add_script' ) );
	 }
	
	public function load_media() 
	{
	 wp_enqueue_media();
	}
	 
	 /*
	  * Add a form field in the new category page
	  * @since 1.0.0
	 */
	 public function add_category_image_VIDEO ( $taxonomy ) 
	 { ?>
	   <div class="form-field term-group">
		 <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
		 <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
		 <div id="category-image-wrapper"></div>
		 <p>
		   <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
		   <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		</p>
	   </div>
	 <?php
	 }
	 
	 /*
	  * Save the form field
	  * @since 1.0.0
	 */
	 public function save_category_image_VIDEO ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 add_term_meta( $term_id, 'category-image-id', $image, true );
	   }
	 }
	 
	 /*
	  * Edit the form field
	  * @since 1.0.0
	 */
	 public function update_category_image_VIDEO ( $term, $taxonomy ) 
	 { ?>
	   <tr class="form-field term-group-wrap">
		 <th scope="row">
		   <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
		 </th>
		 <td>
		   <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
		   <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
		   <div id="category-image-wrapper">
			 <?php if ( $image_id ) 
			 { ?>
			   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
			 <?php } ?>
		   </div>
		   <p>
			 <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
			 <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		   </p>
		 </td>
	   </tr>
	 <?php
	 }
	
	/*
	 * Update the form field value
	 * @since 1.0.0
	 */
	 public function updated_category_image_VIDEO ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 update_term_meta ( $term_id, 'category-image-id', $image );
	   } else {
		 update_term_meta ( $term_id, 'category-image-id', '' );
	   }
	 }
	
	/*
	 * Add script
	 * @since 1.0.0
	 */
	 public function add_script() 
	 { ?>
	   <script>
		 jQuery(document).ready( function($) 
		 {
		   function ct_media_upload(button_class) 
		   {
			 var _custom_media = true,
			 _orig_send_attachment = wp.media.editor.send.attachment;
			 $('body').on('click', button_class, function(e) 
			 {
			   var button_id = '#'+$(this).attr('id');
			   var send_attachment_bkp = wp.media.editor.send.attachment;
			   var button = $(button_id);
			   _custom_media = true;
			   wp.media.editor.send.attachment = function(props, attachment)
			   {
				 if ( _custom_media ) 
				 {
				   $('#category-image-id').val(attachment.id);
				   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
				   $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
				 } else {
				   return _orig_send_attachment.apply( button_id, [props, attachment] );
				 }
				}
			 wp.media.editor.open(button);
			 return false;
		   });
		 }
		 ct_media_upload('.ct_tax_media_button.button'); 
		 $('body').on('click','.ct_tax_media_remove',function()
		 {
		   $('#category-image-id').val('');
		   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
		 });
		 // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
		 $(document).ajaxComplete(function(event, xhr, settings) 
		 {
		   var queryStringArr = settings.data.split('&');
		   if( $.inArray('action=add-tag', queryStringArr) !== -1 )
		   {
			 var xml = xhr.responseXML;
			 $response = $(xml).find('term_id').text();
			 if($response!="")
			 {
			   // Clear the thumb image
			   $('#category-image-wrapper').html('');
			 }
		   }
		 });
	   });
	 </script>
	 <?php }
	
	  }
	 
	$CT_TAX_META_VIDEO = new CT_TAX_META_VIDEO();
	$CT_TAX_META_VIDEO -> init();
	 
	}







/**
 * Add images to the County Taxonomy
 **/
if ( ! class_exists( 'CT_TAX_META' ) ) 
{

class CT_TAX_META 
{

  public function __construct() 
  {
    //
  }
 
 /*
  * Initialize the class and start calling our hooks and filters
  * @since 1.0.0
 */
 public function init() 
 {

   add_action( 'county_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
   add_action( 'created_county', array ( $this, 'save_category_image' ), 10, 2 );
   add_action( 'county_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
   add_action( 'edited_county', array ( $this, 'updated_category_image' ), 10, 2 );
   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
   add_action( 'admin_footer', array ( $this, 'add_script' ) );
 }

public function load_media() 
{
 wp_enqueue_media();
}
 
 /*
  * Add a form field in the new category page
  * @since 1.0.0
 */
 public function add_category_image ( $taxonomy ) 
 { ?>
   <div class="form-field term-group">
     <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
    </p>
   </div>
 <?php
 }
 
 /*
  * Save the form field
  * @since 1.0.0
 */
 public function save_category_image ( $term_id, $tt_id ) 
 {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
   {
     $image = $_POST['category-image-id'];
     add_term_meta( $term_id, 'category-image-id', $image, true );
   }
 }
 
 /*
  * Edit the form field
  * @since 1.0.0
 */
 public function update_category_image ( $term, $taxonomy ) 
 { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
       <div id="category-image-wrapper">
         <?php if ( $image_id ) { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
       </p>
     </td>
   </tr>
 <?php
 }

/*
 * Update the form field value
 * @since 1.0.0
 */
 public function updated_category_image ( $term_id, $tt_id ) 
 {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
   {
     $image = $_POST['category-image-id'];
     update_term_meta ( $term_id, 'category-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'category-image-id', '' );
   }
 }

/*
 * Add script
 * @since 1.0.0
 */
 public function add_script() 
 { ?>
   <script>
     jQuery(document).ready( function($) 
	 {
       function ct_media_upload(button_class) 
	   {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) 
		 {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment)
		   {
             if ( _custom_media ) 
			 {
               $('#category-image-id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     ct_media_upload('.ct_tax_media_button.button'); 
     $('body').on('click','.ct_tax_media_remove',function()
	 {
       $('#category-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) 
	 {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 )
	   {
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!="")
		 {
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
       }
     });
   });
 </script>
 <?php }

  }
 
$CT_TAX_META = new CT_TAX_META();
$CT_TAX_META -> init();
 
}









/**
 * Add images to the Video Category Taxonomy
 **/
if ( ! class_exists( 'CT_TAX_META_VIDEO' ) ) 
{

	class CT_TAX_META_VIDEO 
	{
	
	  public function __construct() 
	  {
		//
	  }
	 
	 /*
	  * Initialize the class and start calling our hooks and filters
	  * @since 1.0.0
	 */
	 public function init() 
	 {
	
	   add_action( 'video-category_add_form_fields', array ( $this, 'add_category_image_VIDEO' ), 10, 2 );
	   add_action( 'created_video-category', array ( $this, 'save_category_image_VIDEO' ), 10, 2 );
	   add_action( 'video-category_edit_form_fields', array ( $this, 'update_category_image_VIDEO' ), 10, 2 );
	   add_action( 'edited_video-category', array ( $this, 'updated_category_image_VIDEO' ), 10, 2 );
	   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
	   add_action( 'admin_footer', array ( $this, 'add_script' ) );
	 }
	
	public function load_media() 
	{
	 wp_enqueue_media();
	}
	 
	 /*
	  * Add a form field in the new category page
	  * @since 1.0.0
	 */
	 public function add_category_image_VIDEO ( $taxonomy ) 
	 { ?>
	   <div class="form-field term-group">
		 <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
		 <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
		 <div id="category-image-wrapper"></div>
		 <p>
		   <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
		   <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		</p>
	   </div>
	 <?php
	 }
	 
	 /*
	  * Save the form field
	  * @since 1.0.0
	 */
	 public function save_category_image_VIDEO ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 add_term_meta( $term_id, 'category-image-id', $image, true );
	   }
	 }
	 
	 /*
	  * Edit the form field
	  * @since 1.0.0
	 */
	 public function update_category_image_VIDEO ( $term, $taxonomy ) 
	 { ?>
	   <tr class="form-field term-group-wrap">
		 <th scope="row">
		   <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
		 </th>
		 <td>
		   <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
		   <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
		   <div id="category-image-wrapper">
			 <?php if ( $image_id ) 
			 { ?>
			   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
			 <?php } ?>
		   </div>
		   <p>
			 <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
			 <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		   </p>
		 </td>
	   </tr>
	 <?php
	 }
	
	/*
	 * Update the form field value
	 * @since 1.0.0
	 */
	 public function updated_category_image_VIDEO ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 update_term_meta ( $term_id, 'category-image-id', $image );
	   } else {
		 update_term_meta ( $term_id, 'category-image-id', '' );
	   }
	 }
	
	/*
	 * Add script
	 * @since 1.0.0
	 */
	 public function add_script() 
	 { ?>
	   <script>
		 jQuery(document).ready( function($) 
		 {
		   function ct_media_upload(button_class) 
		   {
			 var _custom_media = true,
			 _orig_send_attachment = wp.media.editor.send.attachment;
			 $('body').on('click', button_class, function(e) 
			 {
			   var button_id = '#'+$(this).attr('id');
			   var send_attachment_bkp = wp.media.editor.send.attachment;
			   var button = $(button_id);
			   _custom_media = true;
			   wp.media.editor.send.attachment = function(props, attachment)
			   {
				 if ( _custom_media ) 
				 {
				   $('#category-image-id').val(attachment.id);
				   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
				   $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
				 } else {
				   return _orig_send_attachment.apply( button_id, [props, attachment] );
				 }
				}
			 wp.media.editor.open(button);
			 return false;
		   });
		 }
		 ct_media_upload('.ct_tax_media_button.button'); 
		 $('body').on('click','.ct_tax_media_remove',function()
		 {
		   $('#category-image-id').val('');
		   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
		 });
		 // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
		 $(document).ajaxComplete(function(event, xhr, settings) 
		 {
		   var queryStringArr = settings.data.split('&');
		   if( $.inArray('action=add-tag', queryStringArr) !== -1 )
		   {
			 var xml = xhr.responseXML;
			 $response = $(xml).find('term_id').text();
			 if($response!="")
			 {
			   // Clear the thumb image
			   $('#category-image-wrapper').html('');
			 }
		   }
		 });
	   });
	 </script>
	 <?php }
	
	  }
	 
	$CT_TAX_META_VIDEO = new CT_TAX_META_VIDEO();
	$CT_TAX_META_VIDEO -> init();
	 
	}






/**
 * Add images to the Employee Category Taxonomy
 **/
if ( ! class_exists( 'CT_TAX_META_EMPLOYEE' ) ) 
{

	class CT_TAX_META_EMPLOYEE 
	{
	
	  public function __construct() 
	  {
		//
	  }
	 
	 /*
	  * Initialize the class and start calling our hooks and filters
	  * @since 1.0.0
	 */
	 public function init() 
	 {
	
	   add_action( 'employees-category_add_form_fields', array ( $this, 'add_category_image_EMPLOYEE' ), 10, 2 );
	   add_action( 'created_employees-category', array ( $this, 'save_category_image_EMPLOYEE' ), 10, 2 );
	   add_action( 'employees-category_edit_form_fields', array ( $this, 'update_category_image_EMPLOYEE' ), 10, 2 );
	   add_action( 'edited_employees-category', array ( $this, 'updated_category_image_EMPLOYEE' ), 10, 2 );
	   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
	   add_action( 'admin_footer', array ( $this, 'add_script' ) );
	 }
	
	public function load_media() 
	{
	 wp_enqueue_media();
	}
	 
	 /*
	  * Add a form field in the new category page
	  * @since 1.0.0
	 */
	 public function add_category_image_EMPLOYEE ( $taxonomy ) 
	 { ?>
	   <div class="form-field term-group">
		 <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
		 <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
		 <div id="category-image-wrapper"></div>
		 <p>
		   <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
		   <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		</p>
	   </div>
	 <?php
	 }
	 
	 /*
	  * Save the form field
	  * @since 1.0.0
	 */
	 public function save_category_image_EMPLOYEE ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 add_term_meta( $term_id, 'category-image-id', $image, true );
	   }
	 }
	 
	 /*
	  * Edit the form field
	  * @since 1.0.0
	 */
	 public function update_category_image_EMPLOYEE ( $term, $taxonomy ) 
	 { ?>
	   <tr class="form-field term-group-wrap">
		 <th scope="row">
		   <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
		 </th>
		 <td>
		   <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
		   <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
		   <div id="category-image-wrapper">
			 <?php if ( $image_id ) 
			 { ?>
			   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
			 <?php } ?>
		   </div>
		   <p>
			 <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
			 <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		   </p>
		 </td>
	   </tr>
	 <?php
	 }
	
	/*
	 * Update the form field value
	 * @since 1.0.0
	 */
	 public function updated_category_image_EMPLOYEE ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 update_term_meta ( $term_id, 'category-image-id', $image );
	   } else {
		 update_term_meta ( $term_id, 'category-image-id', '' );
	   }
	 }
	
	/*
	 * Add script
	 * @since 1.0.0
	 */
	 public function add_script() 
	 { ?>
	   <script>
		 jQuery(document).ready( function($) 
		 {
		   function ct_media_upload(button_class) 
		   {
			 var _custom_media = true,
			 _orig_send_attachment = wp.media.editor.send.attachment;
			 $('body').on('click', button_class, function(e) 
			 {
			   var button_id = '#'+$(this).attr('id');
			   var send_attachment_bkp = wp.media.editor.send.attachment;
			   var button = $(button_id);
			   _custom_media = true;
			   wp.media.editor.send.attachment = function(props, attachment)
			   {
				 if ( _custom_media ) 
				 {
				   $('#category-image-id').val(attachment.id);
				   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
				   $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
				 } else {
				   return _orig_send_attachment.apply( button_id, [props, attachment] );
				 }
				}
			 wp.media.editor.open(button);
			 return false;
		   });
		 }
		 ct_media_upload('.ct_tax_media_button.button'); 
		 $('body').on('click','.ct_tax_media_remove',function()
		 {
		   $('#category-image-id').val('');
		   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
		 });
		 // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
		 $(document).ajaxComplete(function(event, xhr, settings) 
		 {
		   var queryStringArr = settings.data.split('&');
		   if( $.inArray('action=add-tag', queryStringArr) !== -1 )
		   {
			 var xml = xhr.responseXML;
			 $response = $(xml).find('term_id').text();
			 if($response!="")
			 {
			   // Clear the thumb image
			   $('#category-image-wrapper').html('');
			 }
		   }
		 });
	   });
	 </script>
	 <?php }
	
	  }
	 
	$CT_TAX_META_EMPLOYEE = new CT_TAX_META_EMPLOYEE();
	$CT_TAX_META_EMPLOYEE -> init();
	 
	}








	/**
 * Add images to the Video Category Taxonomy
 **/
if ( ! class_exists( 'CT_TAX_META_PROJECT' ) ) 
{

	class CT_TAX_META_PROJECT 
	{
	
	  public function __construct() 
	  {
		//
	  }
	 
	 /*
	  * Initialize the class and start calling our hooks and filters
	  * @since 1.0.0
	 */
	 public function init() 
	 {
	
	   add_action( 'project-category_add_form_fields', array ( $this, 'add_category_image_PROJECT' ), 10, 2 );
	   add_action( 'created_project-category', array ( $this, 'save_category_image_PROJECT' ), 10, 2 );
	   add_action( 'project-category_edit_form_fields', array ( $this, 'update_category_image_PROJECT' ), 10, 2 );
	   add_action( 'edited_project-category', array ( $this, 'updated_category_image_PROJECT' ), 10, 2 );
	   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
	   add_action( 'admin_footer', array ( $this, 'add_script' ) );
	 }
	
	public function load_media() 
	{
	 wp_enqueue_media();
	}
	 
	 /*
	  * Add a form field in the new category page
	  * @since 1.0.0
	 */
	 public function add_category_image_PROJECT ( $taxonomy ) 
	 { ?>
	   <div class="form-field term-group">
		 <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
		 <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
		 <div id="category-image-wrapper"></div>
		 <p>
		   <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
		   <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		</p>
	   </div>
	 <?php
	 }
	 
	 /*
	  * Save the form field
	  * @since 1.0.0
	 */
	 public function save_category_image_PROJECT ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 add_term_meta( $term_id, 'category-image-id', $image, true );
	   }
	 }
	 
	 /*
	  * Edit the form field
	  * @since 1.0.0
	 */
	 public function update_category_image_PROJECT ( $term, $taxonomy ) 
	 { ?>
	   <tr class="form-field term-group-wrap">
		 <th scope="row">
		   <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
		 </th>
		 <td>
		   <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
		   <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
		   <div id="category-image-wrapper">
			 <?php if ( $image_id ) 
			 { ?>
			   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
			 <?php } ?>
		   </div>
		   <p>
			 <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
			 <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		   </p>
		 </td>
	   </tr>
	 <?php
	 }
	
	/*
	 * Update the form field value
	 * @since 1.0.0
	 */
	 public function updated_category_image_PROJECT ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 update_term_meta ( $term_id, 'category-image-id', $image );
	   } else {
		 update_term_meta ( $term_id, 'category-image-id', '' );
	   }
	 }
	
	/*
	 * Add script
	 * @since 1.0.0
	 */
	 public function add_script() 
	 { ?>
	   <script>
		 jQuery(document).ready( function($) 
		 {
		   function ct_media_upload(button_class) 
		   {
			 var _custom_media = true,
			 _orig_send_attachment = wp.media.editor.send.attachment;
			 $('body').on('click', button_class, function(e) 
			 {
			   var button_id = '#'+$(this).attr('id');
			   var send_attachment_bkp = wp.media.editor.send.attachment;
			   var button = $(button_id);
			   _custom_media = true;
			   wp.media.editor.send.attachment = function(props, attachment)
			   {
				 if ( _custom_media ) 
				 {
				   $('#category-image-id').val(attachment.id);
				   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
				   $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
				 } else {
				   return _orig_send_attachment.apply( button_id, [props, attachment] );
				 }
				}
			 wp.media.editor.open(button);
			 return false;
		   });
		 }
		 ct_media_upload('.ct_tax_media_button.button'); 
		 $('body').on('click','.ct_tax_media_remove',function()
		 {
		   $('#category-image-id').val('');
		   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
		 });
		 // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
		 $(document).ajaxComplete(function(event, xhr, settings) 
		 {
		   var queryStringArr = settings.data.split('&');
		   if( $.inArray('action=add-tag', queryStringArr) !== -1 )
		   {
			 var xml = xhr.responseXML;
			 $response = $(xml).find('term_id').text();
			 if($response!="")
			 {
			   // Clear the thumb image
			   $('#category-image-wrapper').html('');
			 }
		   }
		 });
	   });
	 </script>
	 <?php }
	
	  }
	 
	$CT_TAX_META_PROJECT = new CT_TAX_META_PROJECT();
	$CT_TAX_META_PROJECT -> init();
	 
	}









	/**
 * Add images to the POSTS Category Taxonomy
 **/
if ( ! class_exists( 'CT_TAX_META_POSTS' ) ) 
{

	class CT_TAX_META_POSTS 
	{
	
	  public function __construct() 
	  {
		//
	  }
	 
	 /*
	  * Initialize the class and start calling our hooks and filters
	  * @since 1.0.0
	 */
	 public function init() 
	 {
	
	   add_action( 'category_add_form_fields', array ( $this, 'add_category_image_POSTS' ), 10, 2 );
	   add_action( 'created_category', array ( $this, 'save_category_image_POSTS' ), 10, 2 );
	   add_action( 'category_edit_form_fields', array ( $this, 'update_category_image_POSTS' ), 10, 2 );
	   add_action( 'edited_category', array ( $this, 'updated_category_image_POSTS' ), 10, 2 );
	   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
	   add_action( 'admin_footer', array ( $this, 'add_script' ) );
	 }
	
	public function load_media() 
	{
	 wp_enqueue_media();
	}
	 
	 /*
	  * Add a form field in the new category page
	  * @since 1.0.0
	 */
	 public function add_category_image_POSTS ( $taxonomy ) 
	 { ?>
	   <div class="form-field term-group">
		 <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
		 <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
		 <div id="category-image-wrapper"></div>
		 <p>
		   <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
		   <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		</p>
	   </div>
	 <?php
	 }
	 
	 /*
	  * Save the form field
	  * @since 1.0.0
	 */
	 public function save_category_image_POSTS ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 add_term_meta( $term_id, 'category-image-id', $image, true );
	   }
	 }
	 
	 /*
	  * Edit the form field
	  * @since 1.0.0
	 */
	 public function update_category_image_POSTS ( $term, $taxonomy ) 
	 { ?>
	   <tr class="form-field term-group-wrap">
		 <th scope="row">
		   <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
		 </th>
		 <td>
		   <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
		   <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
		   <div id="category-image-wrapper">
			 <?php if ( $image_id ) 
			 { ?>
			   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
			 <?php } ?>
		   </div>
		   <p>
			 <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
			 <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
		   </p>
		 </td>
	   </tr>
	 <?php
	 }
	
	/*
	 * Update the form field value
	 * @since 1.0.0
	 */
	 public function updated_category_image_POSTS ( $term_id, $tt_id ) 
	 {
	   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] )
	   {
		 $image = $_POST['category-image-id'];
		 update_term_meta ( $term_id, 'category-image-id', $image );
	   } else {
		 update_term_meta ( $term_id, 'category-image-id', '' );
	   }
	 }
	
	/*
	 * Add script
	 * @since 1.0.0
	 */
	 public function add_script() 
	 { ?>
	   <script>
		 jQuery(document).ready( function($) 
		 {
		   function ct_media_upload(button_class) 
		   {
			 var _custom_media = true,
			 _orig_send_attachment = wp.media.editor.send.attachment;
			 $('body').on('click', button_class, function(e) 
			 {
			   var button_id = '#'+$(this).attr('id');
			   var send_attachment_bkp = wp.media.editor.send.attachment;
			   var button = $(button_id);
			   _custom_media = true;
			   wp.media.editor.send.attachment = function(props, attachment)
			   {
				 if ( _custom_media ) 
				 {
				   $('#category-image-id').val(attachment.id);
				   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
				   $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
				 } else {
				   return _orig_send_attachment.apply( button_id, [props, attachment] );
				 }
				}
			 wp.media.editor.open(button);
			 return false;
		   });
		 }
		 ct_media_upload('.ct_tax_media_button.button'); 
		 $('body').on('click','.ct_tax_media_remove',function()
		 {
		   $('#category-image-id').val('');
		   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
		 });
		 // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
		 $(document).ajaxComplete(function(event, xhr, settings) 
		 {
		   var queryStringArr = settings.data.split('&');
		   if( $.inArray('action=add-tag', queryStringArr) !== -1 )
		   {
			 var xml = xhr.responseXML;
			 $response = $(xml).find('term_id').text();
			 if($response!="")
			 {
			   // Clear the thumb image
			   $('#category-image-wrapper').html('');
			 }
		   }
		 });
	   });
	 </script>
	 <?php }
	
	  }
	 
	$CT_TAX_META_POSTS = new CT_TAX_META_POSTS();
	$CT_TAX_META_POSTS -> init();
	 
	}
//////////////////////////////////////////////////////////////////
//////////////////////End Taxonomy Images/////////////////////////
//////////////////////////////////////////////////////////////////






//////////////////////////////////////////////////////////////////
//////////////////////Taxonomy Field//////////////////////////////
//////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////
//////////////////////End Taxonomy Field//////////////////////////
//////////////////////////////////////////////////////////////////











//////////////////////////////////////////////////////////
//////This function is in the home banner do i need this//
/////////////////////////////////////////////////////////
/**
 * Check if a post is a custom post type.
 * @param  mixed $post Post object or ID
 * @return boolean
 */
function is_custom_post_type( $post = NULL )
{
    $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

    // there are no custom post types
    if ( empty ( $all_custom_post_types ) )
        return FALSE;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    // could not detect current type
    if ( ! $current_post_type )
        return FALSE;

    return in_array( $current_post_type, $custom_types );
}

?>
