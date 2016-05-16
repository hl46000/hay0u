<h4 class="title">Popular Applications</h4>
<div class="panel-group" id="accordion">
	<?php query_posts('showposts=10&meta_key=post_views_count&orderby=meta_value_num&order=DESC'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $num++; ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $num; ?>">
					<span id="collapse-span-<?php echo $num; ?>"><?php echo $num; ?>.</span> <?php the_title(); ?>
				</a>
			</h4>
		</div>
		<div id="collapse<?php echo $num; ?>" class="panel-collapse collapse <?php if($num==1) echo 'in'; ?>">
			<div class="panel-body">
				<div class="media">
					<a class="pull-left" href="<?php the_permalink(); ?>">
						<div class="img-div">
							<img width="100" class="media-object" src="<?php echo img(); ?>" alt="<?php the_title(); ?>">
						</div>
					</a>
					<div class="media-body">
						<p><?php echo mc_cut_str(get_the_excerpt(),24); ?></p>
						<a href="<?php echo meta('link'); ?>" class="btn btn-primary btn-xs" role="button">
							<i class="glyphicon glyphicon-download"></i> Download App
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>
</br>
<div class="fb-page" data-href="https://www.facebook.com/hay0u/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/hay0u/"><a href="https://www.facebook.com/hay0u/">Hay0U</a></blockquote></div></div>
</div>