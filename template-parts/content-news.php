<?php

/**
 * Template part for displaying news
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Content news
 * @package Mystery Themes
 * @subpackage News Portal
 * @since 1.0.0
 */

?>
<style>
	.news_content {
		margin-top: 30px;
		margin-bottom: 50px;
		font-size: 1.3em;
	}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="np-article-thumb">

		<?php the_post_thumbnail('full'); ?>

	</div><!-- .np-article-thumb -->


	<header class="entry-header">
		<?php
		the_title('<h1 class="entry-title">', '</h1>');
		news_portal_single_post_categories_list();
		?>
		<div class="entry-meta">
			<?php news_portal_inner_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		$text = get_post_meta($post->ID, '_description', true);
		$content = apply_filters('the_content', $text);

		// echo $text;
		echo '<div class="news_content">' . $content . '</div>';
		the_content(sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'news-portal'),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		));

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'news-portal'),
			'after'  => '</div>',
		));
		?>

		<?php echo '<h3>Want to follow us on social media ? </h3><br>' . do_shortcode("[DISPLAY_ULTIMATE_PLUS]"); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php news_portal_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->