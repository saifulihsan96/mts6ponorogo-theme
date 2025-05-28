<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package future
 */

?>
		
		<footer class="footer-main"></footer>
	</div>
	<script src="<?php echo FTR_URI ?>/dist/js/pass.bundle.js?v=<?php echo filemtime( get_template_directory() . '/dist/js/pass.bundle.js' ); ?>"></script>
	<?php wp_footer(); ?>

	</body>
</html>
