<?php
    /* Template Name: Logout Page */
    get_header();

?>

<div class="logout__wrapper flex-col">
    <div class="dialog__container flex-col">
        <img class="login__logo" src="<?php echo get_template_directory_uri() ?>/assets/images/logo-maionese.png" alt="" class="logout__img">
        <h1 class="login__header logout__header">Até breve.</h1>
    </div>
    <div class="back__btn">
        <a href="http://maionesedesign.pt" class="btn__link">
            <h1 class="btn__text--back">maionesedesign.pt</h1>
        </a>
    </div>
</div>
<?php 
get_footer();