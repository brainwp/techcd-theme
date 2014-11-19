<a href="<?php the_permalink(); ?>" class="col-md-4 home_widget content-servicos">
	<div class="col-md-12 clear-mob"></div>
	<?php the_post_thumbnail('medium'); ?>
	<div class="col-md-12 titulo <?php echo get_post_meta( get_the_ID(), 'servicos_icone', true ); ?>">
		<span class="item"><?php the_title(); ?></span>
	</div>
	<div class="col-md-12 text">
		<?php the_excerpt(); ?>
	</div><!-- .col-md-12 text -->
	<div class="col-md-12 clear-mob"></div>
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
</a>
