<?php get_header(); ?>
<div class="row">
	<div class="col-md-9" id="content">
		<h4 class="title">
			<?php single_cat_title(); ?>
		</h4>
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('loop'); ?>
			<?php endwhile; endif; ?>
		</div>
		<ul id="pager" class="pagination">
			<?php par_pagenavi(9); ?>
		</ul>
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<h4 class="title">
	Recommended App
	<small><a href="#">MORE</a></small>
</h4>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
				<?php get_template_part('foot-loop'); ?>
			</div>
		</div>
		<div class="item">
			<div class="row">
				<?php get_template_part('foot-loop'); ?>
			</div>
		</div>
		<div class="item">
			<div class="row">
				<?php get_template_part('foot-loop'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>