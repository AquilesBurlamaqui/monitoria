<?php
$active = 'inicio';
include 'header.php';
?>
                <!--  Home -->
                <div class="col-xs-12 col-sm-10">
                    <div class="jumbotron">
                        <a href="../" title="Quer voltar para <?php echo $company->getName(); ?>?" >
                            <h1><strong><?php echo $company->getName(); ?></strong></h1>
                        </a>
                        <br/>
                        <p>Área administrativa, após logado, acesso total será garantido a todas as configurações ajustáveis do seu site.
                            O menu à esquerda diz respeito à todos os dados manipuláveis no site. Como os serviços, o contato, os links e o sobre da sua empresa.
                        </p>
                        <hr>
                        Início da Sessão:
                        <?php echo date("d/m/Y, H:i", strtotime($user->log)); ?><br/>
                        <hr/>
                        Data de Criação:
                        <?php echo date("d/m/Y", strtotime($user->date_in)); ?><br/>
                        <hr/>
                        <br/>
                    </div>
                </div>
                <!-- // Fim Home -->
                <!-- // Fim Conteudo -->
            </div>
        <!-- // Fim Corpo -->
        </div>
        <!--  Rodape -->
<?php	include 'footer.php';
