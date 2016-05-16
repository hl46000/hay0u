<?php get_header(); ?>
<div class="row hidden-xs" id="home-banner">
	<div class="col-md-4 col">
		<div id="home-banner-1" class="img-div">
			<a href="<?php echo get_option('hay0u_homelnk1'); ?>"><img src="<?php echo get_option('hay0u_homeimg1'); ?>"></a>
		</div>
	</div>
	<div class="col-md-6 col">
		<div class="row">
			<div class="col-md-12 col">
				<div id="home-banner-2" class="img-div">
					<a href="<?php echo get_option('hay0u_homelnk2'); ?>"><img src="<?php echo get_option('hay0u_homeimg2'); ?>"></a>
				</div>
			</div>
			<div class="col-md-8 col">
				<div id="home-banner-3" class="img-div">
					<a href="<?php echo get_option('hay0u_homelnk3'); ?>"><img src="<?php echo get_option('hay0u_homeimg3'); ?>"></a>
				</div>
			</div>
			<div class="col-md-4 col">
				<div id="home-banner-4" class="img-div">
					<a href="<?php echo get_option('hay0u_homelnk4'); ?>"><img src="<?php echo get_option('hay0u_homeimg4'); ?>"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2 col">
		<div id="home-banner-5" class="img-div">
			<a href="<?php echo get_option('hay0u_homelnk5'); ?>"><img src="<?php echo get_option('hay0u_homeimg5'); ?>"></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-9" id="content">
		<?php 
		global $wpdb;
		$sql = "select * from $wpdb->term_taxonomy where taxonomy = 'category' AND parent = '0' AND count > 0 ORDER BY term_taxonomy_id ASC";
		$rows = $wpdb->get_results($sql);
		foreach ($rows as $row) : ?>
		<h4 class="title">
			<?php echo get_cat_name(''. $row->term_id .'') ?>
			<small><a href="<?php echo get_category_link(''. $row->term_id .''); ?>">MORE</a></small>
		</h4>
		<div class="row">
			<?php query_posts('showposts=12&cat='.$row->term_id.'&caller_get_posts=1'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('loop'); ?>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>