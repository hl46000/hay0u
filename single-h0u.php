<?php get_header(); ?>
<div class="row">
	<div class="col-md-9" id="content">
		<h4 class="title">
			<?php the_title(); ?>
		</h4>
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-sm-12">
				<?php the_content(); ?>
			</div>
			<?php $apps = meta('app'); ?>
			<?php endwhile; endif; ?>
			<?php if($apps) : ?>
			<?php $app_args = explode(',',$apps); ?>
			<?php $args = array( 'post_type' => 'post', 'post__in' => $app_args ); ?>
			<?php query_posts($args); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('loop'); ?>
			<?php endwhile; endif; wp_reset_query(); endif; ?>
		</div>
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>