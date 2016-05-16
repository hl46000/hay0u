<div class="col-md-2 loop">
	<div class="thumbnail">
		<div class="img-div">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo img(); ?>" alt="<?php the_title(); ?>"></a>
		</div>
		<div class="caption">
			<p class="text-center">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</p>
			<p class="text-center">
				<a target="_blank" rel="nofollow" href="<?php echo meta('link'); ?>" class="btn btn-primary btn-xs" role="button">
					<i class="glyphicon glyphicon-download"></i> Download App
				</a>
			</p>
		</div>
	</div>
</div>