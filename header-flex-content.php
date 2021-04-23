<?php
/**
 * Header template for Flexible Content Page Template
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) & !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<!-- ?php if ( function_exists('cn_cookies_accepted') && cn_cookies_accepted() ) : ?> -->
<?php if ( function_exists('activate_em_cookie_notification') ) : ?>
	<!-- Uncomment for production -->
	<!-- Heap -->
	<!-- <script type="text/javascript">   
		window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=document.createElement("script");r.type="text/javascript",r.async=!0,r.src="https://cdn.heapanalytics.com/js/heap-"+e+".js";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(r,a);for(var n=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","resetIdentity","removeEventProperty","setEventProperties","track","unsetEventProperty"],o=0;o<p.length;o++)heap[p[o]]=n(p[o])};   
		heap.load("2183293721"); 
	</script> -->
	<!-- End Heap -->
	<!-- Google Tag Manager -->
	<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PKG7GB');</script> -->
	<!-- End Google Tag Manager -->
<?php endif; ?>

<title>
<?php
	// Print the <title> tag based on what is being viewed.
	global $page, $paged;

	wp_title( '|', true, 'right' );

	$ab_testing = get_field('ab_testing_styles');
	$ab_testing_styles = $ab_testing ? 'ab-styles' : '';

	// Add the blog name.
	// bloginfo	( 'name' );

	// Add the blog description for the home/front page.
	// $site_description = get_bloginfo( 'description', 'display' );
	// if ( $site_description && ( is_home() || is_front_page() ) ) {
	// 	echo " | $site_description";
	// }

	// Add a page number if necessary:
if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
	echo esc_html( ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) ) );
}

?>
	</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7769156/6509172/css/fonts.css" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?ver=<?php echo THEME_VERSION; ?>" />

<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
if ( is_singular() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();

?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists('activate_em_cookie_notification') ) : ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PKG7GB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php endif; ?>

<?php wp_body_open(); ?>
<div id="page" class="hfeed <?php echo $ab_testing_styles; ?>">
	<div id="sitesmenu">				
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'top-menu',
					'container'      => false,
					'depth'          => 1,
					'menu_class'     => 'top-menu',
					'items_wrap'     => '<ul class="%2$s">%3$s</ul>'
				)
			);
		?>
	</div>
	<header class="navbar" role="banner">

 		<hgroup>
			<div id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></div>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>
		</hgroup>

		<a href="/" class="navbar__logo" rel="home">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="InterSystems: Creative data technology" />
		</a>
		
		<div class="navbar__nav">
			<?php

				$bottom_cta = get_field('bottom_cta', 'options') ? get_field('bottom_cta', 'options') : '';
				$bottom_cta_link = get_field('bottom_cta_link', 'options') ? '<a href="' . get_field('bottom_cta_link', 'options')['url'] . '" target="' . get_field('bottom_cta_link', 'options')['target'] . '" class="isc_btn">' . get_field('bottom_cta_link', 'options')['title'] . '</a>' : '';

				 
				echo '<div class="navbar__nav__title">Getting Started</div>';
				
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'depth'          => 2,
						'menu_class'     => 'primary-menu',
						// Puts the title above the menu
						// 'items_wrap'     => '<p class="menu-title">' . esc_html(isc_get_menu_name('primary')) . '</p><ul class="%2$s">%3$s</ul>',
						// Puts the title above the menu and the 'TRY FOR FREE' button below it
						// 'items_wrap'     => '<p class="menu-title">' . esc_html(isc_get_menu_name('primary')) . '</p><ul class="%2$s">%3$s</ul><div class="menu-cta"><div class="menu-cta__text">' . $bottom_cta . '</div><div class="menu-cta__btn">' . $bottom_cta_link . '</div></div>',
						'walker'         => new Isc_Walker()
					)
				);
			?>
		</div>

		<div class="menu-toggle">
			<span class="menu-toggle__bar menu-toggle__bar--1"></span>
			<span class="menu-toggle__bar menu-toggle__bar--2"></span>
			<span class="menu-toggle__bar menu-toggle__bar--3"></span>
		</div>

	</header><!-- #branding -->
