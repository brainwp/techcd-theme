<?php
/**
 * Template name: Query
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div id="primary" class="<?php echo odin_full_page_classes(); ?>">
		<div id="content" class="site-content" role="main">

			<?php
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => -1,
					'post_status' => array( 'publish', 'draft' ),
					'orderby' => 'title',
					'order' => 'ASC'
					);

				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() && is_user_logged_in() ) {
					echo '<ul>';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						if( !has_post_thumbnail() ) {
							echo '<li><a target="_blank" href='. admin_url( 'post.php?post=' . get_the_ID() . '.&action=edit' ) .'>';
							echo get_the_title() . '</a></li>';
						}
					}
					echo '</ul>';
				} else {
					echo "Você precisa estar logado para ver o conteúdo!";
				}
			?>

		</div><!-- #content -->

		<div class="sombra"></div>

	</div><!-- #primary -->
<?php get_template_part('content','bottom'); ?>
<?php
get_footer();
