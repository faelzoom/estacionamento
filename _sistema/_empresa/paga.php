<?php
        session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pagar</title>
    <link rel="stylesheet" href="../css/meuEstilo.css" type="text/css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css.map" type="text/css">
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <?php
        include_once ("../bloqueio.php");
        $cod=$_POST['enviar'];

    ?>


<?php

 

                    $cod1=$_POST['enviar'];
                    $troco=$_POST['troco'];
                    $resultado="select * from veiculo where id_veiculo='$cod1'";
                    $relatorio=mysqli_query($conexao,$resultado);
                    while($dados=mysqli_fetch_assoc($relatorio)){

                        '<div class="container"><br><br>';
                         'PLACA   =  '.strtoupper($placa=$_POST = $dados ['placa']);
                         'MODELO   =  '.strtoupper($modelo=$_POST = $dados ['modelo']);
                         $datas=$_POST = $dados ['dia_mes'];
                         'DATA   =  '. date("d-m-Y",strtotime($data)).'<br>';
                         'HORA ENTRADA   =  '.$horaEntrada=$_POST = $dados ['hora_entrada'].'<br>';
                         date_default_timezone_set('America/Bahia');
                         $horaSaida=$_POST = $Hora_final= date('H:i:s');
                         $H_final= strtotime(date('H:i:s'));
                         $H_inicial=  strtotime($dados['hora_entrada']);
                         $val2=bcsub($H_final,$H_inicial);
                         $total =($val2/3600)*$dados['valor_entrada'];
                         $horas = floor($val2 / 3600);
                         $minutos = floor(($val2 - ($horas * 3600)) / 60);
 
                         'HORA SAIDA   =  '.$Hora_final.'<br>';
                         'TEMPO DE PERMANENCIA   =  '.$permanencia=$_POST = $horario = $horas . ":" . $minutos .'<br>';
 
                         if ($val2 >= 0 && $val2 < 900) { // a partir 1:15 minutos 3600=1hora     900=15minutos 
                             if($valorentrada == 4){
                                 $total = 3.00;
                             }else if($valorentrada == 3){
                                 $total = 1.50;
                             }else{
                                 $total = 20.00;
                             }
                         } else {
                             if ($val2 >= 900 && $val2 < 4500) { // a partir 1:15 minutos 3600=1hora     900=15minutos
                                 if($valorentrada == 4){
                                     $total = 4.00;
                                 }else if($valorentrada == 3){
                                     $total = 3.00;
                                 }else{
                                     $total = 20.00;
                                 }
                             } else if ($val2 >= 4500 && $val2 < 8100) { // a partir 2:15 minutos
                                 if($valorentrada == 4){
                                     $total = 8.00;
                                 }else if($valorentrada == 3){
                                     $total = 6.00;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             } else if ($val2 >= 8100 && $val2 < 11700) { // a partir 3:15 minutos
                                 if($valorentrada == 4){
                                     $total = 12.00;
                                 }else if($valorentrada == 3){
                                     $total = 9.00;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             } else if ($val2 >= 11700 && $val2 < 15300) { // 4:15 minutos
                                 if($valorentrada == 4){
                                     $total = 16.00;
                                 }else if($valorentrada == 3){
                                     $total = 12.0;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             } else if ($val2 >= 15300 && $val2 < 18900) { // 5:15 minutos
                                 if($valorentrada == 4){
                                     $total = 20.00;
                                 }else if($valorentrada == 3){
                                     $total = 15.00;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             } else if ($val2 >= 18900 && $val2 < 22500) { // 6:15 minutos
                                 if($valorentrada == 4){
                                     $total = 24.00;
                                 }else if($valorentrada == 3){
                                     $total = 18.00;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             } else if ($val2 >= 22500 && $val2 < 26100) { // 7:15 minutos
                                 if($valorentrada == 4){
                                     $total = 28.00;
                                 }else if($valorentrada == 3){
                                     $total = 21.00;
                                 }else{
                                     $total = 20.00;
                                 }
                             } else if ($val2 >= 26100 && $val2 < 29700) { // 8:15 minutos
                                 if($valorentrada == 4){
                                     $total = 32.00;
                                 }else if($valorentrada == 3){
                                     $total = 24.00;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             } else if ($val2 >= 29700 && $val2 < 33300) { // 9:15 minutos
                                 if($valorentrada == 4){
                                     $total = 36.00;
                                 }else if($valorentrada == 3){
                                     $total = 27.00;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             } else if ($val2 >= 33300 && $val2 < 36900) { // 10:15 minutos
                                 if($valorentrada == 4){
                                     $total = 4.00;
                                 }else if($valorentrada == 3){
                                     $total = 30.00;
                                 }else{
                                     $total = 20.00;
                                 }
                                 
                             }
                         }
                         $devolver=$troco-$total;
                         'TOTAL R$' . number_format($total, 2, ',', '.').'<br>';
                         '<br>RECEBIDO R$' . number_format($troco, 2, ',', '.').'<br>';
                         'TROCO R$ ' .number_format($devolver,2, ',', '.'). '<br>';

                        '<a href="../" class="btn btn-warning btn-sm" id="botaoSair"> <span class="glyphicon glyphicon-log-out"
                        aria-hidden="true"></span> VOLTAR</a>';

                        

                        mysqli_query($conexao,"insert into pagamentos(
                            placa,
                            modelo,
                            datas,
                            horaEntrada,
                            horaSaida,
                            permanencia,
                            total,
                            troco,
                            devolver
                            )values(
                            '$placa',
                            '$modelo',
                            '$datas',
                            '$horaEntrada',
                            '$horaSaida',
                            '$permanencia',
                            '$total',
                            '$troco',
                            '$devolver'
                            )");
            

                        mysqli_query($conexao,"delete from veiculo where id_veiculo ='$cod1'");

                        "</div>";

                        echo "<script>
                        function paga(){
                            $.notify({
                    // options
                    message: 'Pagamento efetuado com successo!' 
                },{
                    // settings
                    type: 'danger',
                    delay: 5000
                });
                        }</script>";

                            echo "<meta http-equiv='refresh' content='0, url=../'>";
                        }


?>

                                


<script src="../../js/popper.min.js" type="text/javascript"></script>
</body>
</html>
