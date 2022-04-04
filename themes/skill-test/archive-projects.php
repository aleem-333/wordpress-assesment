<?php
/**
 * The template for displaying Projects archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skill_Test
 */

get_header();
?>


<?php echo redirecting_users(); ?>

<main id="main">
	<!-- ======= Works Section ======= -->
	<section class="section site-portfolio">
		<div class="container">
			<div class="row mb-5 align-items-center">
				<div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
					<h2>Projects</h2>
					<p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
				</div>
				<div class="col-md-12 col-lg-6 text-start text-lg-end" data-aos="fade-up" data-aos-delay="100">
					<?php 
					$terms = get_terms([
						'taxonomy' => 'project_type',
						'hide_empty' => false,
					]);
					?>
					<div id="filters" class="filters">
						<?php foreach($terms as $term) : ?>
						<a href="#" class="filter" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array( 
				'posts_per_page' => 6, 
				'paged' => $paged, 
				'post_type' => 'projects'
			);
			$query = new WP_Query($args);
			if ( $query->have_posts() ) : ?>
			<div class="projects row no-gutter" data-aos="fade-up" data-aos-delay="200">
				<?php
				/* Start the Loop */
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
				<div class="item col-sm-6 col-md-4 col-lg-4 mb-4">
					<a href="#" class="item-wrap fancybox">
						<div class="work-info">
							<h3><?php the_title(); ?></h3>
						</div>
						<img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>">
					</a>
				</div>
				<?php endwhile; 
				?>
			</div>
					
			<div class="pagination">
				<?php 
					echo paginate_links( array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => true,
						'prev_text'    => sprintf( '<i><</i> %1$s', __( 'Prev', 'text-domain' ) ),
						'next_text'    => sprintf( '%1$s <i>></i>', __( 'Next', 'text-domain' ) ),
						'add_args'     => false,
						'add_fragment' => '',
					) );
				?>
			</div>
			
			
			<?php else : ?>
			
			<?php _e('Sorry, no posts matched your criteria.'); ?>
			
			<?php endif; ?>
		</div>
		<div>
			<h2>Link to Cup of Coffee</h2>
			<?php echo hs_give_me_coffee(); ?>
		</div>
	</section><!-- End  Works Section -->
	

</main><!-- End #main -->


<?php
get_footer();