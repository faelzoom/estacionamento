<?php
session_start();

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
</head>


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

        });
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

</script>
<body > 

<?php
        include_once ("bloqueio.php");
        include_once ("cabecalho.php");

    ?>
    <div class="row"> 
    <div class="col-2"></div>
    <div class="col-8">
<div class="col form-group"><br><br>
            <h2 class="display-4 text-center">Veiculos Ativos</h2><br><br>

            <div class="container " id="relatorio">
                <div class="col form-group">
                    <div class="row">
                        <div class="col-6 form-group"></div>
                        <div class="col-4 form-group">
                            <form action="../_sistema/_pesquisa/pesquisa_placa.php" method="POST">
                                <input type="text" name="pesquisar" id="pesquisar" class="form-control"
                                    placeholder="Pesquisar a Placa" required>
                        </div>
                        <div class="col-2 form-group">
                            <input type="submit" class="btn alert-primary btn-block" value="Buscar">
                        </div>
                        </form>

                    </div>

                    <div class="col-2 form-group">

                    </div>
                </div>

            </div>
            <table class="container table table-striped table-hover table-bordered alert-light" id="horass">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Entrada</th>
                        <th>Data</th>
                        <th>Valor Hora</th>
                        <th>Total</th>
                        <th>Tempo</th>
                        <th>Finalizar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $resultado = "select * from veiculo order by id_veiculo";
                    $relatorio = mysqli_query($conexao, $resultado);
                    while ($dados = mysqli_fetch_assoc($relatorio)) {
                        echo '<tr>';

                        echo '<td>';
                        echo $dados['id_veiculo'];
                        $cod = $dados['id_veiculo'];

                        echo '</td>';

                        echo '<td>';
                        echo strtoupper($dados['placa']);
                        $placacod = strtoupper($dados['placa']);
                        echo '</td>';

                        echo '<td>';
                        echo strtoupper($dados['modelo']);
                        echo '</td>';

                        echo '<td>';
                        echo $dados['hora_entrada'];
                        $horaentrada = $dados['hora_entrada'];
                        echo '</td>';

                        echo '<td>';
                        $dados['dia_mes'];
                        $data = $dados['dia_mes'];
                        echo $datateste = date("d-m", strtotime($data));
                        echo '</td>';

                        echo '<td>';
                        echo 'R$ ' . $dados['valor_entrada'];
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
                        echo '<form name="form_reloj">';
                        echo '<div class="text-primary fas fa-clock" onload="startTime();" >';
                        echo '<span>'.$horario = " " . $horas . ":" . $minutos .'</span>';
                        echo '</div>';
                        echo '</form>';
                        echo '</td>';


                        echo '<td>';
                        echo '<form action="saida.php" method="post" onsubmit="saindo()">
                                <input type="text" hidden="true" name="enviar" id="enviar" value="' . $cod . '" >
                                <input type="text" hidden="true" name="troco" id="troco" value="0" >
                                <input type="submit" class="btn alert-primary btn-block" name="saida" id="saida"
                                value="Saida">                       
                                </form>';
                        echo '</td>';

                        echo '<td>';
                        echo '<form action="deletar.php" method="post" onsubmit="deletando()">
                                <input type="text" hidden="true" name="enviar1" id="enviar1" value="' . $cod . '" >
                                <input class="btn alert-danger btn-block" type="submit" onclick="myFunction()" value="Deletar" name="del" id="del" >
                                </form>';
                        echo '</td>';

                    //     echo '<td>';
                    //     $aux = '_qrcode/php/qr_img.php?';
                    //     $aux .= 'd='.$cod.'&';
                    //     $aux .= 'e=H&';
                    //     $aux .= 's=2&';
                    //     $aux .= 't=J';
                    // echo '<div id="qrcode" style="float: left; border: 1px solid #000;">
                    //     <img src="'.$aux.'" />
                    // </div>';
                    //     echo '</td>';


                        echo '</tr>';

                    };

                    //  if(@$_GET['go']=='saida'){
                    //     date_default_timezone_set('America/Sao_Paulo');
                    //     $dia_mes=date('Y-m-d ');


                    //  }


                    ?>

                </tbody>
            </table>


        </div>
    </div>
    <div class="col-2"></div>


                    </div><br>
    


        <script src="../js/main.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/popper.min.js" type="text/javascript"></script>


</body>

</html>