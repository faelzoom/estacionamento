<?php
        session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="../../css/meuEstilo.css" type="text/css">
    <link rel="stylesheet" href="../../css/meuEstilo1.css" type="text/css">
    <link rel="stylesheet" href="../../css/radioBOTAO.css" type="text/css">
    <link rel="shortcut icon" href="../../../imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <script src="../../js/main.js" type="text/javascript"></script>
    <script src="../../js/jquery.min.js" type="text/javascript"></script>
    <script src="../../js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="../../js/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<?php


include_once("../conexao.php");
include ("config.php");
include ("cabecalho.php");
?>

<div class="" style="margin:-20px 20px 80px 20px;padding:100px;background-color:#fff;border-radius:10px">
    <br>

    <div class="col  form-group">
        <h2 class="display-4 text-center">Configurar Impressora</h2><br><br>
        <form action="?go=cadastrar" method="POST">
            <div class="row">
                <div class="col form-group">
                </div>
                <div class="col form-group">
                    <label for="">PORTA</label>
                    <select class="form-control" name="porta" id="porta">
                        <option value="com1" selected>COM1</option>
                        <option value="com2">COM2</option>
                        <option value="com3">COM3</option>
                        <option value="com4">COM4</option>
                        <option value="com5">COM5</option>
                        <option value="com6">COM6</option>
                        <option value="com7">COM7</option>
                        <option value="com8">COM8</option>
                        <option value="com9">COM9</option>
                        <option value="com10">COM10</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="">Velocidade</label>
                    <select class="form-control" name="velocidade" id="velocidade">
                        <option value="9600" selected>9600</option>
                        <option value="38400">38400</option>
                        <option value="115200">115200</option>
                    </select>
                </div>
                <div class="col form-group">

                </div>
            </div>
    </div>
    <div class="row">
    <div class="col-3 text-center"></div>
        <div class="col-3 text-center">
            <input type="submit" value="Cadastrar" class="btn alert-success btn-block">
        </div>
        <div class="col-3 text-center">
            <a href="../index.php"> <input type="button" value="Voltar" class="btn alert-warning btn-block">
            </a>
        </div>
        <div class="col-3 text-center"></div>
    </div>
    </form>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
            <img src="../../imagens/estacionamento1.png" alt="logotipo"
                class="img-center img-fluid rounded float-right">
        </div>
    </div>
</div>
</div>
<?php
if(@$_GET['go']=='cadastrar'){
date_default_timezone_set('America/Bahia');
$porta=$_POST['porta'];
$velocidade=$_POST['velocidade'];
$data= date ('Y-m-d');
$hora= date ('H:i:s');

$pesquisa = mysqli_fetch_assoc(mysqli_query($conexao,"select * from impressora where porta='$porta' and velocidade='$velocidade'"));

if($pesquisa == 1){
    echo 'Usuario já Existe!!!';
}else{
    mysqli_query($conexao," update  impressora set porta ='$porta', velocidade ='$velocidade' , datatroca ='$data', horario='$hora'  WHERE (`id_porta` = '1')");
   
    echo "<script>
            alert('Configuração cadastrada com sucesso');
               </script>";
               echo "<meta http-equiv='refresh' content='0, url=impressora.php'>";
}  
}          

?>
<footer>
    <div>

    </div>
</footer>


<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../js/popper.min.js" type="text/javascript"></script>


</body>

</html>