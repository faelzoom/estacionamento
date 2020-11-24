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
			

    <script type="text/javascript">
$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('#cep').mask('00000-000');
  $('phone').mask('0000-0000');
  $('#telefone').mask('(00) 0000-0000');
  $('#celular').mask('(00) 00000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('#ie').mask('000.000.000-00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});

    </script>
</head>

<body>

<?php
        include_once ("../bloqueio.php");
        include_once ("cabecalho.php");

    ?>
<div class="" style="margin:-20px 20px 80px 20px;padding:100px;background-color:#fff;border-radius:10px">
        <br>

        <div class="col  form-group">
            <h2 class="display-4 text-center">Cadastre a empresa</h2><br><br>
            <form action="?go=cadastrar" method="POST">
                <div class="row">
                    <div class="col form-group">
                        <label for="">Cnpj</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Cnpj"
                            required maxlength="20">
                    </div>

                    <div class="col-8 form-group">
                        <label for="">Razão Social</label>
                        <input type="text" class="form-control" id="razao" name="razao"
                            placeholder="Razão Social" required>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-8 form-group">
                            <label for="">Nome Fantasia</label>
                            <input type="text" class="form-control" id="fantasia" name="fantasia" placeholder="Nome Fantasia"
                                required>
                        </div>
                        <div class="col form-group">
                            <label for="">Incrição Estadual</label>
                            <input type="text" class="form-control" id="ie" name="ie" placeholder="Incrição Estadual"
                                required>
                        </div>
                    </div>
                
                <div class="row">
                <div class="col form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Digite um E-mail" required>
                    </div>
                    <div class="col form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone"
                            placeholder="(00)00000-0000" required maxlength="15">
                    </div>
                    <div class="col form-group">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular"
                            placeholder="(00)00000-0000" required maxlength="15">
                    </div>
                </div>
                <div class="row">
                <div class="col-9 form-group">
                        <label for="">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite sua Rua"
                            required>
                    </div>
                    <div class="col form-group">
                        <label for="">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Nº"
                            maxlength="6" required>
                    </div>
                </div>
                <div class="row">
                <div class="col form-group">
                        <label for="">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro"
                            placeholder="Bairro" required>
                    </div>
                    <div class="col form-group">
                        <label for="">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                            placeholder="Casa/Apartamento" required>
                    </div>
                </div>
                <div class="row">
                <div class="col form-group">
                        <label for="">Cep</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000"
                        maxlength="10" required>
                    </div>
                    <div class="col form-group">
                        <label for="">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade"
                            placeholder="Cidade" required>
                    </div>
                    <div class="col form-group">
                        <label for="">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado"
                            placeholder="XX" maxlength="2" required>
                    </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col text-center">
                        <input type="submit" value="Alterar" class="btn alert-primary btn-block" >
                    </div>
                    <div class="col text-center">
                        <a href="../"> <input type="button" value="Voltar" class="btn alert-warning btn-block"></a>
                    </div>
                    <div class="col text-center">
                        <a href="cadas_cliente.php"> <input type="reset" value="Cancelar"
                                class="btn alert-danger btn-block"> </a><br><br>
                    </div>
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
            $cnpj=$_POST['cnpj'];
            $razao=$_POST['razao'];
            $ie=$_POST['ie'];
            $fantasia=$_POST['fantasia'];
            $email=$_POST['email'];
            $telefone=$_POST['telefone'];
            $celular=$_POST['celular'];
            $rua=$_POST['rua'];
            $numero=$_POST['numero'];
            $bairro=$_POST['bairro'];
            $complemento=$_POST['complemento'];
            $cep=$_POST['cep'];
            $cidade=$_POST['cidade'];
            $estado=$_POST['estado'];
            $habilitar_login=$_POST['habilitar'];
            date_default_timezone_set('America/Bahia');
            $data= date ('Y-m-d');
            $hora= date ('H:i:s');

    $pesquisa = mysqli_fetch_assoc(mysqli_query($conexao,"select * from estacionamento where
    cnpj= '$cnpj' and
    razao= '$razao' and
    ie='$ie' and
    fantasia='$fantasia' and
    email= '$email' and
    telefone='$telefone' and
    celular='$celular' and
    rua='$rua' and
    numero='$numero' and
    bairro='$bairro' and
    complemento='$complemento' and
    cep='$cep' and
    cidade='$cidade' and
    estado='$estado' and
    data ='$data' and
    hora = '$hora'
        "));

        if($pesquisa == 1){
            echo 'Usuario já Existe!!!';
        }else{

            // UPDATE estacionamento SET `cnpj` = '23.384.932/0001-81', `razao` = 'Rafael Inacioo', `ie` = '000.000.000-01', `fantasia` = 'Clean 1', `email` = 'contato@cleancode.com1', `telefone` = '(19) 99706-32381', `rua` = 'Rua Jose Pedrini1', `numero` = '351', `bairro` = 'Centro1', `complemento` = 'Loja1', `cep` = '13848-0001', `cidade` = 'Mogi Guacu1', `estado` = 'S1', `habilitar_login` = '11' WHERE (`id_empresa` = '1');
            mysqli_query($conexao," update estacionamento set
            cnpj= '$cnpj',
            razao= '$razao',
            ie='$ie',
            fantasia='$fantasia',
            email='$email',
            telefone='$telefone',
            celular='$celular',
            rua='$rua',
            numero='$numero',
            bairro='$bairro',
            complemento='$complemento',
            cep='$cep',
            cidade='$cidade',
            estado='$estado',
            data ='$data',
            hora = '$hora'
            WHERE (`id_empresa` = '1')");
           
            echo "<script>
                    alert('Empresa cadastrada com sucesso');
                       </script>";
                       echo "<meta http-equiv='refresh' content='0, url=empresa.php'>";
        }  
        }
    
    ?>
    



    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/popper.min.js" type="text/javascript"></script>


</body>

</html>