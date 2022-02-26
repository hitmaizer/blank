<?php
/* Template Name: User Projects */

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$status = get_field("status", "user_" . $current_user->ID);



?>

<!--  Projects HTML -----> 
<div class="projectspage__wrapper">
    <div class="content__container flex-row">
        <div class="menu__wrapper">
            <h6 class="menu__header">Olá, <?php echo $username ?></h6>
        </div>
        <div class="content__wrapper">
            <h1 class="projects__title">Bem-vindo, esta é a sua área. Escolha e aceda a todo o conteudo do projeto</h1>
            <p class="placeholder__project">Titulo do projeto 1</p>
            <p class="placeholder__project">Titulo do projeto 2</p>
        </div>
    </div>


</div>

<?php 
get_footer();