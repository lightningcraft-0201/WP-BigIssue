<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newie
 */
global $newie_theme_options;
$newie_theme_options    = newie_get_theme_options();
$category_id            = $newie_theme_options['newie-promo-cat'];
$category_name          = $newie_theme_options['newie-feature-cat'];
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="boxed">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class('at-sticky-sidebar');?>>
<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newie' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="newie-logo">
		    	<div class="logo-center">		
					<?php the_custom_logo();?>
				</div>		 
			</div>	 

         	<div class="newie-logo-text">
             	<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
				endif; ?>
			</div>
		</div>
		<div class="container">
			<nav id="site-navigation" class="main-navigation navbar" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only"><?php esc_html_e('Toggle navigation','newie') ?></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>

					
					<div class="header-nav">
						<div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
							<?php 
       							if (has_nav_menu('primary')) {
             						 wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );
             					}
             						  ?>
						</div><!-- /.navbar-collapse -->

						<div class="top-right">
							<div class="social-links top-header-social">
	                            <?php 
	                            if (has_nav_menu('social')) {
	                               wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu' ) ); 
	                            }
	                               ?>
						    </div>
						    <div class="search-wrapper">
								<i class="fa fa-search"></i>
								<div class="search-form-wrapper">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
			</nav>
		</div>
	</header><!-- #masthead -->
	<?php if($category_name > 0 && is_front_page() && is_home() ){ ?>

	<section  class="owl-wrapper clearfix">
		<div class="container">
			<div id="featured-slider">
				<?php newie_slider_images_selection(); ?>	
			</div>
		</div>
	</section>

	<?php }
	if( $category_id > 0 && is_home() )
		{ ?>
			<section class="promo-area">
			  <?php if ( is_front_page() && is_home() )
			   {  ?>
					<div class="container">
						<div class="row">
								<?php
								$args = array( 'cat' => $category_id , 'posts_per_page' => 3,'order'=> 'DESC' );

								  $query = new WP_Query($args);

								  if($query->have_posts()):

									while($query->have_posts()):

									 $query->the_post();
							?>

									<div class="col-md-4">
										<a href="<?php the_permalink(); ?>">
										<?php

										 if(has_post_thumbnail())
									   {

											 $image_id  = get_post_thumbnail_id();
											 $image_url = wp_get_attachment_image_src($image_id,'newie-promo-post',true);
                                        ?>

											<figure>
												<img src="<?php echo esc_url($image_url[0]);?>">
											</figure>
								<?php   } ?>

											<div class="category">
												<?php $posttags = get_the_tags();

												if( !empty( $posttags ))
												{
												?>
													<h2>
														<?php
															$count = 0;
															if ( $posttags ) 
															{
															  foreach( $posttags as $tag )
															   {
																	$count++;
																	if ( 1 == $count )
																	  {
																	   echo $tag->name;
																      }
															    }
										                    } ?>
													</h2>
										<?php   } ?>
											</div>
										</a>
									</div>

							<?php    endwhile; endif; wp_reset_postdata(); ?>

						</div>
					</div>
		      <?php } ?>
			</section>
<?php   } ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">