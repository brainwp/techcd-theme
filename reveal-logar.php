<?php
//login modal
$args = array(
        'echo'           => true,
        'redirect'       => site_url(),
        'form_id'        => 'loginform',
        'label_username' => __( 'Nome de usuário: ', 'techcd-theme' ),
        'label_password' => __( 'Senha: ','techcd-theme' ),
        'label_remember' => __( 'Lembrar?', 'techcd-theme' ),
        'label_log_in'   => __( 'Fazer login','techcd-theme' ),
        'id_username'    => 'user_login',
        'id_password'    => 'user_pass',
        'id_remember'    => 'rememberme',
        'id_submit'      => 'wp-submit',
        'remember'       => true,
        'value_username' => NULL,
        'value_remember' => false
);
?>
<div class="col-md-12 contato">
	<div class="wpcf7-form"><?php wp_login_form( $args ); ?></div><!-- .wpcf7 -->
</div><!-- .col-md-12 contato -->

