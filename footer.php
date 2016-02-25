<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unicode
 */

?>

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'uc' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'uc' ), 'WordPress' ); ?></a>
			<span class="sep"> // </span>
            <a href="http://udarajay.com/themes/unicode" target="_blank">Unicode</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.smoothState.min.js"></script>
<script>
;(function($) {
  'use strict';
  var $body = $('html, body'),
      content = $('.single-entry').smoothState({
        // Runs when a link has been activated
        onStart: {
          prefetch: true,
          duration: 500, // Duration of our animation
          render: function (url, $container) {
            // toggleAnimationClass() is a public method
            // for restarting css animations with a class
            content.toggleAnimationClass('is-exiting');
            // Scroll user to the top
            $body.animate({
              scrollTop: 0
            });
          }
        }
      }).data('smoothState');
      //.data('smoothState') makes public methods available
})(jQuery);
</script>

<?php wp_footer(); ?>

</body>
</html>