<?php get_header() ?>

<?php $categorieSlug = (null == get_queried_object() || get_queried_object()->slug === "") ? "social-media" : get_queried_object()->slug;?>

<?php get_template_part('template-parts/header-alone') ?>


<div class="large-12 columns section align-center contact-page">
	<img src="<?= get_template_directory_uri() . '/images/innovation-icon.jpg' ?>" alt="" />
	<h4 class="align-center">This is how we do it</h4>
	<span class="align-center small-bold">CHECK OUT OUR PORTFOLIO</span>

	<?php getPortfolioCategories($categorieSlug) ?>

	<div class="large-12 columns align-left portfolio-files">
		<?php getPortfolioPosts('portfolio',9,'portfolio_categories',$categorieSlug); ?>
		<div class="clearfix"></div>
	</div>
</div>

<?php get_template_part('template-parts/footer-page') ?>

<?php get_footer() ?>
