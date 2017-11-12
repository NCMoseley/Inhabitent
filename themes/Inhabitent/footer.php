<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					  <div class="footer-container">
                <div class="contact-info">
                    <h1>CONTACT INFO</h1>
                    <p><span class="fa fa-envelope" aria-hidden="true"></span>info@inhabitent.com</p>
                    <p><span class="fa fa-phone" aria-hidden="true"></span>778-456-7891</p>
                    <p><span class="fa fa-facebook-square" aria-hidden="true"></span><span class="fa fa-twitter-square" aria-hidden="true"></span>
                    <span class="fa fa-google-plus-square" aria-hidden="true"></span></p>
                </div>
                <div class="business-hours">
                    <h1>BUSINESS HOURS</h1>
                    <p><span class="day">Monday-Friday:</span> 9am to 5pm</p>
                    <p><span class="day">Saturday:</span> 10am to 2pm</p>
                    <p><span class="day">Sunday:</span> Closed</p>
                </div>  
                <div class = "footer-image">
                    <a href= "/"> <!--Home Link-->
                        <img src=<?php echo get_template_directory_uri() . "/Applications/MAMP/htdocs/inhabitent/wp-content/themes/Inhabitent/images/logos/inhabitent-logo-text.svg" ?> alt="">
                    </a>
            </div>
					<a href="<?php echo esc_url( 'https://https://github.com/NCMoseley/' ); ?>"><?php printf( esc_html( 'Proudly powered by %s' ), 'NateDogg' ); ?></a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
