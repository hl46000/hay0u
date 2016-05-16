<?php get_header(); ?>
<div class="row">
	<div class="col-md-12" id="content">
		<h4 class="title">
			<?php the_title(); ?>
		</h4>
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-sm-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>