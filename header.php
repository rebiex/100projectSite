<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body>
<?php if(is_single(get_the_ID()) && get_post_type(get_the_ID()) == "post") {
	$id = get_the_ID();
  set_query_var( 'url', get_the_permalink(get_the_ID()) );
  set_query_var( 'post_id', $id);
  set_query_var( 'counter', get_post_meta(get_the_ID(),'counter',true) );
  get_template_part('template-parts/share-sidebar');
}?>

<div class="lateral-menu">
	<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
	<div class="social-buttons menu">
		<a href="https://www.facebook.com/myproject100/?ref=aymt_homepage_panel"
			target="_blank"
		>
			<i class="fa fa-facebook"></i>
		</a>
		<a href="https://twitter.com/my1812" target="_blank">
			<i class="fa fa-twitter"></i>
		</a>
		<a href="https://www.yelp.com/biz/my-hoang-nguyen-san-jose" target="_blank">
			<i class="fa fa-yelp"></i>
		</a>
		<a href="https://www.linkedin.com/in/myhoangnguyen" target="_blank">
			<i class="fa fa-linkedin"></i>
		</a>
	</div>
</div>


<div class="content-page">

<!--  -->
