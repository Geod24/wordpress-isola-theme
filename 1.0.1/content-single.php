<?php
/**
 * @package Isola
 */
$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() && 'image' == $format ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail( 'isola-featured' ); ?>
		</figure>
	<?php endif; ?>

	<?php if ( 'video' == $format ) :

		$content = apply_filters( 'the_content', get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'isola' ) ) );
		$media = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

		?>
		<?php if ( ! empty( $media ) ) : ?>
		    <?php
		    foreach( $media as $embed_html ) {
		        $content = str_replace( $embed_html, '', $content );
		    } ?>
			<div class="entry-video jetpack-video-wrapper">
		    <?php
		        foreach ( $media as $embed_html ) {
		            printf( '%1$s', $embed_html );
		        } ?>
	    	</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( 'gallery' == $format ) : ?>

	<?php endif; ?>

	<div class="entry-content">
		<?php if ( 'video' == $format ) : ?>
			<?php echo $content; ?>
		<?php else : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'isola' ) ); ?>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'isola' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php isola_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
			$tags_list = get_the_tag_list( '', '' );
			if ( $tags_list ) :
		?>
		<span class="tags-links">
			<?php echo $tags_list; ?>
		</span>
		<?php endif; // End if $tags_list ?>

		<?php edit_post_link( __( 'Edit', 'isola' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
