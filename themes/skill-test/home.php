<?php
/**
 * The home template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skill_Test
 * 
 * Template Name: Home
 */

get_header();
?>

<main id="main">

	<!-- ======= Works Section ======= -->
	<section class="section site-portfolio">
		<div class="container">
			<div class="row mb-5 align-items-center">
				<div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
					<h2>Hey, I'm Johan Stanworth</h2>
					<p class="mb-0">Freelance Creative &amp; Professional Graphics Designer</p>
				</div>
				<div class="col-md-12 col-lg-6 text-start text-lg-end" data-aos="fade-up" data-aos-delay="100">
					<div id="filters" class="filters">
						<a href="#" data-filter="*" class="active">All</a>
						<a href="#" data-filter=".web">Web</a>
						<a href="#" data-filter=".design">Design</a>
						<a href="#" data-filter=".branding">Branding</a>
						<a href="#" data-filter=".photography">Photography</a>
					</div>
				</div>
			</div>
			<div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
				<div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
					<a href="work-single.html" class="item-wrap fancybox">
						<div class="work-info">
							<h3>Boxed Water</h3>
							<span>Web</span>
						</div>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_1.jpg">
					</a>
				</div>
				<div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
					<a href="work-single.html" class="item-wrap fancybox">
						<div class="work-info">
							<h3>Build Indoo</h3>
							<span>Photography</span>
						</div>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_2.jpg">
					</a>
				</div>
				<div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
					<a href="work-single.html" class="item-wrap fancybox">
						<div class="work-info">
							<h3>Cocooil</h3>
							<span>Branding</span>
						</div>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_3.jpg">
					</a>
				</div>
				<div class="item design col-sm-6 col-md-4 col-lg-4 mb-4">
					<a href="work-single.html" class="item-wrap fancybox">
						<div class="work-info">
							<h3>Nike Shoe</h3>
							<span>Design</span>
						</div>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_4.jpg">
					</a>
				</div>
				<div class="item photography col-sm-6 col-md-4 col-lg-4 mb-4">
					<a href="work-single.html" class="item-wrap fancybox">
						<div class="work-info">
							<h3>Kitchen Sink</h3>
							<span>Photography</span>
						</div>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_5.jpg">
					</a>
				</div>
				<div class="item branding col-sm-6 col-md-4 col-lg-4 mb-4">
					<a href="work-single.html" class="item-wrap fancybox">
						<div class="work-info">
							<h3>Amazon</h3>
							<span>brandingn</span>
						</div>
						<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_6.jpg">
					</a>
				</div>
			</div>
		</div>
	</section><!-- End  Works Section -->

	<!-- ======= Clients Section ======= -->
	<section class="section">
		<div class="container">
			<div class="row justify-content-center text-center mb-4">
				<div class="col-5">
					<h3 class="h3 heading">My Clients</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-4 col-sm-4 col-md-2">
					<a href="#" class="client-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-adobe.png" alt="Image"
							class="img-fluid"></a>
				</div>
				<div class="col-4 col-sm-4 col-md-2">
					<a href="#" class="client-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-uber.png" alt="Image"
							class="img-fluid"></a>
				</div>
				<div class="col-4 col-sm-4 col-md-2">
					<a href="#" class="client-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-apple.png" alt="Image"
							class="img-fluid"></a>
				</div>
				<div class="col-4 col-sm-4 col-md-2">
					<a href="#" class="client-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-netflix.png" alt="Image"
							class="img-fluid"></a>
				</div>
				<div class="col-4 col-sm-4 col-md-2">
					<a href="#" class="client-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-nike.png" alt="Image"
							class="img-fluid"></a>
				</div>
				<div class="col-4 col-sm-4 col-md-2">
					<a href="#" class="client-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-google.png" alt="Image"
							class="img-fluid"></a>
				</div>

			</div>
		</div>
	</section><!-- End Clients Section -->

	<!-- ======= Services Section ======= -->
	<section class="section services">
		<div class="container">
			<div class="row justify-content-center text-center mb-4">
				<div class="col-5">
					<h3 class="h3 heading">My Services</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
				</div>
			</div>
			<div class="row">

				<div class="col-12 col-sm-6 col-md-6 col-lg-3">
					<i class="bi bi-card-checklist"></i>
					<h4 class="h4 mb-2">Web Design</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
					<ul class="list-unstyled list-line">
						<li>Lorem ipsum dolor sit amet consectetur adipisicing</li>
						<li>Non pariatur nisi</li>
						<li>Magnam soluta quod</li>
						<li>Lorem ipsum dolor</li>
						<li>Cumque quae aliquam</li>
					</ul>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3">
					<i class="bi bi-binoculars"></i>
					<h4 class="h4 mb-2">Mobile Applications</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
					<ul class="list-unstyled list-line">
						<li>Lorem ipsum dolor sit amet consectetur adipisicing</li>
						<li>Non pariatur nisi</li>
						<li>Magnam soluta quod</li>
						<li>Lorem ipsum dolor</li>
						<li>Cumque quae aliquam</li>
					</ul>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3">
					<i class="bi bi-brightness-high"></i>
					<h4 class="h4 mb-2">Graphic Design</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
					<ul class="list-unstyled list-line">
						<li>Lorem ipsum dolor sit amet consectetur adipisicing</li>
						<li>Non pariatur nisi</li>
						<li>Magnam soluta quod</li>
						<li>Lorem ipsum dolor</li>
						<li>Cumque quae aliquam</li>
					</ul>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3">
					<i class="bi bi-calendar4-week"></i>
					<h4 class="h4 mb-2">SEO</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit explicabo inventore.</p>
					<ul class="list-unstyled list-line">
						<li>Lorem ipsum dolor sit amet consectetur adipisicing</li>
						<li>Non pariatur nisi</li>
						<li>Magnam soluta quod</li>
						<li>Lorem ipsum dolor</li>
						<li>Cumque quae aliquam</li>
					</ul>
				</div>
			</div>
		</div>
	</section><!-- End Services Section -->

</main><!-- End #main -->

<?php
get_footer();