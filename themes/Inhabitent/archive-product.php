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
              <h1 class="title">Shop Stuff</h1>

				   <?php $terms = get_terms('product-type');
                    echo '<ul class="product-type-list">';
                    foreach ($terms as $term) {
                            echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
                    }
                    echo '</ul>'; ?>					
	    </header>
			<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-head">
					<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
					<?php endif; ?>
				<div class="entry-container"> 
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<span class=price-meta><?php 
					$meta_print_value=get_post_meta(get_the_ID(),"price",true);
					echo($meta_print_value);
					?>
					</span>			  
				</div> 
					<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?>
				</div>
					<?php endif; ?>
			</header>
		</article>
			<?php endwhile; ?>
			<?php the_posts_navigation(); ?>
		    <?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		    <?php endif; ?>
	</main>
</div>

<?php get_footer(); ?>
