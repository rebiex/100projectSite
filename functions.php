<?php
/**
 * OneHundredProject functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OneHundredProject
 */

if ( ! function_exists( 'onehundredproject_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function onehundredproject_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on OneHundredProject, use a find and replace
	 * to change 'onehundredproject' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'onehundredproject', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'onehundredproject' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'onehundredproject_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'onehundredproject_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onehundredproject_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'onehundredproject_content_width', 640 );
}
add_action( 'after_setup_theme', 'onehundredproject_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onehundredproject_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'onehundredproject' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'onehundredproject' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'onehundredproject_widgets_init' );

show_admin_bar(false);

/**
 * Enqueue scripts and styles.
 */
function onehundredproject_scripts() {
	wp_enqueue_script("jquery-ui",'http://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.12.1');
	wp_enqueue_script("jquery-ui");
	wp_enqueue_style( 'onehundredproject-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'onehundredproject-foundation', get_template_directory_uri() . '/css/foundation.min.css' );
	wp_enqueue_style( 'onehundredproject-fresco-style', get_template_directory_uri() . '/js/plugins/fresco/fresco.css', '', rand(0,9999) );
	wp_enqueue_style( 'onehundredproject-style', get_template_directory_uri() . '/style.min.css', '', rand(0,9999) );
	wp_enqueue_script( 'onehundredproject-vibrant', get_template_directory_uri() . '/js/vibrant.min.js', array(), '20151215', true );
	wp_enqueue_script( 'onehundredproject-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), rand(0,9999), true );
	wp_enqueue_script( 'onehundredproject-fresco', get_template_directory_uri() . '/js/plugins/fresco/fresco.js', array('jquery'), rand(0,9999), true );
	wp_enqueue_script( 'onehundredproject-main', get_template_directory_uri() . '/js/main.js', array('jquery','jquery-ui'), rand(0,9999), true );


	//wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );

    wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	//wp_enqueue_script( 'onehundredproject-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'onehundredproject-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'onehundredproject_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//cpt 100project

function portfolio_register() {
    $labels = array(
        'name' => _x('Portfolio', 'post type general name'),
        'singular_name' => _x('Portfolio Item', 'post type singular name'),
        'add_new' => _x('Add New', 'portfolio item'),
        'add_new_item' => __('Add New Portfolio Item'),
        'edit_item' => __('Edit Portfolio Item'),
        'new_item' => __('New Portfolio Item'),
        'view_item' => __('View Portfolio Item'),
        'search_items' => __('Search Portfolio Items'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('with_front' => true),
        'capability_type' => 'post',
        'hierarchical' => false,
		'has_archive' => true,
        'menu_position' => 8,
        'supports' => array('title','thumbnail','excerpt')
    );
    register_post_type( 'portfolio' , $args );
}
add_action('init', 'portfolio_register');

function create_portfolio_taxonomies() {
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categories' ),
		'exclude_from_search' => false
    );

    register_taxonomy( 'portfolio_categories', array( 'portfolio' ), $args );
}
add_action( 'init', 'create_portfolio_taxonomies', 0 );

function getPostsCategories($currentCat){
	$taxonomy = 'category';
	$terms = get_terms($taxonomy); // Get all terms of a taxonomy
	?>
	<ul class="categories-list">
		<li><a href="<?= site_url() ?>/blog"
			class="<?= ($currentCat === "") ? 'active' : '' ?>"
		>All</a></li>
	<?php if ( $terms && !is_wp_error( $terms ) ) : ?>
	        <?php foreach ( $terms as $term ) { ?>
	            <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"
					class="<?= ($currentCat === $term->slug) ? 'active' : '' ?>"
				><?php echo $term->name; ?></a></li>
	        <?php } ?>
	<?php endif; ?>
	</ul>
	<?php
}

function getPortfolioCategories($currentCat){
	$taxonomy = 'portfolio_categories';
	$terms = get_terms($taxonomy); // Get all terms of a taxonomy
	?>
	<ul class="categories-list">
		<li><a href="<?= site_url() ?>/portfolio"
			class="<?= ($currentCat === "") ? 'active' : '' ?>"
		>All</a></li>
	<?php if ( $terms && !is_wp_error( $terms ) ) :?>
	        <?php foreach ( $terms as $term ) { ?>
	            <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"
					class="<?= ($currentCat === $term->slug) ? 'active' : '' ?>"
				><?php echo $term->name; ?></a></li>
	        <?php } ?>
	<?php endif; ?>
	</ul>
	<?php
}

function getPeopleFavorites(){
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'meta_query' => array(
			array(
				'key' => 'counter',
				'value' => 0,
				'compare' => '>',
				'type' => 'numeric'
			)
		),
		'orderby' => 'meta_value',
		'meta_key' => 'counter',
	);

	$query = new WP_Query($args);

	if($query->have_posts()){
		$counter = 1;
		while($query->have_posts()) : $query->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' )[0];
			 $author = get_the_author();
		?>

		<?php if($counter == 1) {?>

			<div
				class="large-8 medium-6 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>

		<?php if($counter == 2) {?>

			<div
				class="large-4 medium-6 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container" style="width:80% !important">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>

		<?php if($counter == 3) {?>

			<div
				class="large-12 medium-12 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container" style="width:93% !important">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>



		<?php
		$counter++;


		endwhile;
		wp_reset_query();
	}
}

function getPosts($post,$show,$tax,$terms,$isCategoryTpl){

	if($isCategoryTpl){
		$paged = (get_query_var('page_val') ? get_query_var('page_val') : 1);
	}else{
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	}

	$args = array(
		'post_type' => $post,
		'posts_per_page' => $show,
		'paged' => $paged
	);

	if($terms){
		$args['tax_query'] = array(
	          array(
	            'taxonomy' => $tax,
				'field' => 'slug',
				'terms' => array(
					$terms
				)
	          )
		);
	}

	$query = new WP_Query($args);

	if($query->have_posts()){
		$counter = 1;
		while($query->have_posts()) : $query->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' )[0];
			 $author = get_the_author();
		?>

		<?php if($counter == 1) {?>

			<div
				class="large-8 medium-6 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>

		<?php if($counter == 2) {?>

			<div
				class="large-4 medium-6 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container" style="width:80% !important">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>

		<?php if($counter == 3) {?>

			<div
				class="large-4 medium-6 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container" style="width:80% !important">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>

		<?php if($counter == 4) {?>

			<div
				class="large-8 medium-6 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>

		<?php if($counter == 5) {?>

			<div
				class="large-12 medium-6 small-12 columns"
			>
				<a href="<?= get_the_permalink(get_the_ID()) ?>">
					<div class="single-post"
					style="background-image:url(<?= $image ?>);">
						<div class="overlay align-left">
							<div class="overlay-container" style="width:93% !important">
								<h3><?= substr(get_the_title(),0,100) ?></h3>
								<p><?= substr(get_the_excerpt(),0,200) ?> By <span class="post-author"><?= $author ?></span></p>
							</div>
						</div>
					</div>
				</a>
			</div>

		<?php }?>



		<?php
		$counter++;

		endwhile;
		wp_reset_query();

		echo '<div class="clearfix"></div>';
		echo '<div class="large-12 columns align-center">';

		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => 'page/%#%',
			'current' => max( 1, $paged ),
			'total' => $query->max_num_pages
		) );

		echo '</div>';
	}
}

function custom_pre_get_posts($query)
{
    if ($query->is_main_query() && !$query->is_feed() && !is_admin() && is_category()) {
        $query->set('page_val', get_query_var('paged'));
        $query->set('paged', 0);
    }
}

add_action('pre_get_posts', 'custom_pre_get_posts');

$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
	add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
	global $option_posts_per_page;
	if ( is_tax( 'portfolio_categories') ) {
		return 2;
	} else {
		return $option_posts_per_page;
	}
}

function getPortfolioPosts($post,$show,$tax,$terms){

	if ( get_query_var('paged') ) $paged = get_query_var('paged');
	if ( get_query_var('page') ) $paged = get_query_var('page');

	$args = array(
		'post_type' => $post,
		'posts_per_page' => $show,
		'paged' => $paged
	);

	if($terms){
		$args['tax_query'] = array(
	          array(
	            'taxonomy' => $tax,
				'field' => 'slug',
				'terms' => array(
					$terms
				)
	          )
		);
	}

	$query = new WP_Query($args);

	if($query->have_posts()){
		$counter = 1;
		while($query->have_posts()) : $query->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' )[0];
		?>

		<div
			class="large-4 medium-4 small-12 columns"
		>
			<a href="<?= get_the_permalink(get_the_ID()) ?>">
				<div class="portfolio-post"
				style="background-image:url(<?= $image ?>);">
					<div class="overlay align-center">
						<div class="overlay-container">
							<h3><?= substr(get_the_title(),0,100) ?></h3>
							<hr />
							<p><?= substr(get_the_excerpt(),0,200) ?></p>
						</div>
					</div>
				</div>
			</a>
		</div>

		<?php
		if($counter % 3 === 0){
			?>
				<div class="clearfix"></div>
			<?php
		}
		$counter++;


		endwhile;

		wp_reset_query();

		echo '<div class="clearfix"></div>';
		echo '<div class="large-12 columns align-center" style="padding-bottom:20px">';

		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => 'page/%#%',
			'current' => max( 1, $paged ),
			'total' => $query->max_num_pages
		) );

		echo '</div>';
	}
}

//post single
function getPostDetails($postID){

	$image = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'full' )[0];
	$readingTime = get_post_meta($postID,'time',true);

	return array(
		'image' => $image,
		'reading' => $readingTime
	);
}

//portfolio single
function getPorfolioPostDetails($postID){
	$image = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'full' )[0];
	$sectionsTmp = get_post_meta($postID,'section',true);

	//replace image id for url
	$sections = array();
	foreach($sectionsTmp as $section){

		$imageURL = wp_get_attachment_image_src( $section['image'][0], 'full' )[0];

		$newSection = array(
			'title' => $section['title'],
			'subtitle' => $section['subtitle'],
			'methods' => $section['methods'],
			'content' => $section['content'],
			'background' => $section['background'],
			'image' => $imageURL,
			'layout' => $section['layout'],
			'order' => $section['order'],
			'video_url' => $section['video_url']
		);

		array_push($sections,$newSection);
	}

	$sortArray = array();

	foreach($sections as $section){
	    foreach($section as $key=>$value){
	        if(!isset($sortArray[$key])){
	            $sortArray[$key] = array();
	        }
	        $sortArray[$key][] = $value;
	    }
	}

	//ordernar por order
	array_multisort($sortArray['order'],SORT_ASC,$sections);

	return array(
		'featured' => $image,
		'sections' => $sections
	);
}

add_action( 'wp_ajax_updateFavorite', 'updateFavorite' );
add_action( 'wp_ajax_nopriv_updateFavorite', 'updateFavorite' );

function updateFavorite(){
	$post_id = (isset($_REQUEST['post_id']) && $_REQUEST['post_id'] != "") ? $_REQUEST['post_id'] : 0;
	if($post_id != "" && $post_id > 0){
		$counter = intval(get_post_meta($post_id,'counter',true));
		update_post_meta($post_id,'counter',$counter + 1);
	}

	die();
}

//piklist settings
add_filter('piklist_admin_pages', 'piklist_theme_setting_pages');
  function piklist_theme_setting_pages($pages)
  {
     $pages[] = array(
      'page_title' => __('Project Calculator')
      ,'menu_title' => __('Project Calculator Settings', 'piklist')
      ,'sub_menu' => 'themes.php' //Under Appearance menu
      ,'capability' => 'manage_options'
      ,'menu_slug' => 'custom_settings'
      ,'setting' => 'my_theme_settings'
      ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
      ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
      ,'single_line' => true
      ,'default_tab' => 'Settings'
      ,'save_text' => 'Save'
    );

    return $pages;
  }
