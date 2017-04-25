<?php
/*Template Name: Project Calculator*/
	get_header();
	get_template_part("template-parts/header-alone");
	$modules = get_option('my_theme_settings')['modules'];

?>

<div class="large-12 columns section align-center contact-page">
	<img src="<?= get_template_directory_uri() . '/images/calculator-icon.png' ?>" alt="" draggable="false" />
	<h4 class="align-center">Project Calculator</h4>
	<span class="align-center small-bold">LET'S APPROACH IN NUMBERS</span>
</div>

<div class="large-12 columns section project-calculator align-center">
	<h3>Drag to the calculator the services you are interested in.</h3>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="large-7 medium-6 small-12 columns"
			id="draggables"
		>
				<?php $i = 1; foreach($modules as $module) {?>
					<div class="module-container large-6 columns"
						data-credit="<?= $module['duration'] ?>"
						id="module-<?= $i++ ?>"
					>
						<span
							class="large-9 columns button"
						>
							<?= $module['name'] ?>
						</span>
						<div class="large-1 columns"> </div>
						<span class="large-2 columns module-duration"><?= $module['duration'] ?></span>
						<div class="clearfix"></div>
					</div>
				<?php }?>
		</div>
		<div class="large-5 medium-6 small-12 columns">
			<div class="calculator large-12 columns">
				<div class="large-8 columns">
					<span>SERVICE</span>
				</div>
				<div class="large-4 columns">
					<span>CREDITS</span>
				</div>
				<div class="clearfix"></div>

				<div class="calculator large-12 columns"
				id="dropzone"
				style="overflow:scroll;"
				>

				</div>
			</div>
			<div class="calculator-footer large-12 columns">
				<div class="large-8 columns">
					<span>Total of credits</span>
				</div>
				<div class="large-4 columns">
					<span id="totalCredits">0</span>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>

		<div class="align-center">
			<button class="button reset">RESET CALCULATOR</button>
		</div>

	</div>
</div>

<div class="large-12 columns section align-center according-credits">
	<h3>According to credits, this is the plan we recommend for you.</h3>
	<br>
	<br>
	<br>
	<div class="row">
		<div class="large-12 columns">
			<div class="large-4 columns">
				<div class="package startup">
					<div class="package-header blue">
						<span class="price">$0</span>
						<span class="name">Startup project</span>
					</div>

					<div class="package-content">
						<p>30 productive hours</p>
						<p>Monthly progress report</p>
					</div>

					<div class="package-footer">
						<a href="#" class="button blue">
							Yes i'm in!
						</a>
					</div>
				</div>
			</div>
			<div class="large-4 columns">
				<div class="package high">
					<div class="package-header red">
						<span class="price">$0</span>
						<span class="name">Startup project</span>
					</div>

					<div class="package-content">
						<p>30 productive hours</p>
						<p>Monthly progress report</p>
						<p>30 productive hours</p>
						<p>Monthly progress report</p>
					</div>

					<div class="package-footer">
						<a href="#" class="button red">
							Ok, let's do this!
						</a>
					</div>
				</div>
			</div>
			<div class="large-4 columns">
				<div class="package best">
					<div class="package-header green">
						<span class="price">$0</span>
						<span class="name">Startup project</span>
					</div>

					<div class="package-content">
						<p>30 productive hours</p>
						<p>Monthly progress report</p>
						<p>30 productive hours</p>
						<p>Monthly progress report</p>
						<p>30 productive hours</p>
						<p>Monthly progress report</p>
					</div>

					<div class="package-footer">
						<a href="#" class="button green">
							Let's fo team!
						</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>


<?php get_footer() ?>
