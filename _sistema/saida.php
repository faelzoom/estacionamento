<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Saída de veículo</title>
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
    function add() {
        $.notify({
            // options
            message: 'Troco adicionado com successo!'
        }, {
            // settings
            type: 'success',
            delay: 3000
        });
    }

    function paga() {
        $.notify({
            // options
            message: 'Pagamento efetuado com successo!'
        }, {
            // settings
            type: 'success',
            delay: 5000
        });
    }

    function imprimir() {
        $.notify({
            // options
            message: 'Pagamento efetuado com succesos - aguarde a impressão!'
        }, {
            // settings
            type: 'success',
            delay: 5000
        });
    }

    $('#ajax').submit(function() {
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function(retorno) {
            alert(retorno);
        });
        return false;
    });

    $(document).ready(function() {

        $('#troco').mask('000.000.000.000.000.00', {
            reverse: true
        });

    })
    </script>



</head>

<body>
    <?php
    include_once("bloqueio.php");
    include_once("cabecalho.php");
    $cod = $_POST['enviar'];
    $troco = $_POST['troco'];

    ?>

    <div class="" style="margin:-20px 20px 80px 20px;padding:100px;background-color:#fff;border-radius:10px">
        <div class="row">
            <div class="center-block">
                <div class="col form-group">
                    <h2 class="display-4 text-center">Saída de veículo</h2><br>
                    <table class="table table-striped table-hover table-bordered alert-light">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Placa</th>
                                <th>Modelo</th>
                                <th>Entrada</th>
                                <th>Data Saída </th>
                                <th>Valor Hora</th>
                                <th>Total</th>
                                <th>Tempo</th>
                                <th>Recebido</th>
                                <th>Finalizar</th>
                            </tr>
                        </thead>


                        <?php
                        $resultado = "select * from veiculo where id_veiculo='$cod'";
                        $relatorio = mysqli_query($conexao, $resultado);
                        while ($dados = mysqli_fetch_assoc($relatorio)) {

                            echo '<tbody>';
                            echo '<tr>';

                            echo '<td>';
                            echo $dados['id_veiculo'];
                            $cod1 = $dados['id_veiculo'];
                            echo '</td>';

                            echo '<td>';
                            echo strtoupper($dados['placa']);
                            echo '</td>';

                            echo '<td>';
                            echo strtoupper($dados['modelo']);
                            echo '</td>';

                            echo '<td>';
                            echo $dados['hora_entrada'];
                            echo '</td>';


                            echo '<td>';
                            $dados['dia_mes'];
                            $data = $dados['dia_mes'];
                            echo date("d-m", strtotime($data));
                            echo '</td>';

                            echo '<td>';
                            echo '<div> R$ ' . $dados['valor_entrada'] . '</div>';
                            $valorentrada = $dados['valor_entrada'];
                            echo '</td>';



                            echo '<td>';
                            date_default_timezone_set('America/Bahia');
                            $H_final = strtotime(date('H:i:s'));
                            $H_inicial =  strtotime($dados['hora_entrada']);
                            // $valorsaida= strtotime($total)-strtotime($hora);
                            $val2 = bcsub($H_final, $H_inicial);
                            $total = ($val2 / 3600) * $dados['valor_entrada'];
                            $horas = floor($val2 / 3600);
                            $minutos = floor(($val2 - ($horas * 3600)) / 60);
                            $segundos = floor($val2 % 60);

                            if ($val2 >= 0 && $val2 < 900) { // a partir 1:15 minutos 3600=1hora     900=15minutos 
                                if ($valorentrada == 4) {
                                    $total = 3.00;
                                    echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                } else if ($valorentrada == 3) {
                                    $total = 1.50;
                                    echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                } else if ($valorentrada == 20){
                                    $total = 20.00;
                                    echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                }else if ($valorentrada == 15){
                                    $total = 15.00;
                                    echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                }
                            } else {
                                if ($val2 >= 900 && $val2 < 4500) { // a partir 1:15 minutos 3600=1hora     900=15minutos
                                    if ($valorentrada == 4) {
                                        $total = 4.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 3.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 4500 && $val2 < 8100) { // a partir 2:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 8.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 6.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 8100 && $val2 < 11700) { // a partir 3:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 12.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 9.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 11700 && $val2 < 15300) { // 4:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 16.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 12.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 15300 && $val2 < 18900) { // 5:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 20.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 15.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 18900 && $val2 < 22500) { // 6:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 24.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 18.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 22500 && $val2 < 26100) { // 7:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 28.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 21.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 26100 && $val2 < 29700) { // 8:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 32.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 24.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 29700 && $val2 < 33300) { // 9:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 36.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 27.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 33300 && $val2 < 36900) { // 10:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 40.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 30.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                }else if ($val2 >= 36900 && $val2 < 9999999) { // deletar
                                    if ($valorentrada == 4) {                                
                                        mysqli_query($conexao, "delete from veiculo where id_veiculo ='$cod'");
                                    } else if ($valorentrada == 3) {
                                        mysqli_query($conexao, "delete from veiculo where id_veiculo ='$cod'");
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                }
                            };

                            echo ' R$ ' . number_format($total, 2, ',', '.');
                            echo '</td>';

                            echo '<td>';
                            echo '<div class="text-primary fas fa-clock">';
                            echo $horario = " " . $horas . ":" . $minutos;
                            echo '</div>';
                            echo '</td>';

                            echo '<td>';

                            echo '<form id="ajax_form" action="" method="post" ">
                            <input type="text" hidden="true" name="enviar" id="enviar" value="' . $cod . '" >
                            <input type="text" class="text-center col-10" name="troco" id="troco" placeholder="Valor Recebido" required>
                            <input type="submit" class="alert-default btn-md fas fa-plus"  value="&#xf067;" >';
                            if ($troco < $total && $troco > '0') {
                                echo '<div class="alert alert-danger" id="recebimento" role="alert  data-dismiss="alert" aria-label="Close">
                            O valor digitado é menor que o total R$' . number_format($total, 2, ',', '.') . '
                            </div>';
                            } else {
                                echo '<span class="text-success" id="mostrar">';
                                echo '<br>'.' R$ ' . number_format($troco, 2, ',', '.');
                                echo '</span>';
                            }

                            echo '</td>';

                            echo '<td>';
                            echo '<button type="button" class="btn alert-primary btn-block btn-sm " name="pagamento" id="pagamento"
                            data-toggle="modal" data-target="#modelId">Pagar</button>';
                            echo '</form>';
                            echo '</td>';

                            echo '</tr>';
                            echo '</tbody>';
                        }
                        ?>

                    </table>
                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <p>
                                <a href="./ativo.php" class="btn alert-warning float-right ">‹--Voltar</a>
                            </p>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <img src="../imagens/estacionamento1.png" alt="logotipo"
                                class="img-center img-fluid rounded float-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="modal-title">ESTACIONAMENTO</h5>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-2">
                            <img src="../imagens/estacionamento1.png" alt="logotipo"
                                class="img-center img-fluid rounded float-right">
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover table-bordered alert-light">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Modelo</th>
                                <th>Hora Saída</th>
                                <th>Total</th>
                                <th>Recebido</th>
                                <th class="alert-danger">Troco</th>
                            </tr>
                        </thead>
                        <?php
                        $cod1 = $_POST['enviar'];
                        $troco = $_POST['troco'];
                        if($troco < $total){
                            echo '<div class="alert alert-danger" id="recebimento" role="alert  data-dismiss="alert" aria-label="Close">
                            O valor digitado é menor que o total R$' . number_format($total, 2, ',', '.') . '
                          </div><br>';
                        }else{
                        $resultado = "select * from veiculo where id_veiculo='$cod1'";
                        $relatorio = mysqli_query($conexao, $resultado);
                        while ($dados = mysqli_fetch_assoc($relatorio)) {

                            date_default_timezone_set('America/Bahia');
                            $Hora_final = date('H:i:s');
                            $H_final = strtotime(date('H:i:s'));
                            $H_inicial =  strtotime($dados['hora_entrada']);
                            // $valorsaida= strtotime($total)-strtotime($hora);
                            $val2 = bcsub($H_final, $H_inicial);
                            $total = ($val2 / 3600) * $dados['valor_entrada'];

                            echo '<tbody>';
                            echo '<tr>';

                            echo '<td>';
                            echo strtoupper($dados['placa']);
                            echo '</td>';

                            echo '<td>';
                            echo strtoupper($dados['modelo']);
                            echo '</td>';

                            '<td >';
                            $dados['hora_entrada'];
                            '</td>';

                            '<td>';
                            $dados['dia_mes'];
                            '</td>';

                            '<td>';
                            'R$ ' . $dados['valor_entrada'];
                            $valorentrada = $dados['valor_entrada'];
                            '</td>';

                            echo '<td>';
                            echo $Hora_final;
                            echo '</td>';

                            echo '<td>';
                            if ($val2 >= 0 && $val2 < 900) { // a partir 1:15 minutos 3600=1hora     900=15minutos 
                                if ($valorentrada == 4) {
                                    $total = 3.00;
                                    echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                } else if ($valorentrada == 3) {
                                    $total = 1.50;
                                    echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                } else if ($valorentrada == 20){
                                    $total = 20.00;
                                    echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                }else if ($valorentrada == 15){
                                    $total = 15.00;
                                    echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                }
                            } else {
                                if ($val2 >= 900 && $val2 < 4500) { // a partir 1:15 minutos 3600=1hora     900=15minutos
                                    if ($valorentrada == 4) {
                                        $total = 4.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 3.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 4500 && $val2 < 8100) { // a partir 2:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 8.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 6.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 8100 && $val2 < 11700) { // a partir 3:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 12.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 9.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 11700 && $val2 < 15300) { // 4:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 16.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 12.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 15300 && $val2 < 18900) { // 5:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 20.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 15.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 18900 && $val2 < 22500) { // 6:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 24.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 18.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 22500 && $val2 < 26100) { // 7:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 28.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 21.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 26100 && $val2 < 29700) { // 8:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 32.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 24.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 29700 && $val2 < 33300) { // 9:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 36.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 27.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                } else if ($val2 >= 33300 && $val2 < 36900) { // 10:15 minutos
                                    if ($valorentrada == 4) {
                                        $total = 40.00;
                                        echo '<i class="text-center text-success fa-1x fas fa-car"></i>';
                                    } else if ($valorentrada == 3) {
                                        $total = 30.00;
                                        echo '<i class="text-center text-success fas fa-motorcycle"></i>';
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                }else if ($val2 >= 36900 && $val2 < 9999999) { // deletar
                                    if ($valorentrada == 4) {                                
                                        mysqli_query($conexao, "delete from veiculo where id_veiculo ='$cod'");
                                    } else if ($valorentrada == 3) {
                                        mysqli_query($conexao, "delete from veiculo where id_veiculo ='$cod'");
                                    } else if ($valorentrada == 20){
                                        $total = 20.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }else if ($valorentrada == 15){
                                        $total = 15.00;
                                        echo  '<i class="text-center text-success fa-1x fas fa-calendar-day"></i>';
                                    }
                                }
                            };
                            echo 'R$ ' . number_format($total, 2, ',', '.');
                            echo '</td>';

                            echo '<td>';
                            echo 'R$ ' . number_format($troco, 2, ',', '.');
                            $devolver = $troco - $total;
                            echo '</td>';

                            echo '<td>';
                            echo '<span  class="text-center text-danger">'.number_format($devolver, 2, ',', '.').'</span>';
                            echo '</td>';

                            echo '</tr>';
                            echo '</tbody>';
                        }
                    
                        ?>
                    </table>
                        
                    <?php
                    echo '<div class="col modal-footer">
                    <form action="../_sistema/_pagamento/paga.php" method="post" onsubmit="paga()">
                        <input type="text" hidden="true" name="enviar" id="enviar" value="' . $cod . '" >
                        <input type="text" hidden="true" name="troco" id="troco" value="' . $troco . '" >
                        <input type="text" hidden="true" name="devolver" id="devolver" value="' . $devolver . '">
                        <label for="">Cartão</label>
                        <input type="submit" class="btn alert-success btn-sm fa fa-credit-card" name="pagamento" id="pagamento"
                        value="&#xf09d;">                  
                        </form>
                    </div>';
                        echo '<div class="col modal-footer">
                        <form action="../_sistema/_pagamento/paga.php" method="post" onsubmit="paga()">
                            <input type="text" hidden="true" name="enviar" id="enviar" value="' . $cod . '" >
                            <input type="text" hidden="true" name="troco" id="troco" value="' . $troco . '" >
                            <input type="text" hidden="true" name="devolver" id="devolver" value="' . $devolver . '">
                            <label for="">Dinheiro</label>
                            <input type="submit" class="btn alert-success btn-sm far fa-money-bill-alt" name="pagamento" id="pagamento"
                            value="&#xf3d1;">                  
                            </form>
                        </div>';
                        echo '<div class="col modal-footer">
                        <form action="../_sistema/_pagamento/paga_imprimir.php" method="post" onclick="imprimir()">
                            <input type="text" hidden="true" name="enviar" id="enviar" value="' . $cod . '" >
                            <input type="text" hidden="true" name="troco" id="troco" value="' . $troco . '" >
                            <input type="text" hidden="true" name="devolver" id="devolver" value="' . $devolver . '" >
                            <label for="">Dinheiro e Imprimir</label>
                            <input type="submit" class="btn alert-primary btn-sm fa fa-print" name="pagar" id="pagar"
                            value="&#xf02f;">                    
                            </form>
                        </div>';
                        echo '<div class="col modal-footer">
                        <form action="../_sistema/_pagamento/paga_imprimir.php" method="post" onclick="imprimir()">
                            <input type="text" hidden="true" name="enviar" id="enviar" value="' . $cod . '" >
                            <input type="text" hidden="true" name="troco" id="troco" value="' . $troco . '" >
                            <input type="text" hidden="true" name="devolver" id="devolver" value="' . $devolver . '" >
                            <label for="">Cartão e Imprimir</label>
                            <input type="submit" class="btn alert-primary btn-sm fa fa-print" name="pagar" id="pagar"
                            value="&#xf02f;">                    
                            </form>
                        </div>';
                        echo '<div class="col modal-footer">
                            <a href="" class="btn alert-danger btn-sm" name="" id="" data-dismiss="modal"><span
                                    class="glyphicon glyphicon-log-out" aria-hidden="true"></span>FECHAR</a>
                        </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>




    <script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
    $('.alert').alert()
    </script>


        <script src="../js/main.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/popper.min.js" type="text/javascript"></script>


</body>

</html>