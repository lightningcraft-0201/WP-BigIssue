<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ClubFitness
 */

get_header(); ?>

<section class="content content-404">
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
								<h1><?php esc_html_e( 'The Page You Are Looking For Doesn&rsquo;t Exist.', 'clubfitness' ); ?></h1>
							</div>
							<h2><?php esc_html_e( 'We are very sorry for the inconvenience.', 'clubfitness' ); ?></h2>
							<p><?php esc_html_e( 'Perhaps, Try using the search box below.', 'clubfitness' ); ?></p>
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
