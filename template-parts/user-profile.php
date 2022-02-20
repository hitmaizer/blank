<?php
/* Template Name: User Profile */

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$status = get_field("status", "user_" . $current_user->ID);



?>

<!-- AQUI VAI O TEU HTML -->

    <div class="page__wrapper flex-row">
        <div class="page__sidebar flex-col">
            <ul class="sidebar__menu flex-col">
                <div class="list__item flex-row" id="status_toggle" onclick="statusHandler()">
                    <li>Estado</li>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="" class="item__icon">
                </div>
                <div class="list__item flex-row" id="proposta_toggle" onclick="propostaHandler()">
                    <li>Proposta</li>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="" class="item__icon">
                </div>
                <div class="list__item flex-row" id="orcamento_toggle" onclick="orcamentoHandler()">
                    <li>Orçamento</li>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="" class="item__icon">
                </div>
                <div class="list__item flex-row" id="fase1_toggle" onclick="fase1Handler()">
                    <li>Fase 1</li>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="" class="item__icon">
                </div>
                <div class="list__item flex-row" id="fase2_toggle" onclick="fase2Handler()">
                    <li>Fase 2</li>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="" class="item__icon">
                </div>
                <div class="list__item flex-row" id="fase3_toggle" onclick="fase3Handler()">
                    <li>Fase 3</li>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="" class="item__icon">
                </div>
                <div class="list__item flex-row" id="final_toggle" onclick="finalHandler()">
                    <li>Ficheiros Finais</li>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.png" alt="" class="item__icon">
                </div>
            </ul>
        </div>
        <div class="page__content flex-col">

            <h1 class="welcome__header">Bem-vindo <?php echo $username ?>.</h1>

            <div class="status__container container" id="status">
                <h1 class="container__header status__header">O seu projecto encontra-se na <span class="strong__txt"><?php echo $status["label"]?></span>.</h1>
                <?php 
                    switch($status["value"]) {
                        case "proposta": 
                            ?>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/status1.png" alt="" class="status__img">
                        <?php
                        break;
                        case "orcamento": 
                            ?>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/status2.png" alt="" class="status__img">
                        <?php
                        break;
                        case "fase1": 
                            ?>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/status3.png" alt="" class="status__img">
                        <?php
                        break;
                        case "finalfiles": 
                            ?>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/status.png" alt="" class="status__img">
                        <?php
                        break;
                        default : 
                            ?>
                        <h1>O seu projecto ainda vai ser iniciado.</h1>
                        <?php
                        break;

                    }
                ?>
            </div>

            <div class="proposta__container container" id="proposta">
                <h1 class="container__header proposta__header">Aqui pode consultar a proposta para o seu projecto.</h1>
                <div class="files__grid">
                    <?php 
                        $rows = get_field("proposta", "user_" . $current_user->ID);
                        if($rows): 
                            foreach ($rows as $row) {
                                ?>
                                    <a href="<?php echo $row["file"] ?>" class="file__container" target="_blank">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/file.png" alt="" class="file__placeholder">
                                        <p class="file__description"><?php echo $row["type"] ?></p>
                                    </a>
                                <?php 
                            }
                        else :
                            ?>
                                <h1>Ainda não há propostas disponiveis.</h1>
                            <?php
                        endif; 
                    ?>
                </div>
            </div>

            <div class="orcamento__container container" id="orcamento">
                <h1 class="container__header orcamento__header">Aqui pode consultar o orçamento do seu projecto.</h1>
                
                <div class="files__grid">
                    <?php 
                        $rows = get_field("orcamento", "user_" . $current_user->ID);
                        if($rows): 
                            foreach ($rows as $row) {
                                ?>
                                    <a href="<?php echo $row["ficheiro"] ?>" class="file__container" target="_blank">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/file.png" alt="" class="file__placeholder">
                                        <p class="file__description"><?php echo $row["nome_do_orcamento"] ?></p>
                                    </a>
                                <?php 
                            }
                        else :
                            ?>
                                <h1>Ainda não há orçamentos disponiveis.</h1>
                            <?php
                        endif; 
                    ?>
                </div>

            </div>

            <div class="fase1__container" id="fase1">
                <h1 class="container__header fase__header">Aqui pode consultar a Fase 1 do seu Projecto.</h1>
                
                <div class="files__grid">
                    <?php 
                        $rows = get_field("fase_1", "user_" . $current_user->ID);
                        if($rows): 
                            foreach ($rows as $row) {
                                ?>
                                    <a href="<?php echo $row["ficheiro"] ?>" class="file__container" target="_blank">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/file.png" alt="" class="file__placeholder">
                                        <p class="file__description"><?php echo $row["name"] ?></p>
                                    </a>
                                <?php 
                            }
                        else :
                            ?>
                                <h1>Ainda não há elementos disponiveis.</h1>
                            <?php
                        endif; 
                    ?>
                </div>

            </div>
            <div class="fase2__container" id="fase2">

                <h1 class="container__header fase__header">Aqui pode consultar a Fase 2 do seu Projecto.</h1>
                
                <div class="files__grid">
                    <?php 
                        $rows = get_field("fase_1", "user_" . $current_user->ID);
                        if($rows): 
                            foreach ($rows as $row) {
                                ?>
                                    <a href="<?php echo $row["ficheiro"] ?>" class="file__container" target="_blank">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/file.png" alt="" class="file__placeholder">
                                        <p class="file__description"><?php echo $row["name"] ?></p>
                                    </a>
                                <?php 
                            }
                        else :
                            ?>
                                <h1>Ainda não há elementos disponiveis.</h1>
                            <?php
                        endif; 
                    ?>
                </div>
            
            </div>
            <div class="fase3__container" id="fase3">
                <h1 class="container__header fase__header">Aqui pode consultar a Fase 3 do seu Projecto.</h1>
                
                <div class="files__grid">
                    <?php 
                        $rows = get_field("fase_1", "user_" . $current_user->ID);
                        if($rows): 
                            foreach ($rows as $row) {
                                ?>
                                    <a href="<?php echo $row["ficheiro"] ?>" class="file__container" target="_blank">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/file.png" alt="" class="file__placeholder">
                                        <p class="file__description"><?php echo $row["name"] ?></p>
                                    </a>
                                <?php 
                            }
                        else :
                            ?>
                                <h1>Ainda não há elementos disponiveis.</h1>
                            <?php
                        endif; 
                    ?>
                </div>

            </div>

            <div class="final__container" id="final">
                <h1 class="container__header final__header">Aqui pode consultar os ficheiros finais do seu projecto</h1>
                <div class="files__grid final__files">
            
                    <?php 
                        $rows = get_field("final_files", "user_" . $current_user->ID);
                        if($rows): 
                            foreach ($rows as $row) {
                                ?>
                                    <a href="<?php echo $row["ficheiro"] ?>" class="file__container" target="_blank">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/file.png" alt="" class="file__placeholder">
                                        <p class="file__description"><?php echo $row["nome_do_ficheiro"] ?></p>
                                    </a>
                                <?php 
                            }
                        else :
                            ?>
                                <h1>Ainda não há ficheiros finais disponiveis.</h1>
                            <?php
                        endif; 
                    ?>

                </div>
            </div>

        </div>
    </div>
    



<?php
    get_footer();
?>

