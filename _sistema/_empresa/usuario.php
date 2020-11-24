                    <?php
                    session_start();
include_once("../conexao.php");
?>
                    <!DOCTYPE html>
                    <html lang="pt-br">

                    <head>
                        <meta charset="UTF-8">
                        <title>Cadastro de Usuario</title>
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

                    <body>

                        <?php
        include_once ("../bloqueio.php");
        include_once ("cabecalho.php");

    ?>
                        <div class=""
                            style="margin:-20px 20px 80px 20px;padding:100px;background-color:#fff;border-radius:10px">
                            <br>

                            <div class="col  form-group">
                                <h2 class="display-4 text-center">Cadastro de Usuario</h2><br><br>
                                <form action="?go=cadastrar" method="POST">
                                            <div class="row">
                                            <div class="col-2 form-group"></div>
                                                <div class="col form-group">
                                                    <label for="">Usuario</label>
                                                    <input type="text" class="form-control" id="usuario" name="usuario"
                                                        placeholder="Usuario" required>
                                                </div>
                                                <div class="col form-group">
                                                    <label for="">Senha</label>
                                                    <input type="password" class="form-control" id="senha" name="senha"
                                                        placeholder="Senha" required>
                                                </div>
                                                <div class="col-2 form-group"></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-4 form-group"></div>
                                                <div class="col-4 form-group">
                                                    <label for="">Habilitar</label>
                                                    <select class="form-control" name="habilitar" id="habilitar">
                                                        <option selected value="1">Administrador</option>
                                                        <option value="2">Funcionário</option>
                                                        <option value="0" require>Desativado</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-4 form-group"></div>
                                            </div><br><br>
                                            <div class="row">
                                            <div class="col text-center"></div>
                                                <div class="col text-center">
                                                    <input type="submit" value="Cadastrar"
                                                        class="btn alert-success btn-block">
                                                </div>
                                                <div class="col text-center">
                                                    <a href="../"> <input type="button" value="Voltar"
                                                            class="btn alert-warning btn-block"></a>
                                                </div>
                                                <div class="col text-center"></div>
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
            $usuario=$_POST['usuario'];
            $senha=md5($_POST['senha']);
            $habilitar_login=$_POST['habilitar'];
            date_default_timezone_set('America/Bahia');
            $data= date ('Y-m-d');
            $hora= date ('H:i:s');

        $pesquisa = mysqli_query($conexao, "insert into usuario (usuario,senha,habilitar_login,data,hora)values('$usuario','$senha','$habilitar_login','$data','$hora')");
        echo "<meta http-equiv='refresh' content='0, url=usuario.php'>";
        }
    
    ?>




                        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
                        <script src="../../js/popper.min.js" type="text/javascript"></script>


                    </body>

                    </html>