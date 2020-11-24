<?php
session_start();
if (!isset($_SESSION["func"]) and !isset($_SESSION["pwd"])) {
    header("Location: ../index.php");
    exit;
}
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Entrada de veículo</title>
    <link rel="stylesheet" href="../css/meuEstilo.css" type="text/css">
    <link rel="stylesheet" href="../css/meuEstilo1.css" type="text/css">
    <link rel="stylesheet" href="../css/radioBOTAO.css" type="text/css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var options = {
                translation: {
                    'A': {
                        pattern: /[A-Z]/
                    },
                    'a': {
                        pattern: /[a-zA-Z]/
                    },
                    'S': {
                        pattern: /[a-zA-Z0-9]/
                    },
                    'L': {
                        pattern: /[a-z]/
                    },
                }
            }

            $("#placa").mask("aaa-0000", options)

        })
        $(document).ready(function() {

            var options = {
                translation: {
                    'A': {
                        pattern: /[A-Z]/
                    },
                    'a': {
                        pattern: /[a-zA-Z]/
                    },
                    'S': {
                        pattern: /[a-zA-Z0-9]/
                    },
                    'L': {
                        pattern: /[a-z]/
                    },
                }
            }

            $("#pesquisar").mask("aaa-0000", options)
            $('.money').mask('000.000.000.000.000,00', {
                reverse: true
            });

        });

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function mueveReloj() {

        };
    </script>


</head>


