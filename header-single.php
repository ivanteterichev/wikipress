<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
	<style id="before-elements"></style>
	<style type="text/css">
		header.header {
			background: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}
		.card a {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		a, a:visited {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		[data-theme-color="text"] {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		blockquote {
			border-left-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		.wp-block-button a {
			background-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		ul li:before,
		ol li:before {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		figure.wp-block-pullquote {
			border-top-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
			border-bottom-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		cite.fn a {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		div.wikipress-list-comments a {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		#submit {
			background-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		.wikipress-post-navigation a {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		.article-wrapper .article-wrapper__navigation .article-wrapper-navigation__article {
			color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
		}

		.wp-block-button__link, .wp-block-file__button {
			background: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?> !important;
		}
	</style>
</head>