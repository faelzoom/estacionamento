<?php
include_once("conexao.php");


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MB ESTACIONAMENTO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="../css/meuEstilo.css" type="text/css">
     <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
</head>
<body>

<?php
                    $cod1=$_POST['enviar'];
                    $resultado="select * from veiculo where id_veiculo='$cod1'";
                    $relatorio=mysqli_query($conexao,$resultado);
                    while($dados=mysqli_fetch_assoc($relatorio)){

                        echo '<div class="container"><br><br>';
                    

                        echo 'PLACA   =  '.$dados ['placa'].'<br>';

                            
 	 
                        echo 'MODELO   =  '.$dados ['modelo'].'<br>';



                        echo 'HORA ENTRADA   =  '.$dados ['hora_entrada'].'<br>';

                        

                        echo 'DATA   =  '.$dados ['dia_mes'].'<br>';


                        echo "</div>";

                        }


?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>