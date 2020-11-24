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
    <link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css.map" type="text/css">
			

    <script type="text/javascript">
    $("#cpf_cnpj").blur(function(event){
				if ($(this).val().length == 14){
					$("#cpf_cnpj").mask("000.000.000-00")
				}else{
					$("#cpf_cnpj").mask("00.000.000/0000-00")
				}
			})


    $('#cep').mask('00000-000')

    $("#telefone").blur(function(event){
				if ($(this).val().length == 15){
					$("#telefone").mask("(00) 0000-0009")
				}else{
					$("#telefone").mask("(00) 0000-00009")
				}
			})
            $("#celular").blur(function(event){
				if ($(this).val().length == 15){
					$("#telefone").mask("(00) 00000-0009")
				}else{
					$("#telefone").mask("(00) 0000-00009")
				}
			})

    </script>
</head>

<body>

<?php
        include_once ("../bloqueio.php");
        include_once ("cabecalho.php");

    ?>
<div class="" style="margin:-20px 20px 80px 0px;padding:100px;background-color:#fff;border-radius:10px">
        <div class="col  form-group">
            <h2 class="display-4 text-center">Cadastro de Cliente</h2><br><br>
            <form action="?go=cadastrar" method="POST">
                <div class="row">
                    <div class="col-4 form-group">
                        <label for="">Cpf / Cnpj</label>
                        <input type="text" class="form-control" id="cpf _cnpj" name="cpf_cnpj" placeholder="Cpf ou Cnpj"
                            required maxlength="20">
                    </div>

                    <div class="col form-group">
                        <label for="">Nome Completo / Razão Social</label>
                        <input type="text" class="form-control" id="nome_razao" name="nome_razao"
                            placeholder="Nome Completo ou Razão Social" required>
                    </div>
                        <div class="col-2 form-group">
                            <label for="">Rg / Ie</label>
                            <input type="text" class="form-control" id="rg_ie" name="rg_ie" placeholder="RG ou Incrição Estadual" required>
                        </div>
                </div>
                <div class="row">
                <div class="col-8 form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Digite um E-mail" required>
                    </div>
                    <div class="col form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone"
                            placeholder="(00)0000-0000" required maxlength="15">
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
                    <div class="col-2 form-group">
                        <label for="">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado"
                            placeholder="XX" maxlength="2" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col text-center">
                        <input type="submit" value="Cadastrar" class="btn alert-primary btn-block" >
                    </div>
                    <div class="col text-center">
                        <a href="../"> <input type="button" value="Voltar" class="btn alert-warning btn-block"></a>
                    </div>
                    <div class="col text-center">
                        <a href="cadas_cliente.php"> <input type="reset" value="Limpar"
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
            $cnpj=$_POST['cpf_cnpj'];
            $razao=$_POST['nome_razao'];
            $ie=$_POST['rg_ie'];
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
            date_default_timezone_set('America/Bahia');
            $data= date ('Y-m-d');
            $hora= date ('H:i:s');
            mysqli_query($conexao,"insert into cliente(
                cpf_cnpj,
                nome_razao,
                rg_ie,
                email,
                telefone,
                celular,
                rua,
                numero,
                bairro,
                complemento,
                cep,
                cidade,
                estado,
                data,
                hora
                )
                values(
                    '$cnpj',
                    '$razao',
                    '$ie',
                    '$email',
                    '$telefone',
                    '$celular',
                    '$rua',
                    '$numero',
                    '$bairro',
                    '$complemento',
                    '$cep',
                    '$cidade',
                    '$estado',
                    '$data',               
                    '$hora'                
                    )");
            echo "<script>
                alert('Usuário cadastrado com sucesso');
                </script>";

                echo "<meta http-equiv='refresh' content='0, url=cadastro_cliente.php'>";

        }
    
    
    ?>
    



    <script src="../../js/jquery.min.js" type="text/javascript"></script>
    <script src="../../js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src="../../js/popper.min.js" type="text/javascript"></script>


</body>

</html>