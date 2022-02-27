<?php
/* Template Name: User Profile */

get_header();
$username = wp_get_current_user()->user_firstname;
$current_user = wp_get_current_user();
$index = (isset($_GET['id'])) ? $_GET['id'] : "0";



?>

<!-- AQUI VAI O TEU HTML -->

    <div class="page__wrapper flex-row">
        <div class="page__sidebar flex-col">
            <ul class="sidebar__menu flex-col">
                <h1 class="welcome__header">Olá, <?php echo $username ?></h1>
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
                        <li id="dados_btn">Os meus dados</li>
                    </div>
                    <div class="list__item flex-row" id="downloads_toggle" onclick="downloadsHandler()">
                        <li id="all_btn">Descarregar todos os ficheiros</li>
                    </div>
                </div>
            </ul>
        </div>
        <div class="page__content flex-col">

            

            <div class="status__container container show" id="status">
                <h1 class="container__header status__header">Processo</h1>
                <div class="process__grid">
                    <div class="grid__topimg">
                        <?php 
                        if (have_rows('projeto', "user_" . $current_user->ID)) {
                            $counter = 0;
                            while (have_rows('projeto', "user_" . $current_user->ID)) {
                              the_row();
                              $counter++;
                              $subfield = get_sub_field('status');
                              if ($counter == $index) {
                                switch($subfield) {
                                    case "standart": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/status1.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "processo": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/status2.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "investimento": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/status3.png" alt="" class="status__img">
                                    <?php
                                    break;
                                    case "final": 
                                        ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/progressbar.png" alt="" class="status__img">
                                    <?php
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
                    <div class="grid__bottom flex-row">
                        <div class="bottom__item item--1">
                            <h3 class="griditem__title">I - Diagnóstico</h3>
                            <h6 class="griditem__subtitle">A escolha dos condimentos!</h6>
                            <p class="griditem__text">Nesta fase mergulhamos no seu 
                                universo para compreender objetivos e 
                                o posicionamento que iremos trabalhar 
                                no desenvolvimento do objeto.</p>
                        </div>
                        <div class="bottom__item item--2">
                            <h3 class="griditem__title">II - Criação</h3>
                            <h6 class="griditem__subtitle">É o momento da emulsão!</h6>
                            <p class="griditem__text">Vamos definir e estruturar o mais 
                                importante. São apresentadas as
                                referências recolhidas e qual o caminho 
                                a explorar.
                                Dá-se início ao processo criativo para 
                                desenvolver o objeto.</p>
                        </div>
                        <div class="bottom__item item--3">
                            <h3 class="griditem__title">III - Execução</h3>
                            <h6 class="griditem__subtitle">Condimentamos o seu projeto!</h6>
                            <p class="griditem__text">Para finalizar a receita, é apresentada a 
                                solução, o caminho e o processo
                                criativo desenvolvido.</p>
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
                        $proposta = get_field('proposta', 'user_' . $current_user->ID);
                        if( !empty($proposta['proposta_1']) ): ?>
                            <a class="button" href="<?php echo $proposta['proposta_1']; ?>" target="_blank">
                                <p class="file__description">Proposta 1/3</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Proposta 1/3</p> 
                        <?php
                            endif;
                        ?>
                    <?php 
                        $proposta = get_field('proposta', 'user_' . $current_user->ID);
                        if( !empty($proposta['proposta_2']) ): ?>
                            <a class="button" href="<?php echo $proposta['proposta_2']; ?>" target="_blank">
                                <p class="file__description">Proposta 2/3</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Proposta 2/3</p>  
                        <?php
                            endif;
                        ?>
                    <?php 
                        $proposta = get_field('proposta', 'user_' . $current_user->ID);
                        if( !empty($proposta['proposta_3']) ): ?>
                            <a class="button" href="<?php echo $proposta['proposta_3']; ?>" target="_blank">
                                <p class="file__description">Proposta 3/3</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Proposta 3/3</p>  
                        <?php
                            endif;
                        ?>
                </div>
                <div class="proposta__final">
                    <?php 
                        $proposta = get_field('proposta', 'user_' . $current_user->ID);
                        if( !empty($proposta['proposta_final']) ): ?>
                            <a class="button" href="<?php echo $proposta['proposta_final']; ?>" target="_blank">
                                <p class="file__description">Proposta Final</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Proposta Final</p>  
                        <?php
                            endif;
                        ?>
                </div>
            </div>

            <div class="ficheiros__container" id="ficheiros">
                <h1 class="container__header">Ficheiros</h1>
                <div class="ficheiros__section flex-col">
                    <?php 
                        $ficheiros = get_field('ficheiros', 'user_' . $current_user->ID);
                        if( !empty($ficheiros['ficheiros_finais']) ): ?>
                            <a class="button" href="<?php echo $ficheiros['ficheiros_finais']; ?>" target="_blank">
                                <p class="file__description">Finais</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Finais</p>  
                        <?php
                            endif;
                        ?>
                    <?php 
                        $ficheiros = get_field('ficheiros', 'user_' . $current_user->ID);
                        if( !empty($ficheiros['ficheiros_execucao']) ): ?>
                            <a class="button" href="<?php echo $ficheiros['ficheiros_execucao']; ?>" target="_blank">
                                <p class="file__description">Em execução</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Em execução</p>  
                        <?php
                            endif;
                        ?>
                </div>
            </div>
            
            <div class="documentos__container" id="documentos">
                <h1 class="container__header">Documentos</h1>
                <div class="documentos__section flex-col">
                <?php 
                    $documentos = get_field('documentos', 'user_' . $current_user->ID);
                    if( !empty($documentos['contrato']) ): ?>
                        <a class="button" href="<?php echo $documentos['contrato']; ?>" target="_blank">
                            <p class="file__description">Contrato</p> 
                        </a>
                    <?php else: ?>
                        <p class="file__description disabled">Contrato</p>  
                    <?php
                        endif;
                    ?>
                <?php 
                    $documentos = get_field('documentos', 'user_' . $current_user->ID);
                    if( !empty($documentos['declaracao']) ): ?>
                        <a class="button" href="<?php echo $documentos['declaracao']; ?>" target="_blank">
                            <p class="file__description">Declaração</p> 
                        </a>
                    <?php else: ?>
                        <p class="file__description disabled">Declaração</p>  
                    <?php
                        endif;
                    ?>
                <?php 
                    $documentos = get_field('documentos', 'user_' . $current_user->ID);
                    if( !empty($documentos['cedencia_de_direitos']) ): ?>
                        <a class="button" href="<?php echo $documentos['cedencia_de_direitos']; ?>" target="_blank">
                            <p class="file__description">Cedência de direitos de imagem e voz</p> 
                        </a>
                    <?php else: ?>
                        <p class="file__description disabled">Cedência de direitos de imagem e voz</p>  
                    <?php
                        endif;
                    ?>
                </div>
            </div>
            
            <div class="financeiro__container" id="financeiro">
                <h1 class="container__header">Financeiro</h1>
                <div class="financeiro__section flex-col">
                    <?php 
                        $financeiro = get_field('financeiro', 'user_' . $current_user->ID);
                        if( !empty($financeiro['fatura_1']) ): ?>
                            <a class="button" href="<?php echo $financeiro['fatura_1']; ?>" target="_blank">
                                <p class="file__description">Fatura 1/2</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Fatura 1/2</p>  
                    <?php
                        endif;
                    ?>
                    <?php 
                        $financeiro = get_field('financeiro', 'user_' . $current_user->ID);
                        if( !empty($financeiro['recibo_1']) ): ?>
                            <a class="button" href="<?php echo $financeiro['recibo_1']; ?>" target="_blank">
                                <p class="file__description">Recibo 1/2</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Recibo 1/2</p>  
                    <?php
                        endif;
                    ?>
                    <?php 
                        $financeiro = get_field('financeiro', 'user_' . $current_user->ID);
                        if( !empty($financeiro['fatura_2']) ): ?>
                            <a class="button" href="<?php echo $financeiro['fatura_2']; ?>" target="_blank">
                                <p class="file__description">Fatura 2/2</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Fatura 2/2</p>  
                    <?php
                        endif;
                    ?>
                    <?php 
                        $financeiro = get_field('financeiro', 'user_' . $current_user->ID);
                        if( !empty($financeiro['recibo_2']) ): ?>
                            <a class="button" href="<?php echo $financeiro['recibo_2']; ?>" target="_blank">
                                <p class="file__description">Recibo 2/2</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Recibo 2/2</p>  
                    <?php
                        endif;
                    ?>
                </div>
            </div>

            <div class="dados__container" id="dados">
                <h1 class="container__header">Os meus dados</h1>
                <div class="data__grid">
                    <div class="data__section empresa">
                    <h1 class="section__title">Dados da Empresa</h1>
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
                        <h1 class="section__title">Dados da Faturação</h1>

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
                    <div class="data__section representante">
                        <h1 class="section__title">Dados do Representante</h1>
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
                    <div class="data__section projeto">
                        <h1 class="section__title">Dados do Projeto</h1>
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
                </div>
            </div>
            
            <div class="downloads__container" id="downloads">
                <h1 class="container__header">Ficheiros</h1>
                <div class="results__section flex-col">
                <?php 
                        $ficheiros = get_field('all_files', 'user_' . $current_user->ID);
                        if( !empty($ficheiros['finais']) ): ?>
                            <a class="button" href="<?php echo $ficheiros['finais']; ?>" target="_blank">
                                <p class="file__description">Finais</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Finais</p>  
                    <?php
                        endif;
                    ?>
                <?php 
                        $ficheiros = get_field('all_files', 'user_' . $current_user->ID);
                        if( !empty($ficheiros['execucao']) ): ?>
                            <a class="button" href="<?php echo $ficheiros['execucao']; ?>" target="_blank">
                                <p class="file__description">Execução</p> 
                            </a>
                        <?php else: ?>
                            <p class="file__description disabled">Execução</p>  
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

