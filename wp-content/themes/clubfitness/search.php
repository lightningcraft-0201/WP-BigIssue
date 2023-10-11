<?php
/**
 * The template for displaying search results pages
 *
 * @package ClubFitness
 */

get_header(); ?>

<section class="content content-search">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-5 col-content">
				<div class="content-right">
					<?php get_template_part( 'inc/content-right' ); ?>
				</div>
			</div>
			<div class="col-xs-12 col-md-7 col-content">
				<div class="content-left">
					<div class="row">
						<div class="col-xs-12">
							<div class="page-title">
								<h1><?php esc_html_e( 'Search Results For:', 'clubfitness' ); ?> <strong><?php echo get_search_query(); ?></strong></h1>
							</div>
							<p><?php echo category_description(); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<?php get_template_part( 'loop' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
