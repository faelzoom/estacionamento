<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <script src="js/bootstrap-notify.min.js" type="text/javascript" ></script>
    <script src="js/jquery.mask.min.js" type="text/javascript" ></script>
</head>

<script type="text/javascript">
    function confirmacao(){
        $.notify({
        // options
        message: 'Enviado com sucesso!..' 
        },{
        // settings
        type: 'success'
        });

        return false
    }
    </script>

<?php
    session_start();
    $_SESSION['user_log']=null;
    
    include_once "_sistema/conexao.php";

    $user=$_POST['login'];
    $pwd=md5($_POST['senha']);
    

    if(empty($user)){
        echo "<script>
                alert ('Digite uma Usuário.');
                history.back();
                </script>";

    }else if(empty($pwd)){
        echo "<script>
                alert ('Digite uma Senha.');
                history.back();
                </script>";
        
    }else{
        $consulta=mysqli_query($conexao, "select * from usuario where usuario='$user' and senha='$pwd'");
        $num = mysqli_num_rows($consulta);

         if($num==1){
             
             while($percorrer = mysqli_fetch_array($consulta)){
                 $adm = $percorrer['habilitar_login'];

                 if($adm ==1){
                    echo "<meta http-equiv='refresh' content='0, url=./_sistema/'>";
                    $_SESSION['adm'] = $user;
                    $_SESSION['senha'] = $pwd;

                 }
                 if($adm == 2){
                    echo "<meta http-equiv='refresh' content='0, url=./_func/'>";
                    $_SESSION['func'] = $user;
                    $_SESSION['senha'] = $pwd;

                 }
                 if($adm == 0){
                    echo "<meta http-equiv='refresh' content='0, url=index.php'>";
                 }         
                
             }
        }else{
            echo "<meta http-equiv='refresh' content='0, url=index.php'>";
        }
    }



?>