<?php
//single serviços
?>
<h1><?php the_title(); ?></h1>
<div class="col-md-12 thumbnail-download">
	<?php the_post_thumbnail('brasa_slider_img'); ?>
</div><!-- .col-md-12 thumbnail-download -->
<div class="col-md-12 content-download">
	<?php the_content(); ?>
</div>
<div class="col-md-12 content-servicos">
	<div class="itens-servicos">
		<?php if( have_rows('servicos_itens') ):
	    // loop through the rows of data
        while ( have_rows('servicos_itens') ) : the_row(); ?>
        <span class="col-md-12">
        	<?php the_sub_field('servicos_itens_text'); ?>
        </span>

        <?php endwhile;
       endif; ?>
	</div><!-- .itens-servicos -->
</div><!-- .col-md-12 content-servicos -->
