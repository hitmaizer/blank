<?php
    /* Template Name: Login Page */
    

    if (is_user_logged_in()) {
        wp_redirect(home_url( '/user-projects/' ));
        exit;
    } 

    get_header();
?>

<div class="loginpage__wrapper">

    

    <div class="form__container flex-col">
    <img src="https://www.maionesedesign.pt/wp-content/uploads/2022/03/logo-maionese.png" alt="" class="login__logo">
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
    <?php 
    if(isset($_GET['login'])){

        if($_GET['login'] == 'failed') {
            ?>
                <div class="error__container flex-row">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/error-icon.png" alt="" class="error__icon">
                    <p class="error__message">Utilizador ou Palavra-chave erradas. Por favor, tente novamente.</p>
                </div>
            <?php
        }
    }
        ?>
</div>
    <p class="footer__login">Dificuldades em aceder á sua Área de Cliente? <br> 
    Contactar <a href="mailto:geral@maionesedesign.pt" class="mail__link">geral@maionesedesign.pt</a></p>
</div>
<?php 
get_footer();