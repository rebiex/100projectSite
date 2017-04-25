<?php /*Template Name: Blog*/ get_header() ?>

<?php $categorieSlug = (null == get_queried_object() || get_queried_object()->slug === "") ? "" : get_queried_object()->slug;?>

<?php get_template_part('template-parts/header-alone') ?>

<div class="large-12 columns section align-center contact-page"
>
	<img src="<?= get_template_directory_uri() . '/images/blog-icon.jpg' ?>" alt="" />
	<h4 class="align-center">For readers and curious minds</h4>
	<span class="align-center small-bold">THIS IS OUR COMPANY’S BLOG</span>

	<?php getPostsCategories($categorieSlug) ?>

	<div class="large-12 columns align-left portfolio-files">
		<?php getPosts('post',5,'category',$categorieSlug,false) ?>
		<div class="clearfix"></div>
	</div>

</div>

<div class="large-12 columns section align-center" style="padding-bottom: 60px;">

	<div class="large-12 columns align-left portfolio-files">

		<div class="large-12 columns">
			<h2 class="text-infront-line"><span>People's Favorites</span></h2>
		</div>
		<?php getPeopleFavorites() ?>
		<div class="clearfix"></div>
	</div>

</div>

<?php get_template_part('template-parts/footer-page') ?>

<?php get_footer() ?>
