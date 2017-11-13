<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
         
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php endif; ?>

            <section class="home-hero">
            <img src="wp-content/themes/Inhabitent/images/logos/inhabitent-logo-full.svg" class="logo" alt="Inhabitent full logo">
            </section>
			<section class="adventures-section">
                           <h2>Latest Adventures</h2>
			   <div class="latest-adventures"></div>
               <p class="see-more">
                  <a href="http:/" class="btn">More Adventures</a>
               </p>
            </section>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
             
             
				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>
              
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
          
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
