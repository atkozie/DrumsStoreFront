<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package drumsstorefront
 * modified from Woo Commerce storefront theme
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-left">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' ); ?>

		</div><!-- end footer-left -->
        <div class="footer-right">
            
            <a target="blank" href="https://www.facebook.com/adam.kozie"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-icon.png" alt="Adam Kozie Facebook"/></a>
            <a target="blank" href="https://www.youtube.com/channel/UCVeILjjc8y14Jm24H_ySQHA"><img src="<?php bloginfo('template_directory'); ?>/images/youtube-icon.png" alt="Adam Kozie YouTube"/></a>
            <a target="blank" href="https://soundcloud.com/northernthorns"><img src="<?php bloginfo('template_directory'); ?>/images/soundcloud-icon.png" alt="Northern Thorns Soundcloud"/></a>
            
        </div><!-- end footer-right -->

	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
