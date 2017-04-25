<div class="large-12 columns right-to-left" style="background-color:<?= $background ?>">
	<div class="large-6 medium-6 small-12 columns block-1">
		<h1><?= $title ?></h1>
		<h3><?= $subtitle ?></h3>
		<h5><?= $methods ?></h5>
		<p><?= $content ?></p>
	</div>
	<div class="large-6 medium-6 small-12 columns block-2">
		<?php if($video) {?>
			<iframe src="<?= $video ?>" style="width:100%;height:100%;border:0;" frameborder="0"></iframe>
		<?php }else{?>
			<a href="<?= $image ?>"
			   class="fresco"
			   data-fresco-group="images_group"
			   data-fresco-caption="<?= $title ?>">
				<img src="<?= $image ?>" />
			</a>
		<?php }?>
	</div>
	<div class="clearfix"></div>
</div>
