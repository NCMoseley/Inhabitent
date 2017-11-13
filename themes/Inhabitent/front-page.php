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
		              <!-- <div class="latest-adventures"></div> -->

        <div class="adventures-container">
          <ul class="adventure-list">
            <li class="canoe"><h3><a href="">Getting Back to Nature in a Canoe</a></h3><a     class="button" href="">READ MORE</a></li>
            <li class="beach"><h3><a href="">A Night with Friends at the Beach</a></h3><a class="button" href="">READ MORE</a></li>
		 <div class="failure">
            <li class="view"><h3><a href="">Taking in the View at Big Mountain</a></h3><a class="button" href="">READ MORE</a></li>
            <li class="sky"><h3><a href="">Star-Gazing at the Night Sky</a></h3><a class="button" href="">READ MORE</a></li>
		</div><!-- failure -->
          </ul>
               <a href="https://www.muchbetteradventures.com/" class="morebutton">More Adventures</a>
<h4 class="more"></h4>
		</div> <!-- adventures-container -->
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

<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>
