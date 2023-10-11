<?php
/**
 * Template part for displaying gallery posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package newie
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="newie-post-wrapper">
	   <!--post thumbnal options-->
	<div class="newie-post-thumb post-thumb">
			<?php
				if ( ! is_single() && get_post_gallery() ) { ?>
		    		<div class="newie-gallery-section"> 
                        
                        <div id="gallery-2" class="gallery galleryid-201 gallery-columns-3 gallery-size-medium">
						  


					    		   <?php $gallery =get_post_gallery ( get_the_ID(), false ); 
			 
			                            foreach ( $gallery['src'] AS $src ) {
			                   		
			                   		?> 
			                   		<figure class="gallery-item">
								        <div class="gallery-icon landscape">               
			                  			    <a class="fancybox" data-fancybox-group="gallery" href="<?php echo esc_url( $src ); ?>"> 
			                  			        <img src="<?php echo esc_url( $src ) ; ?>" width="100" class="img-responsive" alt="Gallery image" />
			                  			    </a>
			                  			</div>
			                  		</figure>	    
							           
							            <?php
							        } 

							        ?>
                               
                        </div>        
		    		</div>
		    <?php	
		       
		       }

			?>
		</div><!-- .post-thumb-->
		<div class="content-wrap">
			<div class="catagories">
				<?php newie_entry_footer(); ?>
			</div>

			<div class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</div><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div>

		<div class="entry-footer">
			<div class="row">
				<div class="col-sm-6 col-md-6 authorinfo text-left">
					<?php
					if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php newie_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php
					endif; ?>
				</div>
				<div class="col-sm-6 col-md-6 more-area text-right">
					<a href="<?php the_permalink(); ?>">
					<?php _e('Read More ','newie') ?> <i class="fa fa-angle-double-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
