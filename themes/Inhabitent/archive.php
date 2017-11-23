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

              <!-- <h1 class="page-title">Shop Stuff</h1> -->

				<?php
				    the_archive_title( '<h1 class="page-title">', '</h1>');
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

        
			  <?php while ( have_posts() ) : the_post(); ?>

            
				<?php get_template_part( 'template-parts/content' ); ?>

				<div class="jbtn">
                  <a id="jbutton" href="<?php the_permalink(); ?>">Read More →</a>
			      <?php the_posts_navigation(); ?>
			    </div>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
			

		    <?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
