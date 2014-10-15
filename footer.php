<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
$footer_opts = get_option('footer');
$endereco = str_replace("\n", '<br>', $footer_opts['footer_endereco']);
$emails = str_replace("\n", '<br>', $footer_opts['footer_emails']);
$mapa_img = wp_get_attachment_image_src($footer_opts['footer_mapa_img'], 'full', false );
$mapa_img = $mapa_img[0];
?>

		</div><!-- #main -->
	</div><!-- .container -->
   <!-- bottom -->
    <div id="bottom" class="container">
        <div class="col-md-4 pull-left">
        	<img class="logo_footer" src="<?php bloginfo('template_url');?>/assets/images/logo-techcd-footer.png">
            <span class="col-md-12">CNPJ <?php echo $footer_opts['footer_cnpj'];?></span>
            <span class="col-md-12"><?php echo $endereco; ?></span>
        </div>
        <div class="col-md-4 pull-left">
        	<span class="tel"><?php echo $footer_opts['footer_tel'];?></span>
        	<span class="emails"><?php echo $emails;?></span>
        </div><!-- .col-md-3 pull-left -->
        <a href="<?php echo $footer_opts['footer_mapa_link'];?>" class="col-md-4 pull-right mapa_footer">
        	<img src="<?php echo $mapa_img;?>">
        </a><!-- .col-md-4 mapa_footer -->
    </div>
    <!-- //bottom -->

	<?php wp_footer(); ?>
</body>
</html>
