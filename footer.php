<h4 class="title carousel-example-generic hidden-xs">
	App Collection
	<small><a href="<?php echo get_option('hay0u_h0umore'); ?>">MORE</a></small>
</h4>
<div id="carousel-example-generic" class="carousel slide carousel-example-generic hidden-xs" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active">
		</li>
		<li data-target="#carousel-example-generic" data-slide-to="1">
		</li>
		<li data-target="#carousel-example-generic" data-slide-to="2">
		</li>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<div class="row">
				<?php query_posts('showposts=4&post_type=h0u&caller_get_posts=1'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('foot-loop'); ?>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
		<div class="item">
			<div class="row">
				<?php query_posts('showposts=4&post_type=h0u&caller_get_posts=1&offset=4'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('foot-loop'); ?>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
		<div class="item">
			<div class="row">
				<?php query_posts('showposts=4&post_type=h0u&caller_get_posts=1&offset=8'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('foot-loop'); ?>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<footer>
	<div id="backtotop">
		<a href="#top"><i class="glyphicon glyphicon-upload"></i></a>
	</div>
	<p class="text-center">© 2015-2016 www.hay0u.com All right reserved. Website Design <a href="http://www.hay0u.com/" title="Theme customization">Lê Hoàng Long</a></p>
	<p class="text-center">Powered By Hay0U</p>
</footer>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/cat.js"></script>
</body>
</html>