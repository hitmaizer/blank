<?php
/* Template Name: User Projects */

if (!is_user_logged_in()) {
    wp_redirect(home_url( '/login/' ));
    exit;
} 

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$rows = get_field("projeto", "user_" . $current_user->ID);



?>

<!--  Projects HTML -----> 
<nav class="client__nav flex-row">
    <a href="http://maionesedesign.pt" class="nav__link">
        <img src="https://www.maionesedesign.pt/wp-content/uploads/2022/03/logo-nav.png" alt="" class="nav__logo">
    </a>
    <button class="logout__btn--projects" >
        <a href="<?php echo wp_logout_url(); ?>">Sair</a> 
    </button>
    

</nav>

<?php 

?>

<div class="projectspage__wrapper">
    <div class="content__container flex-row">
        <div class="menu__wrapper">
            <h6 class="menu__header">Olá, <?php echo $username ?></h6>
        </div>
        <div class="content__wrapper flex-col">
            <h1 class="projects__title">Bem-vindo, escolha o seu projeto.</h1>
            <div class="projects__wrapper flex-col">        
                <?php 
                if($rows){
                    while(have_rows('projeto', "user_" . $current_user->ID)):
                        the_row();
                        ?>
                        <a href="/wordpress/user-profile?id=<?php echo get_row_index() ?>">
                            <p class="placeholder__project"><?php echo get_sub_field('nome_do_projeto')?></p>
                        </a>
                        <?php
                    endwhile;
                } else {
                    ?>
                        <p class="placeholder__project">Ainda não tem projetos disponiveis.</p>
                    <?php
                }
                ?>        
            </div>
        </div>
    </div>
    
    <div class="bottom__client flex-row">
        <div class="footer__section flex-col">
            <a href="http://maionesedesign.pt" class="footer__link">
                <img src="https://www.maionesedesign.pt/wp-content/uploads/2022/03/logo-footer.png" alt="" class="footer__logo">
            </a>
            <p class="footer__logotext">© 2022 Maionese Design</p>
            <p class="footer__logotext">Todos os direitos reservados</p>
        </div>
        <div class="footer__section flex-col">
            <h3 class="footer__title">Contactos</h3>
            <div class="contactos__wrapper flex-col">
                <a href="mailto:geral@maionesedesign.pt" class="footer__link">geral@maionesedesign.pt</a>
                <a href="tel:+351913023001" class="footer__link">913 023 001</a>
                <a href="https://goo.gl/maps/9vCMb8ZRRBrDRTNS6" class="footer__link">
                    <p class="footer__morada">Rua Alfredo Pereira 190</p> 
                    <p class="footer__morada">4560-502 Penafiel</p> 
                </a>
            </div>
        </div>
        <div class="footer__section flex-col">
            <h3 class="footer__title">Social</h3>
            <div class="social__links flex-row">
                <a href="https://www.instagram.com/maionesedesign.pt/" class="social__link" target="_blank">
                    <img src="https://www.maionesedesign.pt/wp-content/uploads/2022/03/instagram.png" alt="" class="social__icon">
                </a>
                <a href="https://www.linkedin.com/company/maionesedesign/" class="social__link" target="_blank">
                    <img src="https://www.maionesedesign.pt/wp-content/uploads/2022/03/linkedin.png" alt="" class="social__icon">
                </a>
                <a href="https://www.behance.net/maionesedesign" class="social__link" target="_blank">
                    <img src="https://www.maionesedesign.pt/wp-content/uploads/2022/03/behance.png" alt="" class="social__icon">
                </a>
                <a href="https://www.youtube.com/channel/UCmZ2AHM-8yFck9zDqTQ6b7A" class="social__link" target="_blank">
                    <img src="https://www.maionesedesign.pt/wp-content/uploads/2022/03/youtube.png" alt="" class="social__icon">              
                </a>
            </div>
        </div>
    </div>

</div>

<?php 
get_footer();