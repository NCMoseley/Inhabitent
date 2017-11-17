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

              <h1 class="page-title">Shop Stuff</h1>

				<?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

           

			
			  <?php while ( have_posts() ) : the_post(); ?>

           
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>

			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>


		<?php endif; ?>
      <div class="entry-container"> 
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		       <span class=price-meta><?php 
              $meta_print_value=get_post_meta(get_the_ID(),"price",true);
              echo($meta_print_value);
              ?></span>
     </div> <!-- .entry-container -->
		<?php if ( 'post' === get_post_type() ) : ?>
		

		<div class="entry-meta">
			<?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->
                
            
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
			
              

		    <?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
        
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
s