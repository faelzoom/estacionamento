<?php
session_start();
include_once("../conexao.php");


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagamento</title>
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
    $cod1 = $_POST['enviar'];
    $resultado = "select * from veiculo where id_veiculo='$cod1'";
    $relatorio = mysqli_query($conexao, $resultado);
    while ($dados = mysqli_fetch_assoc($relatorio)) {
        echo '<div class="container"><br><br>';
        echo 'PLACA   =  ' . $dados['placa'] . '<br>';
        echo 'MODELO   =  ' . $dados['modelo'] . '<br>';
        echo 'HORA ENTRADA   =  ' . $dados['hora_entrada'] . '<br>';
        echo 'DATA   =  ' . $dados['dia_mes'] . '<br>';
        date_default_timezone_set('America/Bahia');
        $Hora_final = date('H:i:s');
        $H_final = strtotime(date('H:i:s'));
        $H_inicial =  strtotime($dados['hora_entrada']);
        // $valorsaida= strtotime($total)-strtotime($hora);
        $val2 = bcsub($H_final, $H_inicial);
        $total = ($val2 / 3600) * $dados['valor_entrada'];
        echo 'PAGAR R$' . number_format($total, 2, ',', '.') . '<br>';
        echo 'HORA SAIDA   =  ' . $Hora_final . '<br><br>';
        echo '<a href="../" class="btn btn-warning btn-sm" id="botaoSair"> <span class="glyphicon glyphicon-log-out"
                        aria-hidden="true"></span> VOLTAR</a>';
        mysqli_query($conexao, "delete from veiculo where id_veiculo ='$cod1'");
        echo "</div>";
    }

    ?>

    <script src="../../js/popper.min.js" type="text/javascript"></script>
</body>

</html>