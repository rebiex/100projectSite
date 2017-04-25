<?php /*Template Name: Who we are*/ ?>
<?php get_header() ?>

<?php get_template_part('template-parts/header-alone') ?>

<div class="large-12 columns section align-center contact-page">
	<img src="<?= get_template_directory_uri() . '/images/we-are-icon.jpg' ?>" alt="" />
	<h4 class="align-center">Hey! We are Project 100</h4>
	<span class="align-center small-bold">NICE TO MEET YOU. THIS IS OUR MANIFESTO.</span>

	<div class="large-6 medium-10 small-10 align-left margin-center post-content contact-text">
		<?php
			while(have_posts()) : the_post();
				the_content();
			endwhile;
		?>
	</div>
	<div class="clearfix"></div>

</div>
<div class="clearfix"></div>

<?php get_template_part('template-parts/footer-page') ?>


<?php get_footer() ?>
