<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel Banco de dados</title>
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


<body>
    <?php
    include_once("bloqueio.php");
    $cod = $_POST['enviar1'];

    ?>

    <?php
    $cod1 = $_POST['enviar1'];
    $resultado = "select * from veiculo where id_veiculo='$cod'";
    $relatorio = mysqli_query($conexao, $resultado);

    mysqli_query($conexao, "delete from veiculo where id_veiculo ='$cod1'");

    echo "<meta http-equiv='refresh' content='0, url=ativo.php'>";

    ?>

    <script src="../../js/popper.min.js" type="text/javascript"></script>
</body>

</html>