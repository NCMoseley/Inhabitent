<?php
/**
 * Template part for displaying posts.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-head">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
     
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <span class=price-meta><?php 
              $meta_print_value=get_post_meta(get_the_ID(),"price",true);
              echo($meta_print_value);
              ?></span>

		<?php if ( 'post' === get_post_type() ) : ?>
		
		<div class="entry-meta">
			<?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?>
		</div>

		<?php endif; ?>
	</header>
         
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
</article><
