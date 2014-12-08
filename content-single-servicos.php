<?php // Single Serviços ?>

<h1><?php the_title(); ?></h1>

<div class="col-md-11 thumbnail-servicos">
	<?php if ($thumb = get_field('thumb_servicos')) : ?>
		<img src="<?php echo $thumb; ?>" alt="Serviço <?php the_title(); ?>">
	<?php endif; ?>
</div><!-- .col-md-11 thumbnail-servicos -->

<div class="col-md-8 content-download">
	<?php the_content(); ?>
</div>

<div class="col-md-4 content-servicos">
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
</div><!-- .col-md-11 content-servicos -->
