<?php
/* Template Name: User Projects */

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$rows = get_field("projeto", "user_" . $current_user->ID);



?>

<!--  Projects HTML -----> 
<nav class="client__nav flex-row">
    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logonav.png" alt="" class="nav__logo">
    <button class="logout__btn--projects" >
        <a href="/wordpress/login">Sair</a> 
    </button>
    

</nav>


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


</div>

<?php 
get_footer();