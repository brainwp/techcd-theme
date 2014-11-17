<?php
//FAQ content
?>
<li class="col-md-12 help-topic">
	<a data-faq-id="<?php echo get_the_ID();?>"><?php the_title(); ?></a>
</li><!-- .col-md-12 help-topic -->
<div id="faq-<?php echo get_the_ID();?>" class="col-md-12 help-topic-content">
	<?php the_content(); ?>
</div><!-- .col-md-12 help-topic-content -->
