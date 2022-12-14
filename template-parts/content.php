<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moina Lite
 */
if ( ! is_singular( ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="preview-mini-wrap clearfix">
	<?php if ( has_post_thumbnail ()): ?>
    <div class="mask">
    	<div class="mask-img">
	        <?php moina_post_thumbnail(); ?>
	    </div>
    </div>
    <?php endif; ?>
    <div class="meta <?php if ( ! has_post_thumbnail ()): ?>meta-padding<?php endif; ?>">
        <div class="byline byline-2 byline-cats-design-1">
            <?php moina_posted_on(); ?>
        </div>
        <div class="title-wrap">
            <?php
				the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			?>
    	</div>
    	<div class="excerpt body-color">
	    	<?php the_excerpt(); ?>
    	</div>
	</div>
</div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php moina_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">
					<?php moina_posted_by(); ?>
					<?php moina_posted_on(); ?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'moina-lite' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moina-lite' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php moina_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>