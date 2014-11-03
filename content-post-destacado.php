<?php
//content-post-destacado.php
global $post_destacado;
?>
	<div class="col-md-12" id="post_destacado">
		<div class="col-md-7 pull-left">
			<h3><?php the_field('sub_title',$post_destacado->ID);?></h3>
		    <h2><?php echo get_the_title($post_destacado->ID);?><h2>
		    <div class="content_post_destaque"><?php the_field('resumo',$post_destacado->ID);?></div>
		    <a href="<?php echo get_permalink($post_destacado->ID);?>" class="read-more small float-left">Leia mais...</a>
		</div><!-- .col-md-8 pull-left -->
	   <div class="col-md-5 pull-right imagem">
	    	<?php echo get_the_post_thumbnail( $post_destacado->ID, 'th-destaque', false );  ?>
		</div><!-- .col-md-5 -->

	</div><!-- #post_destacado.col-md-12 -->
