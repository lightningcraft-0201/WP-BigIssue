<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newie
 */
 global $newie_theme_options;
  $copyright = wp_kses_post($newie_theme_options['newie-footer-copyright']);
?>                      
			</div><!-- #row -->
		</div><!-- #container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
			
			if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4'))
			{ ?>
		
				<div class="top-footer">
					<div class="container">
						<div class="row">
						    <?php
								   	$count = 0;
										for ( $i = 1; $i <= 4; $i++ )
										    {
											  if ( is_active_sidebar( 'footer-' . $i ) )
											        {
														$count++;
													}
											}
										$column = 3;
										if( $count == 4 ) 
										{
										   	$column = 3;  
									   
										}
								        elseif( $count == 3)
								        {
								             	$column = 4;
								        }
								        elseif( $count == 2) 
								        {
								             	$column = 6;
								        }
								       elseif( $count == 1) 
								        {
								             	$column = 12;
								        }
								        $column_class = 'widget-column footer-active-' . absint( $count );
								    	for ( $i = 1; $i <= 4 ; $i++ )
								    	{
					    				  	if ( is_active_sidebar( 'footer-' . $i ) )
					    				  	{
							?>	
												<div class="col-md-<?php  echo esc_attr( $column );?>">
												    <?php dynamic_sidebar( 'footer-' . $i ); ?>
												</div>
							<?php           } 
		                                }  
		                                 
		                    ?> 		

							
						</div>
					</div>
				</div>
      <?php } ?>


		<div class="site-info">
			<span class="copy-right-text"><?php echo $copyright; ?></span>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'newie' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'newie' ), 'WordPress' ); ?>
				
			</a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'newie' ), 'Newie', '<a href="http://paragonthemes.com" target="_blank">Paragon Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<a id="toTop" class="scrollToTop" href="#" title="<?php esc_attr_e('Go to Top','newie');?>"><i class="fa fa-angle-double-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>
