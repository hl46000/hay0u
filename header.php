<!DOCTYPE html>
<html>
<head>
<title><?php if (is_single() || is_page() || is_archive() || is_search()) { ?><?php wp_title('',true); ?> - <?php } bloginfo('name'); ?><?php if ( is_home() ){ ?> - <?php bloginfo('description'); ?><?php } ?><?php if ( is_paged() ){ ?> - <?php printf( __('Page %1$s of %2$s', ''), intval( get_query_var('paged')), $wp_query->max_num_pages); ?><?php } ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="fb:app_id" content="439880009541157" />
<meta property="fb:admins" content="100008095472187"/>
<?php
if (is_home()){ 
	$description = get_option('hay0u_description');
	$keywords = get_option('hay0u_keywords');
} elseif (is_single() || is_page()){   
	$description = mc_cut_str(get_the_excerpt(),24);
	$keywords = get_option('hay0u_keywords');       
} elseif(is_category()){
	$description     = category_description();
	$current_category = single_cat_title("", false);
	$keywords =  $current_category;
}
?>
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="description" content="<?php echo $description ?>" />
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href="<?php bloginfo('template_directory'); ?>/css/media.css" rel="stylesheet">
<?php wp_deregister_script('jquery'); ?>
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=439880009541157";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body <?php body_class(); ?>>
<div class="container" id="top">
<header>
	<div class="row">
		<div class="col-md-4">
			<h2 id="logo">
				<a href="<?php bloginfo('url'); ?>"><img src="http://hay0u.com/wp-content/uploads/2016/05/LOGO.png" alt="Hay0U"/></a>
			</h2>
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<form id="search" role="form" method="get" action="<?php bloginfo('url'); ?>/">
				<div class="input-group">
					<input type="text" class="form-control" name="s" placeholder="Search App">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</span>
				</div>
			</form>
		</div>
	</div>
</header>

<nav class="navbar navbar-default hidden-xs" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">
				Toggle navigation
			</span>
			<span class="icon-bar">
			</span>
			<span class="icon-bar">
			</span>
			<span class="icon-bar">
			</span>
		</button>
		<a class="navbar-brand visible-xs" href="#">
			Menu
		</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php   
		wp_nav_menu( array(   
		'theme_location' => 'nav-menu',   
		'depth' => 2,   
		'container' => false,   
		'menu_class' => 'nav navbar-nav',   
		'fallback_cb' => 'wp_page_menu',   
		   
		'walker' => new wp_bootstrap_navwalker())   
		);   
		?>
	</div>
	<!-- /.navbar-collapse -->
</nav>