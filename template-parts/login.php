<?php
    /* Template Name: Login Page */
    get_header();

?>

<div class="loginpage__wrapper">

    

    <div class="form__container flex-col">
    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-maionese.png" alt="" class="login__logo">
    <h1 class="login__header">Área de cliente</h1>
    <?php
    if ( ! is_user_logged_in() ) { // Display WordPress login form:
        $args = array(
            'redirect' => home_url( '/user-projects/' ), 
            'form_id' => 'loginform-custom',
            'label_username' => __( 'Utilizador' ),
            'label_password' => __( 'Palavra-chave' ),
            'label_remember' => __( 'Lembrar-me' ),
            'label_log_in' => __( 'Entrar' ),
            'remember' => true
        );
        wp_login_form( $args );
    } else { // If logged in:
        wp_loginout( home_url() ); // Display "Log Out" link.
        echo " | ";
        wp_register('', ''); // Display "Site Admin" link.
    }
    ?>
</div>


</div>
<?php 
get_footer();