<?php
// pagination file
global $pagination_float;
?>
<div class="col-md-12 clear-mob"></div>
<div class="col-md-12 woo_pagination">

	<div class="pagination <?php echo $pagination_float; ?>">
		<?php
		global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type' => 'list',
	    'next_text' => '&nbsp;',
	    'prev_text' => '&nbsp;'
        ) );

		?>
	</div>
	<!-- //pagination -->
</div><!-- .col-md-12 -->
<div class="col-md-12 clear-mob"></div>
