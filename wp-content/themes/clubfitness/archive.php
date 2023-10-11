<?php
/**
 * The template for displaying archive pages
 *
 * @package ClubFitness
 */

get_header(); ?>

<section class="content content-archive">
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
								<h1><?php the_archive_title(); ?></h1>
							</div>
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
