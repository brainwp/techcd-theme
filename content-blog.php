<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <!-- list of blog posts - single post -->
                    <div class="list-blog-posts single">
                    	        <?php if(is_singular()): ?>
                                  <h1>Lorem ipsum dolor sit</h1>
                                <?php else: ?>
                                  <h1><a href="<?php the_permalink();?>">Lorem ipsum dolor sit</a></h1>
                                <?php endif; ?>
                                <div class="info-line">
                                	<div>
                                		<?php _e('Postado em ','techcd-theme');?>
                                        <?php the_date(); ?>
                                	    <?php _e(' Por '); ?>
                                	    <?php the_author(); ?>
                                	    <?php _e(' Na categoria: '); ?>
                                	    <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'techcd-theme' ) ); ?>
                                	</div>
                                </div>
                                <div class="image thumb"><?php the_post_thumbnail('blog-th');?></div>
                                <?php if(is_singular()): ?>
                                  <?php the_content(); ?>
                                <?php else: ?>
                                  <?php the_excerpt(); ?>
                                  <a href="<?php the_permalink(); ?>" class="read-more small float-left">
                                  	<?php _e('Leia Mais...','techcd-theme'); ?>
                                   </a>
                                <?php endif; ?>
                                <div class="clear-all" style="width:100%;clear:both;height:10px;"></div>
                                <div class="info-line"><div>
      	                                <span class="float-left">
      	                                	<?php _e('Tags: ','techcd-theme'); ?>
      	                                	<?php echo get_the_tag_list('',', ',''); ?>
      	                                </span>
                                </div></div>
                    </div>
                    <!-- //list of blog posts - single post -->
</article>
