<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
remove_filter ('the_content', 'wpautop');

//WooCommerce

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

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


// Add term page
add_action( 'product_cat_add_form_fields', 'wpm_taxonomy_add_new_meta_field', 10, 2 );
function wpm_taxonomy_add_new_meta_field() {
  // this will add the custom meta field to the add new term page
  ?>
  <div class="form-field">
    <label for="term_meta[custom_term_meta]"><?php _e( 'Details', 'wpm' ); ?></label>
    <textarea name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" rows="5" cols="40"></textarea>
    <p class="description"><?php _e( 'Detailed category info to appear below the product list','wpm' ); ?></p>
  </div>
  <?php
}

// Edit term page
add_action( 'product_cat_edit_form_fields', 'wpm_taxonomy_edit_meta_field', 10, 2 );
function wpm_taxonomy_edit_meta_field($term) {

  // put the term ID into a variable
  $t_id = $term->term_id;

  // retrieve the existing value(s) for this meta field. This returns an array
  $term_meta = get_option( "taxonomy_$t_id" );
  $content = $term_meta['custom_term_meta'] ? wp_kses_post( $term_meta['custom_term_meta'] ) : '';
  $settings = array( 'textarea_name' => 'term_meta[custom_term_meta]' );
  ?>
  <tr class="form-field">
  <th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e( 'Details', 'wpm' ); ?></label></th>
    <td>
      <?php wp_editor( $content, 'product_cat_details', $settings ); ?>
      <p class="description"><?php _e( 'Detailed category info to appear below the product list','wpm' ); ?></p>
    </td>
  </tr>
<?php
}

// Save extra taxonomy fields callback function
add_action( 'edited_product_cat', 'save_taxonomy_custom_meta', 10, 2 );
add_action( 'create_product_cat', 'save_taxonomy_custom_meta', 10, 2 );
function save_taxonomy_custom_meta( $term_id ) {
  if ( isset( $_POST['term_meta'] ) ) {
    $t_id = $term_id;
    $term_meta = get_option( "taxonomy_$t_id" );
    $cat_keys = array_keys( $_POST['term_meta'] );
    foreach ( $cat_keys as $key ) {
      if ( isset ( $_POST['term_meta'][$key] ) ) {
        $term_meta[$key] = wp_kses_post( stripslashes($_POST['term_meta'][$key]) );
      }
    }
    // Save the option array.
    update_option( "taxonomy_$t_id", $term_meta );
  }
}

// Display details on product category archive pages
add_action( 'woocommerce_after_shop_loop', 'wpm_product_cat_archive_add_meta' );
function wpm_product_cat_archive_add_meta() {
  $t_id = get_queried_object()->term_id;
  $term_meta = get_option( "taxonomy_$t_id" );
  $term_meta_content = $term_meta['custom_term_meta'];
  if ( $term_meta_content != '' ) {
    echo '<div class="woo-sc-box normal rounded full">';
      echo apply_filters( 'the_content', $term_meta_content );
    echo '</div>';
  }
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








add_action( 'after_setup_theme', 'fwa_setup' );

function fwa_setup() {
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}



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
    echo '<h4 class="text-light woocommerce-loop-product_title"><a href="'.get_the_permalink().'" style="color:#fff;">' . get_the_title() . '</a></h4>';
}



remove_filter ("woocommerce_content", "wc_get_gallery_image_html");
add_filter ("woocommerce_content", "fwa_wc_get_gallery_image_html");

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
    $arg['comment_notes_before'] = "<p class='comment-policy'>We are glad you have chosen to leave a comment. Please keep in mind that comments are moderated according to our <a href='https://www.eaglewater.net/comment-privacy/'>comment policy</a>.</p>";
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

//add extra fields to category edit form hook
add_action ( 'edit_category_form_fields', 'extra_category_fields');

//add extra fields to category edit form callback function
function extra_category_fields( $tag )
{
  //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
?>
<tr class="form-field">
    <th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Category Image Url PC'); ?></label></th>
    <td>
        <input type="text" name="Cat_meta[img]" id="Cat_meta[img]" size="3" style="width:60%;" value="<?php echo $cat_meta['img'] ? $cat_meta['img'] : ''; ?>"><br />
        <span class="description"><?php _e('Category Image Url PC: use full url '); ?></span>
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top"><label for="extra1"><?php _e('Category Image Url Mobile'); ?></label></th>
    <td>
        <input type="text" name="Cat_meta[extra1]" id="Cat_meta[extra1]" size="25" style="width:60%;" value="<?php echo $cat_meta['extra1'] ? $cat_meta['extra1'] : ''; ?>"><br />
        <span class="description"><?php _e('Category Image Url Mobile: use full url'); ?></span>
    </td>
</tr>
<?php
}

// save extra category extra fields hook
add_action ( 'edited_category', 'save_extra_category_fileds');

// save extra category extra fields callback function
function save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
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

add_filter('woocommerce_billing_fields', 'custom_woocommerce_billing_fields');

function custom_woocommerce_billing_fields( $fields ) {
  $fields['billing_address_1']['class'] = array( 'form-group' );
  $fields['billing_address_1']['input_class'] = array( 'form-control' );
  return $fields;
}

?>
