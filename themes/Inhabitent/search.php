<?php
/**
 * The template for displaying search results pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'search' ); ?>
            <div class="jbtn">
                <a  class="jbutton" href="<?php the_permalink(); ?>">Read Entry →</a>
			<?php the_posts_navigation(); ?>
			</div>
			<?php endwhile; ?>
			<?php red_starter_numbered_pagination(); ?>
		    <?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		    <?php endif; ?>
		</main>
	</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
