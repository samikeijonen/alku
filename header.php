<?php
/**
 * Header of out theme.
 *
 * @package Alku
 */

?>
<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<title>My site</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<nav>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
				)
			);
		?>
		</nav>
	</header>
