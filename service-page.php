<?php /*Template Name: Service Page*/ get_header() ?>

<?php get_template_part('template-parts/header-alone') ?>

<div class="large-12 columns section align-center contact-page">
	<img src="<?= get_template_directory_uri() . '/images/service-icon.jpg' ?>" alt="" />
	<h4 class="align-center">How Project 100 will help you</h4>
	<span class="align-center small-bold">THIS IS HOW WE ROLL</span>
</div>
<div class="clearfix"></div>

<div class="large-12 columns service">
	<div class="large-4 medium-4 small-12 columns">
		<?php
			set_query_var( 'number', 1 );
			set_query_var( 'title', "Go Wide" );
			set_query_var( 'subtitle', "We research your project." );
			get_template_part('template-parts/service-section');
		?>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<?php
			set_query_var( 'number', 2 );
			set_query_var( 'title', "Prioritize" );
			set_query_var( 'subtitle', "We narrow down <br> your priority." );
			get_template_part('template-parts/service-section');
		?>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<?php
			set_query_var( 'number', 3 );
			set_query_var( 'title', "Go Deep" );
			set_query_var( 'subtitle', "Create a timeline <br>and measurable goals." );
			get_template_part('template-parts/service-section');
		?>
	</div>
	<div class="clearfix"></div>
	<div class="row service" style="margin:0 auto !important">
		<div class="large-6 medium-6 small-12 columns">
			<?php
				set_query_var( 'number', 4 );
				set_query_var( 'title', "Execute" );
				set_query_var( 'subtitle', "We work on your project." );
				get_template_part('template-parts/service-section');
			?>
		</div>
		<div class="large-6 medium-6 small-12 columns">
			<?php
				set_query_var( 'number', 5 );
				set_query_var( 'title', "Iterate" );
				set_query_var( 'subtitle', "Create a system to continuosly improve." );
				get_template_part('template-parts/service-section');
			?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="large-7 medium-10 small-10 align-left margin-center">
	<div class="large-12 columns section-s">
		<div class="large-3 columns align-center">
			<img src="<?= get_template_directory_uri() . '/images/listen-icon.jpg' ?>" alt="" />
		</div>
		<div class="large-9 columns">
			<h3>Listen</h3>
			<p>Listening is critical, and I plan on taking an active approach to understanding your business, your target demographic, and your brand.</p>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	<div class="large-12 columns section-s">
		<div class="large-3 columns align-center">
			<img src="<?= get_template_directory_uri() . '/images/innovation-icon.jpg' ?>" alt="" />
		</div>
		<div class="large-9 columns">
			<h3>Innovation</h3>
			<p>Creativity and innovation are important when choosing a consultant. You can expect unique and out-of-the-box ideas here.</p>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	<div class="large-12 columns section-s">
		<div class="large-3 columns align-center">
			<img src="<?= get_template_directory_uri() . '/images/relationship-icon.jpg' ?>" alt="" />
		</div>
		<div class="large-9 columns">
			<h3>Building relationship</h3>
			<p>The only way to do anything right is with building a relationship. I believe that it’s important to build a long-term relationship in order to establish trust and quality.</p>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="large-12 columns section-s">
		<div class="large-3 columns align-center">
			<img src="<?= get_template_directory_uri() . '/images/business-icon.jpg' ?>" alt="" />
		</div>
		<div class="large-9 columns">
			<h3>Running a business</h3>
			<p>The great thing is that you’re a business owner and so am I. This means that I understand the struggles you’re going through, from deadlines to budgets.</p>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>

<?php get_template_part('template-parts/footer-page') ?>

<?php get_footer() ?>
