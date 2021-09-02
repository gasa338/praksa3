<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package praksa2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header class="header">

		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-10 col-lg-3 logo-wrapper py-3">
					<?php
						the_custom_logo();
					?>
					<div class="back-nav">Nazad</div>
				</div>
				<div class="col-2  col-lg-9 ">
					<div class="rmm style">
						<div class="rmm-toggled rmm-view rmm-closed">
							<div class="rmm-toggled-controls">
								<div class="rmm-toggled-title"></div>
								<div class="rmm-toggled-button">
									<span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span
										class="close-navigation"></span><span class="close-navigation"></span></div>
							</div>
						</div>
						<nav class="mob-nav"></nav>
                  		<nav class="main-navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location'		=> 'header-menu',
									'menu_class'			=> 'top-nav navigation-list',
									'container'            	=> false,
									'walker'				=> new Walker_Nav_Header_KomoYU()
								)
							);
						?>
						</nav>

					</div>
				</div>
			</div>
		</div>
		</div>
	</header>