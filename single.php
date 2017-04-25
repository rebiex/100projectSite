<?php
$postId = get_the_ID();

//people favorites
$views = get_post_meta($postId,'views',false);
update_post_meta($postId,'views',(intval($views) + 1));

$details = getPostDetails($postId);

get_header();
?>

<?php while(have_posts()) : the_post();?>

<div class="large-12 columns portfolio-post-header header-image"
	style="background-image:url(<?= $details['image'] ?>)"
>
	<?php get_template_part('template-parts/header-alone') ?>

	<div class="large-12 columns post-header">
		<div class="large-4 medium-6 columns post-div">
			<h1><?= get_the_title() ?></h1>
			<div class="row">
				<div class="large-6 medium-6 small-6 columns" style="padding:0">
					By <span class="author"><?= get_the_author() ?></span>
				</div>
				<div class="large-6 medium-6 small-6 columns align-right" style="padding:0">
					<span class="date"><?= get_the_date() ?></span>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="row">
				<span class="reading-time"><i class="fa fa-clock-o"></i> <?= $details['reading'] ?></span>
			</div>

		</div>
		<div class="large-8 medium-6 columns post-legend">
			<h3><?= get_the_excerpt() ?></h3>
		</div>
		<div class="clearfix"></div>
	</div>

</div>

<div class="large-12 columns post-parent-sidebar">

	<div class="row post-content">
		<?php the_content() ?>
	</div>

	<ul class="navigation large-12 columns">
		<li>
			&nbsp;
		<?php if(get_adjacent_post(false, '', true)) {?>
			<?php previous_post_link() ?> | <span class="prev-link">Previous</span>
		<?php }?>
		</li>
		<li>
			&nbsp;
		<?php if(get_adjacent_post(false, '', false)) {?>
		<span class="next-link">Next</span> | <?php next_post_link() ?>
		<?php }?>
		</li>
	</ul>
</div>
<div class="clearfix"></div>

<?php endwhile; ?>

<?php get_template_part('template-parts/footer-page') ?>


<?php get_footer();
