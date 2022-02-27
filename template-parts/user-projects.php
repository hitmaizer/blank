<?php
/* Template Name: User Projects */

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$rows = get_field("projeto", "user_" . $current_user->ID);



?>

<!--  Projects HTML -----> 
<div class="projectspage__wrapper">
    <div class="content__container flex-row">
        <div class="menu__wrapper">
            <h6 class="menu__header">Olá, <?php echo $username ?></h6>
        </div>
        <div class="content__wrapper">
            <h1 class="projects__title">Bem-vindo, esta é a sua área. Escolha e aceda a todo o conteudo do projeto</h1>
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