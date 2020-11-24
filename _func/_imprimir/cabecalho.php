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
           
            <a href='../sair.php' class='btn alert-danger btn-sm' id='botaoSair'> <span class='glyphicon glyphicon-log-out'
                    aria-hidden='true'></span> SAIR</a>
        </div>
    </div>
</header>