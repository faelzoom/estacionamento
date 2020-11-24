<header>
    <div class="row">
        <div class="col"><br>
            <img src="../../imagens/logo.png" alt="logotipo" class="img-center img-fluid" width="400px">
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
        <a href='../index.php' class='btn alert-primary btn-lg' id='botaoSair'>
                <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>ENTRADA DE VEICULO
                </a>
                <a href='../ativo.php' class='btn alert-primary btn-lg' id='botaoSair'>
                <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>SAÍDA DE VEICULO
                </a>
            <a href='../_cadastro/cadastro_cliente.php' class='btn alert-primary btn-lg' id='botaoSair'>
                <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>CADASTRAR
                CLIENTE</a>
                <button type="button" id="botaoSair" class="btn alert-primary btn-lg" data-toggle="modal"
                data-target=".bd-imprimir-modal-lg">IMPRIMIR</button>
            <button type="button" id="botaoSair" class="btn alert-primary btn-lg" data-toggle="modal"
                data-target=".bd-example-modal-lg">RELATÓRIOS</button>
            <button type="button" id="botaoSair" class="btn alert-primary btn-lg" data-toggle="modal"
                data-target=".bd-ganhos-modal-lg">EXTRATO</button>
            <button type="button" id="botaoSair" class="btn alert-primary btn-lg" data-toggle="modal"
                data-target=".bd-config-modal-lg">CONFIGURAÇÕES</button>
                <!-- Modal imprimir -->
            <div class="modal fade bd-imprimir-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="modal-header ">
                                    <div class="row">
                                        <div class="col-3">
                                            <span>2 VIA</span>
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                            <img src="../../imagens/estacionamento1.png" alt="logotipo"
                                                class="img-center img-fluid rounded float-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a href='../_imprimir/entrada.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out'
                                                aria-hidden='true'></span>ENTRADA</a>
                                        <a href='../_imprimir/saida.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out'
                                                aria-hidden='true'></span>SAÍDA</a>
                                    </div>
                                    <div class="col-12">
                                    </div>
                                </div><br>
                                <div class="modal-footer">
                                    <a href="" class="btn alert-danger btn-sm" name="" id="" data-dismiss="modal"> <span
                                            class="glyphicon glyphicon-log-out" aria-hidden="true"></span>FECHAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <!-- Modal RELATÓRIOS -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="modal-header ">
                                    <div class="row">
                                        <div class="col-3">
                                            <span>RELATÓRIOS</span>
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                            <img src="../../imagens/estacionamento1.png" alt="logotipo"
                                                class="img-center img-fluid rounded float-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><a href='../_relatoriocliente/nome.php'
                                            class='btn alert-primary btn-lg' id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>CLIENTE
                                            POR NOME</a>
                                        <a href='../_relatoriocliente/data.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>CLIENTE
                                            POR DATA</a>
                                        <a href='../_relatoriocliente/mes.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>CLIENTE
                                            POR MES</a>
                                        <a href='../_relatoriocliente/geral.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>CLIENTE
                                            GERAL</a>
                                    </div>
                                </div><br>
                                <div class="modal-footer">
                                    <a href="" class="btn alert-danger btn-sm" name="" id="" data-dismiss="modal"> <span
                                            class="glyphicon glyphicon-log-out" aria-hidden="true"></span>FECHAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <!-- Modal EXTRATO -->
            <div class="modal fade bd-ganhos-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="modal-header ">
                                    <div class="row">
                                        <div class="col-3">
                                            <span>EXTRATO</span>
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                            <img src="../../imagens/estacionamento1.png" alt="logotipo"
                                                class="img-center img-fluid rounded float-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><a href='../_relatorioextrato/placa.php'
                                            class='btn alert-primary btn-lg' id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>EXTRATO
                                            POR PLACA</a>
                                        <a href='../_relatorioextrato/data.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>EXTRATO
                                            POR DATA</a>
                                        <a href='../_relatorioextrato/mes.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>EXTRATO
                                            POR MES</a>
                                        <a href='../_relatorioextrato/geral.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>EXTRATO
                                            GERAL</a>
                                    </div>
                                    <div class="col-12">
                                    </div>

                                </div><br>
                                <div class="modal-footer">
                                    <a href="" class="btn alert-danger btn-sm" name="" id="" data-dismiss="modal"> <span
                                            class="glyphicon glyphicon-log-out" aria-hidden="true"></span>FECHAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <!-- Modal CONFIG -->
            <div class="modal fade bd-config-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="modal-header ">
                                    <div class="row">
                                        <div class="col-3">
                                            <span>CONFIGURAÇÕES</span>
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                            <img src="../../imagens/estacionamento1.png" alt="logotipo"
                                                class="img-center img-fluid rounded float-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a href='../_empresa/impressora.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out'
                                                aria-hidden='true'></span>IMPRESSORA</a>
                                        <a href='../_empresa/empresa.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out'
                                                aria-hidden='true'></span>EMPRESA</a>
                                        <a href='../_empresa/usuario.php' class='btn alert-primary btn-lg'
                                            id='botaoSair'>
                                            <span class='glyphicon glyphicon-log-out'
                                                aria-hidden='true'></span>USUARIO</a>
                                    </div>
                                    <div class="col-12">
                                    </div>
                                </div><br>
                                <div class="modal-footer">
                                    <a href="" class="btn alert-danger btn-sm" name="" id="" data-dismiss="modal"> <span
                                            class="glyphicon glyphicon-log-out" aria-hidden="true"></span>FECHAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <a href='../sair.php' class='btn alert-danger btn-sm' id='botaoSair'> <span class='glyphicon glyphicon-log-out'
                    aria-hidden='true'></span> SAIR</a>
        </div>
    </div>
</header>