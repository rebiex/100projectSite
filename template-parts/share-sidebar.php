<div class="share-sidebar">
	<span>SHARE</span>
	<ul>
		<li>
			<a onclick="setFavorite(<?= $post_id ?>)">
				<i class="fa fa-heart"></i>
			</a>
			<span id="counter"><?= $counter ?></span>
		</li>
		<li>
			<a
			onclick="popupwindow('https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>','Share on Facebook',500,500)"
			>
				<i class="fa fa-facebook"></i>
			</a>
		</li>
		<li>
			<a onclick="popupwindow('https://twitter.com/intent/tweet?text=<?= $url ?>','Share on Twitter',500,500)">
				<i class="fa fa-twitter"></i>
			</a>
		</li>

	</ul>
</div>
