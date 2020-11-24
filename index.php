<?php
    include_once("./_sistema/conexao.php");  
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel Estacionamento</title>
    <link rel="stylesheet" href="css/meuEstilo.css" type="text/css">
    <link rel="stylesheet" href="css/meuEstilo1.css" type="text/css">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>

</head>

<body>
    <div class="container" style="margin-top:150px;padding:20px;border-radius:10px;background:linear-gradient(#cce5ffe6,rgba(124, 212, 9, 0.45));background-size: cover;background-image: center;text-align: center;padding: 0px;border-radius: 15px;">
        <div class="row">
            <div class="col text-center"><br><br><br><br>
                <img src="imagens/estacionamento1.png" alt="login"
                    class="img-img-responsive img-circle logo center-block"><br>
                <form action="valida.php" class="form-horizontal" method="post" onsubmit="entrar()">
                    <br>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                        <div class="form-group text-center">
                            <div class="col">
                                <label for="" class="text-center col control-label">LOGIN</label>
                                <input placeholder="Digite seu login" type="text" id="login" name="login"
                                    class="text-center form-control input-md " required="" >
                            </div>
                        </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                        <div class="form-group text-center">
                            <div class="col">
                                <label for="" class="col control-label ">SENHA</label>
                                <input placeholder="Digite sua senha" type="password" id="senha" name="senha"
                                    class="text-center form-control input-md " required="">
                            </div>
                        </div>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                        <div class="form-group text-center">
                            <div class="col center-block">
                                <button id="logar" name="logar"
                                    class="btn alert-primary btn-lg btn-block btn-center"><span
                                        class="text-center glyphicon glyphicon-log-in" aria-hidden="true"> Acessar</span></button>
                            </div>
                        </div><br><br><br>
                        </div>
                        <div class="col"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="js/bloqueio.js" type="text/javascript"></script>
    



</body>

</html>