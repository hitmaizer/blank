<?php
/* Template Name: User Profile */

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$index = (isset($_GET['id'])) ? $_GET['id'] : "0";



?>

<!-- AQUI VAI O TEU HTML -->
    <nav class="client__nav flex-row">
        <a href="http://maionesedesign.pt" class="log__link">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-nav.png" alt="" class="nav__logo">
        </a>
        <button class="logout__btn" >
            <a href="/wordpress/logout">Sair</a> 
        </button>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/navbar-menu-mob.png" alt="" class="navbar__webmenu">

    </nav>

    <div class="page__wrapper flex-row">
        <div class="page__sidebar flex-col">
            <ul class="sidebar__menu flex-col">
                <div class="top__header">
                    <h1 class="welcome__header">Olá, <?php echo $username ?></h1>
                        <?php 
                            if(have_rows('projeto', "user_" . $current_user->ID)) {
                                $counter = 0;
                                while(have_rows('projeto', "user_" . $current_user->ID)) {
                                    the_row();
                                    $counter++;
                                    $subfield = get_sub_field('nome_do_projeto');
                                    if($counter == $index) {
                                        if($subfield) {
                                            ?>
                                                <h6 class="welcome__header subheader">Projecto: <?php echo $subfield ?></h6>  
                                            <?php
                                        } 
                                    } 
                                }
                            }
                        ?>
                    
                </div>
                <div class="sidebar__top flex-col">
                    <div class="list__item flex-row" id="status_toggle" onclick="statusHandler()">
                        <li  id="processo_btn" class="selected">Processo</li>
                    </div>
                    <div class="list__item flex-row" id="investimento_toggle" onclick="investimentoHandler()">
                        <li  id="investimento_btn">Investimento</li>
                    </div>
                    <div class="list__item flex-row" id="proposta_toggle" onclick="propostaHandler()">
                        <li id="proposta_btn">Proposta</li>
                    </div>
                    <div class="list__item flex-row" id="ficheiros_toggle" onclick="ficheirosHandler()">
                        <li id="ficheiros_btn">Ficheiros</li>
                    </div>
                    <div class="list__item flex-row" id="documentos_toggle" onclick="documentosHandler()">
                        <li id="documentos_btn">Documentos</li>
                    </div>
                    <div class="list__item flex-row" id="financeiro_toggle" onclick="financeiroHandler()">
                        <li id="financeiro_btn">Financeiro</li>
                    </div>
                </div>

                <div class="sidebar__bottom flex-col">
                    <div class="list__item flex-row" id="dados_toggle" onclick="dadosHandler()">
                        <li id="dados_btn">Dados do projeto</li>
                    </div>
                    <div class="list__item flex-row">
                        <a href="/wordpress/user-projects">
                            <li class="projects__btn">Os meus projetos</li>
                        </a>
                    </div>
                    <div class="list__item" id="upload_toggle" onclick="uploadHandler()">
                    
                    <?php 
                                if(have_rows('projeto', "user_" . $current_user->ID)) {
                                    $counter = 0;
                                    while(have_rows('projeto', "user_" . $current_user->ID)) {
                                        the_row();
                                        $counter++;
                                        $subfield = get_sub_field('carregar_ficheiros');
                                        if($counter == $index) {
                                            if($subfield) {
                                                ?>
                                                    <li id="upload_btn">
                                                        <a id="upload_btn" target="_blank" href="<?php echo esc_url( $subfield ); ?>">Carregar Ficheiros</a>
                                                    </li>
                                                <?php
                                            } else {
                                                ?>
                                                    <li class="list__item disabled">Carregar Ficheiros</li>
                                                <?php
                                            }
                                        } 
                                    }
                                }
                            ?>
                    </div>

                    <div class="list__item flex-row" id="downloads_toggle" onclick="downloadsHandler()">
                        
                            <?php 
                                if(have_rows('projeto', "user_" . $current_user->ID)) {
                                    $counter = 0;
                                    while(have_rows('projeto', "user_" . $current_user->ID)) {
                                        the_row();
                                        $counter++;
                                        $subfield = get_sub_field('all_files');
                                        if($counter == $index) {
                                            if($subfield) {
                                                ?>
                                                    <li id="all_btn">
                                                        <a id="all__downloads" href="<?php echo esc_url( $subfield ); ?>">Descarregar todos os ficheiros</a>
                                                    </li>
                                                <?php
                                            } else {
                                                ?>
                                                    <li class="list__item disabled">Descarregar todos os ficheiros</li>
                                                <?php
                                            }
                                        } 
                                    }
                                }
                            ?>
                            
                    </div>
                    <div class="sair__btn">
                        <p class="list__item"> <a href="/wordpress/logout">Sair</a></p>
                    </div>
                </div>
            </ul>
        </div>
        <div class="page__content flex-col">

            <div class="status__container container show" id="status">
                <h1 class="container__header status__header">Processo</h1>
                <div class="barras__grid flex-row">
                    <div class="barra__item bar1">
                    <?php 
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while (have_rows('projeto', "user_" . $current_user->ID)) {
                              the_row();
                              $counter++;
                              $subfield = get_sub_field('status');
                              if ($counter == $index) {
                                switch($subfield) {
                                    case "diagnostico_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/2.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "diagnostico_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/3.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "diagnostico_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_4": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    break;
                                    default : 
                                        ?>
                                    <h1>O seu projecto ainda vai ser iniciado.</h1>
                                    <?php
                                    break;
                                }
                              }
                            }
                          }
                        
                        ?>
                    </div>
                    <div class="barra__item bar2">
                    <?php 
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while (have_rows('projeto', "user_" . $current_user->ID)) {
                              the_row();
                              $counter++;
                              $subfield = get_sub_field('status');
                              if ($counter == $index) {
                                switch($subfield) {
                                    case "diagnostico_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/7.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "diagnostico_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/7.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "diagnostico_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/7.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/8.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/9.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/10.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_4": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/11.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/11.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/11.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/11.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    break;
                                    default : 
                                        ?>
                                    <h1>O seu projecto ainda vai ser iniciado.</h1>
                                    <?php
                                    break;
                                }
                              }
                            }
                          }
                        
                        ?>
                    </div>
                    <div class="barra__item bar3">
                    <?php 
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while (have_rows('projeto', "user_" . $current_user->ID)) {
                              the_row();
                              $counter++;
                              $subfield = get_sub_field('status');
                              if ($counter == $index) {
                                switch($subfield) {
                                    case "diagnostico_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/7.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "diagnostico_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/1.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "diagnostico_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/1.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/1.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/1.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/1.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "criacao_4": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/1.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_1": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/2.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_2": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/3.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "execucao_3": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/4.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    break;
                                    default : 
                                        ?>
                                    <h1>O seu projecto ainda vai ser iniciado.</h1>
                                    <?php
                                    break;
                                }
                              }
                            }
                          }
                        
                        ?>
                    </div>

                </div>
                
                    
                        
                    
                    <div class="grid__bottom flex-row">
                        <div class="bottom__item item--1">
                            <div class="info__top">
                                <h3 class="griditem__title">I - Diagnóstico</h3>
                                <h6 class="griditem__subtitle">A escolha dos condimentos!</h6>
                                <p class="griditem__text">Nesta fase mergulhamos no seu 
                                    universo para compreender objetivos e 
                                    o posicionamento que iremos trabalhar 
                                    no desenvolvimento do objeto.</p>
                            </div>
                            <div class="extra__info">
                                <ul class="info__list">
                                    <li class="list__item--info">Briefing</li>
                                    <li class="list__item--info">Proposta de Investimento</li>
                                    <li class="list__item--info">Fatura 1/2</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bottom__item item--2">
                            <div class="info__top">
                                <h3 class="griditem__title">II - Criação</h3>
                                <h6 class="griditem__subtitle">É o momento da emulsão!</h6>
                                <p class="griditem__text">Vamos definir e estruturar o mais 
                                    importante. São apresentadas as
                                    referências recolhidas e qual o caminho 
                                    a explorar.
                                    Dá-se início ao processo criativo para 
                                    desenvolver o objeto.</p>
                            </div>
                            <div class="extra__info">
                                <ul class="info__list">
                                    <li class="list__item--info">Proposta 1/3</li>
                                    <li class="list__item--info">Proposta 2/3</li>
                                    <li class="list__item--info">Proposta 3/3</li>
                                    <li class="list__item--info">Proposta Final</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bottom__item item--3">
                            <div class="info__top">
                                <h3 class="griditem__title">III - Execução</h3>
                                <h6 class="griditem__subtitle">Condimentamos o seu projeto!</h6>
                                <p class="griditem__text">Para finalizar a receita, é apresentada a 
                                    solução, o caminho e o processo
                                    criativo desenvolvido.</p>
                            </div>
                                <div class="extra__info">
                                    <ul class="info__list">
                                        <li class="list__item--info">Fatura 2/2</li>
                                        <li class="list__item--info">Lançamento / Ficheiros finais</li>
                                        <li class="list__item--info">Fim do Projeto</li>
                                    </ul>
                                </div>
                        </div>
                    </div>

                
            </div>

            <div class="investimento__container container" id="investimento">
                <h1 class="container__header">Investimento</h1>
                <div class="investimento__section">
                    <?php 
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while (have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('investimento');
                                if ($counter == $index) {
                                    if($subfield) {
                                        ?>
                                        <a class="button" href="<?php echo esc_url( $subfield ); ?>" target="_blank">
                                            <p class="file__description">Proposta e investimento</p>
                                        </a>
                                        <?php                             
                                    } else {
                                    ?>
                                    <p class="file__description disabled">Proposta e investimento</p>
                                    <?php
                                    }
                                    
                                } 
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="proposta__container container" id="proposta">
                <h1 class="container__header">Proposta</h1>
                <div class="propostas__container flex-col">
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('proposta');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['proposta_1']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['proposta_1']; ?>" target="_blank">
                                                <p class="file__description">Proposta 1/3</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                                <p class="file__description disabled">Proposta 1/3</p>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                    ?>
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('proposta');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['proposta_2']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['proposta_2']; ?>" target="_blank">
                                                <p class="file__description">Proposta 2/3</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                                <p class="file__description disabled">Proposta 2/3</p> 
                                            <?php
                                        }
                                    } 
                                }
                            }
                        }
                    ?>
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('proposta');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['proposta_3']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['proposta_3']; ?>" target="_blank">
                                                <p class="file__description">Proposta 3/3</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Proposta 3/3</p> 
                                            <?php
                                        }
                                    } 
                                    
                                }
                            }
                        }
                    ?>
                    
                </div>
                <div class="proposta__final">
                <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('proposta');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['proposta_final']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['proposta_final']; ?>" target="_blank">
                                                <p class="file__description">Proposta Final</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                                <p class="file__description disabled">Proposta Final</p>
                                            <?php
                                        }
                                    } 
                                }
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="ficheiros__container" id="ficheiros">
                <h1 class="container__header">Ficheiros</h1>
                <div class="ficheiros__section flex-col">
                    <?php
                            if (have_rows('projeto', "user_" . $current_user->ID)) {
                                $counter = 0;
                                while(have_rows('projeto', "user_" . $current_user->ID)) {
                                    the_row();
                                    $counter++;
                                    $subfield = get_sub_field('ficheiros');
                                    if($counter == $index) {
                                        if($subfield) {
                                            if($subfield['ficheiros_finais']) {
                                                ?>
                                                <a class="button" href="<?php echo $subfield['ficheiros_finais']; ?>" target="_blank">
                                                    <p class="file__description">Finais</p> 
                                                </a>
                                                <?php
                                            } else {
                                                ?>
                                                <p class="file__description disabled">Finais</p> 
                                                <?php
                                            }
                                        }                                         
                                    }
                                }
                            }
                        ?>
                    
                    <?php
                            if (have_rows('projeto', "user_" . $current_user->ID)) {
                                $counter = 0;
                                while(have_rows('projeto', "user_" . $current_user->ID)) {
                                    the_row();
                                    $counter++;
                                    $subfield = get_sub_field('ficheiros');
                                    if($counter == $index) {
                                        if($subfield) {
                                            if($subfield['ficheiros_execucao']) {
                                                ?>
                                                <a class="button" href="<?php echo $subfield['ficheiros_execucao']; ?>" target="_blank">
                                                    <p class="file__description">Execução</p> 
                                                </a>
                                                <?php
                                            } else {
                                                ?>
                                                <p class="file__description disabled">Execução</p> 
                                                <?php
                                            }
                                        }                                         
                                    }
                                }
                            }
                        ?>                    
                </div>
            </div>
            
            <div class="documentos__container" id="documentos">
                <h1 class="container__header">Documentos</h1>
                <div class="documentos__section flex-col">
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('documentos');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['contrato']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['contrato']; ?>" target="_blank">
                                                <p class="file__description">Contrato</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Contrato</p> 
                                            <?php
                                        }
                                    }                                         
                                }
                            }
                        }
                    ?>
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('documentos');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['declaracao']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['declaracao']; ?>" target="_blank">
                                                <p class="file__description">Declaração</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Declaração</p> 
                                            <?php
                                        }
                                    }                                         
                                }
                            }
                        }
                    ?>
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('documentos');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['cedencia_de_direitos']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['cedencia_de_direitos']; ?>" target="_blank">
                                                <p class="file__description">Cedência de direitos de imagem e voz</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Cedência de direitos de imagem e voz</p> 
                                            <?php
                                        }
                                    }                                         
                                }
                            }
                        }
                    ?>                
                </div>
            </div>
            
            <div class="financeiro__container" id="financeiro">
                <h1 class="container__header">Financeiro</h1>
                <div class="financeiro__section flex-col">
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('financeiro');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['fatura_1']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['fatura_1']; ?>" target="_blank">
                                                <p class="file__description">Fatura 1/2</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Fatura 1/2</p> 
                                            <?php
                                        }
                                    }                                         
                                }
                            }
                        }
                    ?>
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('financeiro');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['recibo_1']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['recibo_1']; ?>" target="_blank">
                                                <p class="file__description">Recibo 1/2</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Recibo 1/2</p> 
                                            <?php
                                        }
                                    }                                         
                                }
                            }
                        }
                    ?>
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('financeiro');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['fatura_2']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['fatura_2']; ?>" target="_blank">
                                                <p class="file__description">Fatura 2/2</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Fatura 2/2</p> 
                                            <?php
                                        }
                                    }                                         
                                }
                            }
                        }
                    ?>
                    <?php
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while(have_rows('projeto', "user_" . $current_user->ID)) {
                                the_row();
                                $counter++;
                                $subfield = get_sub_field('financeiro');
                                if($counter == $index) {
                                    if($subfield) {
                                        if($subfield['recibo_2']) {
                                            ?>
                                            <a class="button" href="<?php echo $subfield['recibo_2']; ?>" target="_blank">
                                                <p class="file__description">Recibo 2/2</p> 
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="file__description disabled">Recibo 2/2</p> 
                                            <?php
                                        }
                                    }                                         
                                }
                            }
                        }
                    ?>
                    
                </div>
            </div>

            <div class="dados__container" id="dados">
                <h1 class="container__header">Dados do projeto</h1>
                <div class="dados__block flex-col">
                    <div class="data__grid">
                        <div class="data__section projeto">
                                <h1 class="section__title">Projeto</h1>
                                <?php 
                                    if (have_rows('projeto', "user_" . $current_user->ID)) {
                                    $counter = 0;
                                    while (have_rows('projeto', "user_" . $current_user->ID)) {
                                        the_row();
                                        $counter++;
                                        $subfield = get_sub_field('dados_projeto');
                                        if ($counter == $index) {
                                        ?>
                                            <div class="section__field flex-row">
                                                <h6 class="field__label">Tipologia:</h6>
                                                <p class="field__text"><?php echo $subfield['tipologia_projeto']; ?></p>
                                            </div>
                                            <div class="section__field flex-row">
                                                <h6 class="field__label">Descrição do projeto:</h6>
                                                <p class="field__text"><?php echo $subfield['descricao_projeto']; ?></p>
                                            </div>
                                            <div class="section__field flex-row">
                                                <h6 class="field__label">Link do website:</h6>
                                                <p class="field__text"><?php echo $subfield['link_website_projeto']; ?></p>
                                            </div>
                                            <div class="section__field flex-row">
                                                <h6 class="field__label">Link de redes sociais:</h6>
                                                <p class="field__text"><?php echo $subfield['link_redes_sociais_projeto']; ?></p>
                                            </div>
                                        <?php        
                                        } 
                                    }
                                }
                            ?>
                        </div>
    
                        <div class="data__section representante">
                            <h1 class="section__title">Representante</h1>
                            <?php 
                                if (have_rows('projeto', "user_" . $current_user->ID)) {
                                $counter = 0;
                                while (have_rows('projeto', "user_" . $current_user->ID)) {
                                    the_row();
                                    $counter++;
                                    $subfield = get_sub_field('dados_representante');
                                    if ($counter == $index) {
                                    ?>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Nome:</h6>
                                            <p class="field__text"><?php echo $subfield['nome_representante']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Telemóvel:</h6>
                                            <p class="field__text"><?php echo $subfield['telemovel_representante']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Endereço eletrónico:</h6>
                                            <p class="field__text"><?php echo $subfield['endereco_eletronico_representante']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Data de nascimento:</h6>
                                            <p class="field__text"><?php echo $subfield['data_de_nascimento_representante']; ?></p>
                                        </div>
                                    <?php        
                                    } 
                                }
                            }
                        ?>
                        </div>
    
                        <div class="data__section empresa">
                        <h1 class="section__title">Empresa</h1>
                        <?php 
                            if (have_rows('projeto', "user_" . $current_user->ID)) {
                                $counter = 0;
                                while (have_rows('projeto', "user_" . $current_user->ID)) {
                                    the_row();
                                    $counter++;
                                    $subfield = get_sub_field('dados_empresa');
                                    if ($counter == $index) {
                                        ?>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Nome:</h6>
                                            <p class="field__text"><?php echo $subfield['nome_empresa']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Morada:</h6>
                                            <p class="field__text"><?php echo $subfield['morada_empresa']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Código Postal:</h6>
                                            <p class="field__text"><?php echo $subfield['codigo_postal_empresa']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Localidade:</h6>
                                            <p class="field__text"><?php echo $subfield['localidade_empresa']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Endereço eletrónico:</h6>
                                            <p class="field__text"><?php echo $subfield['endereco_eletronico_empresa']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Data de fundação:</h6>
                                            <p class="field__text"><?php echo $subfield['data_de_fundacao_empresa']; ?></p>
                                        </div>
                                    <?php
                                    } 
                                }
                            }
                        ?>
    
                        </div>
                        
                        
                        <div class="data__section faturacao">
                            <h1 class="section__title">Faturação</h1>
                            <?php 
                                if (have_rows('projeto', "user_" . $current_user->ID)) {
                                $counter = 0;
                                while (have_rows('projeto', "user_" . $current_user->ID)) {
                                    the_row();
                                    $counter++;
                                    $subfield = get_sub_field('dados_faturacao');
                                    if ($counter == $index) {
                                    ?>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Nome:</h6>
                                            <p class="field__text"><?php echo $subfield['nome_faturacao']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Morada:</h6>
                                            <p class="field__text"><?php echo $subfield['morada_faturacao']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Código Postal:</h6>
                                            <p class="field__text"><?php echo $subfield['codigo_postal_faturacao']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Localidade:</h6>
                                            <p class="field__text"><?php echo $subfield['localidade_faturacao']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">NIF/NIPC:</h6>
                                            <p class="field__text"><?php echo $subfield['nifnipc_faturacao']; ?></p>
                                        </div>
                                        <div class="section__field flex-row">
                                            <h6 class="field__label">Endereço eletrónico:</h6>
                                            <p class="field__text"><?php echo $subfield['endereco_eletronico_faturacao']; ?></p>
                                        </div>
                                    <?php        
                                    } 
                                }
                            }
                        ?>
                        </div>
                        
                    </div>
                    <p class="field__text footer__dados">Para atualização dos dados contactar <a id="mailto__dados" href="mailto:geral@maionesedesign.pt">geral@maionesedesign.pt</a></p>
                </div>
            </div>
            
            

        </div>
    </div>
    <div class="bottom__client flex-row">
        <div class="footer__section flex-col">
            <a href="http://maionesedesign.pt" class="footer__link">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.png" alt="" class="footer__logo">
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
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/instagram.png" alt="" class="social__icon">
                </a>
                <a href="https://www.linkedin.com/company/maionesedesign/" class="social__link" target="_blank">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/linkedin.png" alt="" class="social__icon">
                </a>
                <a href="https://www.behance.net/maionesedesign" class="social__link" target="_blank">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/behance.png" alt="" class="social__icon">
                </a>
                <a href="https://www.youtube.com/channel/UCmZ2AHM-8yFck9zDqTQ6b7A" class="social__link" target="_blank">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/youtube.png" alt="" class="social__icon">              
                </a>
            </div>
        </div>
    </div>
    <script>
        function statusHandler() {
  const statusToggle = document.getElementById("status_toggle");
  const statusDiv = document.getElementById("status");
  const groupElements = document.querySelectorAll(".show");
  const actualBtn = document.getElementById("processo_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });
  if (statusToggle.classList.contains("show")) {
    statusToggle.classList.remove("show");
  } else {
    groupElements.forEach((e) => {
      if (e.classList.contains("show")) {
        e.classList.remove("show");
      }
    });
    statusDiv.classList.add("show");
  }
  nav.classList.remove("nav__active");
}

function investimentoHandler() {
  const propostaToggle = document.getElementById("investimento_toggle");
  const propostaDiv = document.getElementById("investimento");
  const groupElements = document.querySelectorAll(".show");
  const actualBtn = document.getElementById("investimento_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });

  if (propostaToggle.classList.contains("show")) {
    propostaToggle.classList.remove("show");
  } else {
    groupElements.forEach((e) => {
      if (e.classList.contains("show")) {
        e.classList.remove("show");
      }
    });
    propostaDiv.classList.add("show");
    propostaToggle.classList.add("selected");
  }
  nav.classList.remove("nav__active");
}

function propostaHandler() {
  const orcamentoToggle = document.getElementById("proposta_toggle");
  const orcamentoDiv = document.getElementById("proposta");
  const groupElements = document.querySelectorAll(".show");
  const actualBtn = document.getElementById("proposta_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });

  if (orcamentoToggle.classList.contains("show")) {
    orcamentoToggle.classList.remove("show");
  } else {
    groupElements.forEach((e) => {
      if (e.classList.contains("show")) {
        e.classList.remove("show");
      }
    });
    orcamentoDiv.classList.add("show");
  }
  nav.classList.remove("nav__active");
}

function ficheirosHandler() {
  const fase1Toggle = document.getElementById("ficheiros_toggle");
  const fase1Div = document.getElementById("ficheiros");
  const groupElements = document.querySelectorAll(".show");
  const actualBtn = document.getElementById("ficheiros_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });

  if (fase1Toggle.classList.contains("show")) {
    fase1Toggle.classList.remove("show");
  } else {
    groupElements.forEach((e) => {
      if (e.classList.contains("show")) {
        e.classList.remove("show");
      }
    });
    fase1Div.classList.add("show");
  }
  nav.classList.remove("nav__active");
}

function documentosHandler() {
  const fase2Toggle = document.getElementById("documentos_toggle");
  const fase2Div = document.getElementById("documentos");
  const groupElements = document.querySelectorAll(".show");
  const actualBtn = document.getElementById("documentos_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });

  if (fase2Toggle.classList.contains("show")) {
    fase2Toggle.classList.remove("show");
  } else {
    groupElements.forEach((e) => {
      if (e.classList.contains("show")) {
        e.classList.remove("show");
      }
    });
    fase2Div.classList.add("show");
  }
  nav.classList.remove("nav__active");
}

function financeiroHandler() {
  const fase3Toggle = document.getElementById("financeiro_toggle");
  const fase3Div = document.getElementById("financeiro");
  const groupElements = document.querySelectorAll(".show");
  const actualBtn = document.getElementById("financeiro_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });

  if (fase3Toggle.classList.contains("show")) {
    fase3Toggle.classList.remove("show");
  } else {
    groupElements.forEach((e) => {
      if (e.classList.contains("show")) {
        e.classList.remove("show");
      }
    });
    fase3Div.classList.add("show");
  }
  nav.classList.remove("nav__active");
}

function dadosHandler() {
  const finalToggle = document.getElementById("dados_toggle");
  const finalDiv = document.getElementById("dados");
  const groupElements = document.querySelectorAll(".show");
  const actualBtn = document.getElementById("dados_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });

  if (finalToggle.classList.contains("show")) {
    finalToggle.classList.remove("show");
  } else {
    groupElements.forEach((e) => {
      if (e.classList.contains("show")) {
        e.classList.remove("show");
      }
    });
    finalDiv.classList.add("show");
  }
  nav.classList.remove("nav__active");
}

function uploadHandler() {
  const actualBtn = document.getElementById("upload_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });
  nav.classList.remove("nav__active");
}

function downloadsHandler() {
  const actualBtn = document.getElementById("all_btn");
  const previousBtn = document.querySelectorAll(".selected");
  const nav = document.querySelector(".nav__active");

  actualBtn.classList.add("selected");
  previousBtn.forEach((e) => {
    if (e.classList.contains("selected")) {
      e.classList.remove("selected");
    }
  });
  nav.classList.remove("nav__active");
}

function openMobMenu() {
  const burger = document.querySelector(".navbar__webmenu");
  const slider = document.querySelector(".page__sidebar");

  burger.addEventListener("click", () => {
    slider.classList.toggle("nav__active");
  });
}

openMobMenu();

    </script>


<?php
    get_footer();
?>

