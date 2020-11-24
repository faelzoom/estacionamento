<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Pesquisa de Placa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../../css/meuEstilo.css">
    <link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
    
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>   

    <script>
    $(function(){
           
           $(document).ready(function(){            
                                               
             var atualizar= setInterval(function(){
                                                          
              $("#horass").load("pesquisa_placa.php #horass");
                                                                                    
             }, 1000);
             return false;
            });           
            });
    
    </script>
</head>

<body>
    
<?php
include_once('../bloqueio.php');    
include_once("cabecalho.php");  
?>    
<div class="" style="margin-top:-20px;padding:100px;background-color:#fff;border-radius:10px">
	<div class="col form-group">
        <h2 class="display-4 text-center">Pesquisa de Placa</h2>

        <div class="row">
                                    <div class="col-4 form-group">
                                    </div>

                                     <table class="table table-striped table-hover table-bordered alert-light"> 
       	<thead>
       	<tr>
       	<th>ID</th>
       	<th>Placa</th>
       	<th>Modelo</th>
       	<th>Entrada</th>
       	<th>Data</th>
       	<th>Valor Hora</th>
       	<th>Total</th>
       	<th>Tempo</th>
       	<th>Finalizar</th>
       	<th>Deletar</th>
       	</tr>
       	</thead>

                                    <?php
                                // PESQUISA DE PLACA

   $pesquisar=$_POST['pesquisar'];
   $resultado="select * from veiculo where placa LIKE '%$pesquisar%';";
   $relatorio=mysqli_query($conexao,$resultado);

   while($dados=mysqli_fetch_assoc($relatorio)){
       echo 	'<tbody>';
       echo 	'<tr>';
       echo '<td>';
       echo $dados ['id_veiculo'];
       $cod=$dados['id_veiculo'];

       echo '</td>';

        echo '<td>';
       echo strtoupper($dados ['placa']);
       echo '</td>';
             
        echo '<td>';   	 
        echo strtoupper($dados ['modelo']);
        echo '</td>';

       echo '<td>';
       echo $dados ['hora_entrada'];                               
        echo '</td>';
        
       echo '<td>';
       echo $dados ['dia_mes'];
       echo '</td>';
        
       echo '<td>';
       echo 'R$' .$dados ['valor_entrada'];
       $valorentrada=$dados ['valor_entrada'];
       echo '</td>';

       echo '<td>';
       date_default_timezone_set('America/Bahia');
       $H_final= strtotime(date('H:i:s'));
       $H_inicial=  strtotime($dados['hora_entrada']);
       // $valorsaida= strtotime($total)-strtotime($hora);
       $val2=bcsub($H_final,$H_inicial);
       $total =($val2/3600)*$dados['valor_entrada'];
       $horas = floor($val2 / 3600);
       $minutos = floor(($val2 - ($horas * 3600)) / 60);
       $segundos = floor($val2 % 60);

       
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
            };
        };
    };
       
       echo '<span class="text-success"> R$ '.number_format( $total, 2, ',', '.').'</span>';
       echo '</td>';

       echo '<td>';
       echo '<form name="form_reloj">';
       echo '<div class="text-primary fas fa-clock" onload="startTime();" >';
       echo '<span id="horass" >'.$horario = " " . $horas . ":" . $minutos .'</span>';
       echo '</div>';
       echo '</form>';
       echo '</td>';

       echo '<td>';
       echo '<form action="../saida.php" method="post" onsubmit="saindo()">
       <input type="text" hidden="true" name="enviar" id="enviar" value="'.$cod.'" >
       <input type="text" hidden="true" name="troco" id="troco" value="0" >
       <input type="submit" class="btn alert-primary btn-block" name="saida" id="saida"
       value="Saida">                       
       </form>';
       echo '</td>';

       echo '<td>';
       echo '<form action="../deletar.php" method="post" onsubmit="deletando()">
       <input type="text" hidden="true" name="enviar1" id="enviar1" value="'.$cod.'" >
       <input class="btn alert-danger btn-block" type="submit" value="Deletar" name="del" id="del" >
       </form>';
       echo '</td>';
       echo 	'</tr>';
       echo 	'</tbody>';


   }
?>
</table>


                                </div>  


        


			<p><a href="../" class="btn alert-warning">‹--Voltar</a></p>
    	</div>
   	 
	</div>  

    <script src="../../js/main.js" type="text/javascript"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/jquert.js" type="text/javascript"></script>
    <script src="../../js/popper.min.js" type="text/javascript"></script>


</body>

</html>