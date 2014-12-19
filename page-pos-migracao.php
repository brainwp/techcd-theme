<?php
//page pos-migracao
?>
<?php
// WP_Query arguments
$args = array (
	'post_type'              => 'product',
	'posts_per_page'         => -1,
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		update_post_meta( get_the_ID(), '_regular_price', '1', true );
		update_post_meta( get_the_ID(), '_price', '1', true );
	    update_post_meta( get_the_ID(), '_visibility', 'visible', true );
	    update_post_meta( get_the_ID(), '_stock_status', 'instock', true );
	}
}
// Restore original Post Data
wp_reset_postdata();
?>