<body>
    <?php
    include_once("bloqueio.php");
    include_once("cabecalho.php");
    include("_pagamento/txt.class.php");

    ?>

    <div class="" style="margin:-20px 20px 80px 20px;padding:100px;background-color:#fff;border-radius:10px">
        <div class="row">
            <div class="container center-block">
                <h1 class="text-center">Dados Véiculo</h1>
                <form method="POST" onsubmit="confirmacao()" action="?go=cadastrar">
                    <div class="row">
                        <div class="col-4 form-group"></div>
                        <div class="col form-group">
                            <label for="formulario">Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa" placeholder="ABC-1020" maxlength="8" required>
                        </div>
                        <div class="col-4 form-group"></div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group"></div>
                        <div class="col form-group">
                            <label for="">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="FUSCA" maxlength="20" required>
                        </div>
                        <div class="col-4 form-group"></div>
                    </div><br>

                    <div class="row ">
                        <div class="col-2"></div>
                        <div class="col-8 form-group">
                            <div class="row">
                                <div class="col">
                                    <ul class="payment-methods text-center text-justify">
                                        <li class="container payment-method pagseguro">
                                            <input name="payment_methods" type="radio" id="pagseguro" value="on">
                                            <label for="pagseguro">Moto</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="payment-methods text-center text-justify">
                                        <li class="container payment-method paypal">
                                            <input name="payment_methods" type="radio" id="paypal" value="off" checked>
                                            <label for="paypal">Carro</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="payment-methods text-center text-justify">
                                        <li class="container payment-method moto">
                                            <input name="payment_methods" type="radio" id="moto" value="moto">
                                            <label for="moto">Diario</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="payment-methods text-center text-justify">
                                        <li class="container payment-method bankslip">
                                            <input name="payment_methods" type="radio" id="bankslip" value="carro">
                                            <label for="bankslip">Diario</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div><br>

                    <div class="row form-group">
                        <div class="col-3 text-center"></div>
                        <div class="col-3 text-center">
                            <input type="submit" class="btn alert-primary btn-lg" name="cadastrar" id="cadastrar" value="Cadastrar">
                        </div>
                        <div class="col-3 text-center">
                            <a href="cadas_cliente.php"> <input type="reset" value="Cancelar" class="btn alert-danger btn-lg"></a><br><br>
                        </div>
                        <div class="col-3 text-center"></div>
                    </div><br>
                </form>
            </div><br>
        </div>
        <?php
        if (@$_GET['go'] == 'cadastrar') {
            date_default_timezone_set('America/Bahia');
            $placa = $_POST['placa'];
            $placas = strtoupper($placa);
            $modelo = $_POST['modelo'];
            $modelos = strtoupper($modelo);
            $dia_mes = date('Y-m-d ');
            $dataCerta = date("d-m-Y", strtotime($dia_mes));
            $hora_entrada = date('H:i:s');
            $veiculo = $_POST['payment_methods'];

            if ($veiculo == "on") { // ativo ON E OFF SE REFERE NO HTML 
                $veiculo = "MOTO"; // AI FAZ A CONVERSÃO 1 PARA ATIVO PARA O BANCO DE DADOS LER TIPO TINYINT(1)
                $valor_entrada = "3";
                $moto = $valor_entrada;
                $carro = 0;
                $diario = 0;
            } elseif ($veiculo == "off") {
                $veiculo = "CARRO"; // FAZ 0 PARA O BANCO DE DADOS LER
                $valor_entrada = "4";
                $moto = 0;
                $carro = $valor_entrada;
                $diario = 0;
            } else if ($veiculo == "carro") {
                $veiculo = "DIARIO"; // FAZ 0 PARA O BANCO DE DADOS LER
                $valor_entrada = "20";
                $moto = 0;
                $carro = 0;
                $diario = $valor_entrada;
            } else if ($veiculo == "moto") {
                $veiculo = "DIARIO"; // FAZ 0 PARA O BANCO DE DADOS LER
                $valor_entrada = "15";
                $moto = 0;
                $carro = 0;
                $diario = $valor_entrada;
            };


            $impressoraPorta = "select * from impressora";
            $portaAdds = mysqli_query($conexao, $impressoraPorta);
            while ($dados = mysqli_fetch_assoc($portaAdds)) {
                $escolhaPorta = $dados['porta'];
                $escolhaVelocidade = $dados['velocidade'];
            };

            //dual_envia_txt.php

            //recebo as informações e coloco elas em variáveis que vou utilizar:
            $porta = $escolhaPorta;
            $velocidade = $escolhaVelocidade;

            $modo = 'normal';
            //Crio um objeto da classe Envia_Txt
            $txt = new Txt();
            $porta_ok = $txt->seta_porta($porta, $velocidade);
            usleep(20);
            usleep(2000);

            $resultado1 = "SELECT * FROM estacionamento";
            $relatorio1 = mysqli_query($conexao, $resultado1);
            while ($dados = mysqli_fetch_assoc($relatorio1)) {
                $cnpj = $_POST = $dados['cnpj'];
                $razao = $_POST = $dados['razao'];
                $ie = $_POST = $dados['ie'];
                $fantasia = $_POST = $dados['fantasia'];
                $email = $_POST = $dados['email'];
                $telefone = $_POST = $dados['telefone'];
                $rua = $_POST = $dados['rua'];
                $numero = $_POST = $dados['numero'];
                $bairro = $_POST = $dados['bairro'];
                $complemento = $_POST = $dados['complemento'];
                $cep = $_POST = $dados['cep'];
                $cidade = $_POST = $dados['cidade'];
                $estado = $_POST = $dados['estado'];
            };
            $resultado2 = "select * from veiculo order by id_veiculo";
            $relatorio2 = mysqli_query($conexao, $resultado2);
            while ($dados = mysqli_fetch_assoc($relatorio2)) {
                $cod = $dados['id_veiculo'];
            };
            $retorno = $txt->envia_txt(
                "\r\n" . "\r\n"
                    . '                 ESTABELECIMENTO          ' .
                    "\r\n" . '-              ' . $fantasia . '              -' . "\r\n" . "\r\n"
                    . '          CNPJ  : ' . $cnpj . "\r\n"
                    . '          RAZAO SOCIAL  : ' . $razao . "\r\n"
                    . '          IE : ' . $ie . "\r\n"
                    . '          EMAIL  : ' . $email . "\r\n"
                    . '          TELEFONE  : ' . $telefone . "\r\n"
                    . '  ----------------------------------------------' . "\r\n"
                    . '     Placa Veiculo  : ' . $placas . "\r\n"
                    . '     Modelo Veiculo : ' . $modelos . "\r\n"
                    . '     Data : ' . $dataCerta . "\r\n"
                    . '     Hora Entrada : ' . $hora_entrada . "\r\n"
                    . '     Tipo : ' . $veiculo . "\r\n"
                    . '  ----------------------------------------------' . "\r\n"
                    . '     Rua: ' . $rua . ' N: ' . $numero . "\r\n"
                    . '     Bairro: ' . $bairro . '  Cep: ' . $cep . "\r\n"
                    . '     Cidade: ' . $cidade . ' UF: ' . $estado . "\r\n" . "\r\n" . "\r\n" . "\r\n"
                    . '  -------------Obrigado e volte sempre------------'
                    . "\r\n" . "\r\n" . "\r\n" . "\r\n" . "\r\n"

            );

            mysqli_query($conexao, "insert into veiculo(placa,modelo,hora_entrada,dia_mes,moto,carro,diario,valor_entrada)values('$placa','$modelo','$hora_entrada','$dia_mes','$moto','$carro','$diario','$valor_entrada')");
            mysqli_query($conexao, "insert into veiculo_historico(placa,modelo,hora_entrada,dia_mes,moto,carro,diario,valor_entrada)values('$placa','$modelo','$hora_entrada','$dia_mes','$moto','$carro','$diario','$valor_entrada')");

            echo "<meta http-equiv='refresh' content='0, url=ativo.php'>";
        };
        ?>
        </tbody>
        </table>


    </div> <br>


    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/popper.min.js" type="text/javascript"></script>



</body>

</html>