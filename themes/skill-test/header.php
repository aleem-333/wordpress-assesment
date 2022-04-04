<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skill_Test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>Skill Test</title>

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- ======= Navbar ======= -->
	<div class="collapse navbar-collapse custom-navmenu" id="main-navbar">
		<div class="container py-2 py-md-5">
			<div class="row align-items-start">
				<div class="col-md-2">
					<?php
					wp_nav_menu(
						array(
							'theme_location'   => 'menu-1',
							'container'        => 'ul',
							'menu_class'  => 'custom-menu'
						)
					);
					?>
				</div>
				<div class="col-md-6 d-none d-md-block  mr-auto">
					<div class="tweet d-flex">
						<span class="bi bi-twitter text-white mt-2 mr-3"></span>
						<div>
							<p><em>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam necessitatibus
									incidunt ut officiis explicabo inventore. <br></em></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-none d-md-block">
					<h3>Hire Me</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam necessitatibus incidunt ut
						officiisexplicabo inventore. <br> <a href="#">myemail@gmail.com</a></p>
				</div>
			</div>

		</div>
	</div>

	<nav class="navbar navbar-light custom-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">SkillTest</a>
			<a href="#" class="burger" data-bs-toggle="collapse" data-bs-target="#main-navbar">
				<span></span>
			</a>
		</div>
	</nav>