<?php
session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Paga e Imprimir</title>
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
    include_once("../bloqueio.php");
    include("txt.class.php");
    $cod = $_POST['enviar'];

    ?>
    <?php


    $cod1 = $_POST['enviar'];
    $troco = $_POST['troco'];
    $resultado = "select * from veiculo where id_veiculo='$cod1'";
    $relatorio = mysqli_query($conexao, $resultado);
    while ($dados = mysqli_fetch_assoc($relatorio)) {

        '<div class="container"><br><br>';
        '<br>PLACA   =  ' . $placas = strtoupper($placa = $_POST = $dados['placa']);
        '<br>MODELO   =  ' . $modelos = strtoupper($modelo = $_POST = $dados['modelo']);
        '<br>';
        date("d-m-Y", strtotime($datas = $_POST = $dados['dia_mes']));
        $datas = $_POST = $dados['dia_mes'];
        $data = $dados['dia_mes'];
        'DATA   =  ' . $dataCerta = date("d-m-Y", strtotime($datas));
        '<br>HORA ENTRADA   =  ' . $horaEntrada = $_POST = $dados['hora_entrada'];

        $valorentrada = $horaEntrada;
        $valorentrada = $dados['valor_entrada'];

        date_default_timezone_set('America/Bahia');
        $horaSaida = $_POST = $Hora_final = date('H:i:s');
        $H_final = strtotime(date('H:i:s'));
        $H_inicial =  strtotime($dados['hora_entrada']);
        $val2 = bcsub($H_final, $H_inicial);
        $total = ($val2 / 3600) * $dados['valor_entrada'];
        $horas = floor($val2 / 3600);
        $minutos = floor(($val2 - ($horas * 3600)) / 60);
        '<br>HORA SAIDA   =  ' . $Hora_final . '<br>';
        'TEMPO DE PERMANENCIA   =  ' . $permanencia = $_POST = $horario = $horas . ":" . $minutos;

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

        '<br>R$ ' . $totals = number_format($total, 2, ',', '.');
        '<br>R$ ' . $trocos = number_format($troco, 2, ',', '.');
        $devolver = $troco - $total;
        '<br><div class="text-danger">R$ ' . $devolvers = number_format($devolver, 2, ',', '.');

        '<a href="../" class="btn btn-warning btn-sm" id="botaoSair"> <span class="glyphicon glyphicon-log-out"
                        aria-hidden="true"></span> VOLTAR</a>';
        mysqli_query($conexao, "insert into pagamentos(placa,modelo,datas,horaEntrada,horaSaida,permanencia,total,recebido,devolver)values('$placa','$modelo','$datas','$horaEntrada','$horaSaida','$permanencia','$total','$troco','$devolver')");
        "</div>";


        $impressoraPorta = "select * from impressora";
        $portaAdds = mysqli_query($conexao, $impressoraPorta);
        while ($dados = mysqli_fetch_assoc($portaAdds)) {
            $escolhaPorta= $dados['porta'];
            $escolhaVelocidade= $dados['velocidade'];
        }
       
        //dual_envia_txt.php
       
        //recebo as informações e coloco elas em variáveis que vou utilizar:
        $porta = $escolhaPorta;
        $velocidade = $escolhaVelocidade;
        
        $modo = 'normal';
        //Crio um objeto da classe Envia_Txt
        $txt = new Txt();
        $porta_ok = $txt->seta_porta($porta, $velocidade);
        usleep(20);
        /* Declarando as Variáveis para comandos diretos: */
        $Ni = chr(27) . chr(69);
        $Nf = chr(27) . chr(70);
        $Dai = chr(27) . chr(119) . '1';
        $Daf = chr(27) . chr(119) . '0';
        $Ci = chr(15);
        $Cf = chr(18);
        $Ei = chr(14);
        $Ef = chr(20);
        $Si = chr(27) . chr(45) . '1';
        $Sf = chr(27) . chr(45) . '0';
        /*Negrito*/
        if ($modo == "negrito")
            $placa = $Ni . $placa . $Nf;
        /*Sublinhado*/
        if ($modo == "sublinhado")
            $placa = $Si . $placa . $Sf;
        /*Condensado*/
        if ($modo == "condensado")
            $placa = $Ci . $placa . $Cf;
        /*Expandido*/
        if ($modo == "expandido")
            $placa = $Ei . $placa . $Ef;
        /*Dupla Altura*/
        if ($modo == "dupla_altura")
            $placa = $Dai . $placa . $Daf;
        // Para o modo normal, vai imprimir o texto que recebeu, sem nenhuma alteração nele.
        $retorno = 0;
        usleep(2000);
    }
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
    }
    $retorno = $txt->envia_txt(
        "\r\n" . "\r\n"
            . '                 ESTABELECIMENTO          ' .
            "\r\n" . '-              ' . $Ni . $fantasia . $Nf . '              -' . "\r\n" . "\r\n"
            . '          CNPJ  : ' . $cnpj . "\r\n"
            . '          RAZAO SOCIAL  : ' . $razao . "\r\n"
            . '          IE : ' . $ie . "\r\n"
            . '          EMAIL  : ' . $email . "\r\n"
            . '          TELEFONE  : ' . $telefone . "\r\n"
            . '  ----------------------------------------------' . "\r\n"
            . '     Placa Veiculo  : ' . $placas . "\r\n"
            . '     Modelo Veiculo : ' . $modelos . "\r\n"
            . '     Data : ' . $dataCerta . "\r\n"
            . '     Hora Entrada : ' . $horaEntrada . "\r\n"
            . '     Hora Saida : ' . $Hora_final . "\r\n"
            . '     Permanencia : ' . $permanencia . "\r\n"
            . '     Total : R$' . $totals . "\r\n"
            . '     Recebido : R$' . $trocos . "\r\n"
            . '     Troco : R$' . $devolvers . "\r\n"
            . '  ----------------------------------------------' . "\r\n"
            . '     Rua: ' . $rua . ' N: ' . $numero . "\r\n"
            . '     Bairro: ' . $bairro . '  Cep: ' . $cep . "\r\n"
            . '     Cidade: ' . $cidade . ' UF: ' . $estado . "\r\n" . "\r\n" . "\r\n" . "\r\n"
            . '  -------------Obrigado e volte sempre------------'
            . "\r\n" . "\r\n" . "\r\n" . "\r\n" . "\r\n"


    );
    mysqli_query($conexao, "delete from veiculo where id_veiculo ='$cod1'");
    echo "<meta http-equiv='refresh' content='0, url=../'>";


    ?>




    <script src="../../js/popper.min.js" type="text/javascript"></script>
</body>

</html>