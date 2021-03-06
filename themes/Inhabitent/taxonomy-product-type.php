<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
            <h1><?php single_term_title(); ?></h1>
               <?php the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
        </header>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			  <?php   get_template_part( 'template-parts/content', 'tax' ); ?>	             
			<?php endwhile; ?>
			  <?php the_posts_navigation(); ?>
		    <?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
		</main>
	</div>
<?php get_footer(); ?>
