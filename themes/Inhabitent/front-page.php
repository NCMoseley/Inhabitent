<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
<!-- Hero -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
         
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php endif; ?>

            <section class="home-hero">
              <img src="wp-content/themes/Inhabitent/images/logos/inhabitent-logo-full.svg" class="logo" alt="full logo">
              </section>

<!-- Shop Stuff -->
            <section class="product-info-container">
            <h2>Shop Stuff</h2>
            <?php
               $terms = get_terms( array(
                   'taxonomy' => 'product-type',
                   'hide_empty' => 0,
               ) );

			   d($terms);
               if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            ?>
               <div class="product-type-blocks">

                  <?php foreach ( $terms as $term ) : ?>

                     <div class="product-type-block-wrapper">
                        <img src="<?php echo get_template_directory_uri() . '/images/' . $term->slug; ?>.svg" alt="<?php echo $term->name; ?>" />
                        <p><?php echo $term->description; ?></p>
                        <p><a href="<?php echo get_term_link( $term ); ?>" class="btn"><?php echo $term->name; ?> Stuff</a></p>
                     </div>

                  <?php endforeach; ?>

               </div>
               
            <?php endif; ?>
         </section>

<!-- Journal -->            
            <?php
               $args = array( 'post_type' => 'post', 'order' => 'DESC', 'posts_per_page' => '3' );

               $product_posts = get_posts( $args ); // returns an array of posts
              ?>
			  
             <h1 class="habj">Inhabitant Journal</h1>

			<section class="journal">
            <?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>
			
			<div class="thumbs">
            <?php the_post_thumbnail(); ?>
			<p class="jdate"><?php the_date(); ?></p>
			<?php the_title(); ?>
			
            <a id="jbutton" href="<?php the_permalink(); ?>">Read Entry</a>
			<?php the_posts_navigation(); ?>
			</div>

              <?php endforeach; wp_reset_postdata(); ?>
            </section>

<!-- Latest Adventures -->
	        <section class="adventures-section">
                           <h2>Latest Adventures</h2>
		              <!-- <div class="latest-adventures"></div> -->
        <div class="adventures-container">
          <ul class="adventure-list">
            <li class="canoe"><h3><a class="text" href="">Getting Back to Nature in a Canoe</a></h3></li><a id="button" href="https://github.com/NCMoseley?tab=repositories">READ MORE</a>
            <li class="beach"><h3><a href="">A Night with Friends at the Beach</a></h3><a class="button" href="">READ MORE</a></li>
		 <div class="failure">
            <li class="view"><h3><a href="">Taking in the View at Big Mountain</a></h3><a class="button" href="">READ MORE</a></li>
            <li class="sky"><h3><a href="">Star-Gazing at the Night Sky</a></h3><a class="button" href="">READ MORE</a></li>
		</div><!-- failure -->
          </ul>
               <a href="https://github.com/NCMoseley?tab=repositories" class="morebutton">More Adventures</a>
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
