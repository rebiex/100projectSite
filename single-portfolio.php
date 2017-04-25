<?php $details = getPorfolioPostDetails(get_the_ID()); ?>

<?php get_header() ?>

<div class="large-12 columns portfolio-post-header"
	style="background-image:url(<?= $details['featured'] ?>)"
>
	<?php get_template_part('template-parts/header-alone') ?>
</div>

<?php
	foreach($details['sections'] as $section) {

		//crear variables
		set_query_var( 'background', $section['background'] );
		set_query_var( 'title', $section['title'] );
		set_query_var( 'subtitle', $section['subtitle'] );
		set_query_var( 'methods', $section['methods'] );
		set_query_var( 'image', $section['image'] );
		set_query_var( 'content', $section['content'] );
		set_query_var( 'video', $section['video_url'] );

		if($section['layout'] == 1){
			get_template_part('template-parts/left-to-right-portfolio');
		}else{
			get_template_part('template-parts/right-to-left-portfolio');
		}
	}
?>

<div class="large-12 columns section align-center contact-page"
	style="padding:50px 0;"
>
	<img src="<?= get_template_directory_uri() . '/images/love-icon.jpg' ?>" alt="" />
	<h4 class="align-center">Thanks for watching</h4>
	<a href="<?= site_url() ?>/portfolio">
		<span class="align-center small-bold">CHECK OUT RELATED WORK</span>
	</a>

	<ul class="navigation">
		<?php if(get_adjacent_post(false, '', true)) {?>
		<li><?php previous_post_link() ?> | <span class="prev-link">Previous</span></li>
		<?php }?>
		<?php if(get_adjacent_post(false, '', false)) {?>
		<li><span class="next-link">Next</span> | <?php next_post_link() ?></li>
		<?php }?>
	</ul>
</div>

<?php get_template_part('template-parts/footer-page') ?>

<?php get_footer() ?>
