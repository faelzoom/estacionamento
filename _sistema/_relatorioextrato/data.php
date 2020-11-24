<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Extrato por Busca</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="../../css/meuEstilo.css">
	<link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
	<script src="../../js/main.js" type="text/javascript"></script>
    <script src="../../js/jquery.min.js" type="text/javascript"></script>
    <script src="../../js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="../../js/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>
<body>
    
<?php
include_once("../bloqueio.php");    
include_once("cabecalho.php");    
$consulta='select * from veiculo_historico order by id_veiculo';
?> 
<div class="" style="margin:-20px 20px 80px 20px;padding:100px;background-color:#fff;border-radius:10px">
	<div class="col form-group">
		<h2 class="display-4 text-center">Extrato por Busca</h2><br><br>
		
		<form action="?go=pesquisar" method="POST">
		<div class="row">
		<div class="col-4 form-group">
		<h2 class="text-center">DATA INICIAL</h2>
		<input type="date" name="pesquisar" id="pesquisar" class="form-control" placeholder="Digite o nome do pagador " required>
		</div>
		<div class="col-4 form-group">
		<h2 class="text-center">DATA FINAL</h2>
		  <input type="date" name="pesquisar1" id="pesquisar1" class="form-control" placeholder="Digite o nome do pagador " required>
		</div>
		<div class="col-2 form-group">
		<h2 class="text-center" style="opacity: 0">X</h2>

		  <input type="submit" class="btn alert-primary btn-block" value="Pesquisar">
		</div>
		<div class="col-2 form-group">
		<h2 class="text-center" style="opacity: 0">X</h2>
		<p><a href="../" class="btn alert-warning">‹--Voltar</a></p>
		</div>
		</div>
		</form>

		<table class="table table-striped table-hover table-bordered alert-light">
		<thead>
		<tr>
		<th>PLACA</th>
		<th>MODELO</th>
		<th>DATA</th>
		<th>ENTRADA</th>
		<th>SAIDA</th>
		<th>PERMANENCIA</th>
		<th>RECEBIDO</th>
		<th>TROCO</th>
		<th>TOTAL</th>
		</tr>
		</thead>

    	<?php

if(@$_GET['go']=='pesquisar'){
	$pesquisar=$_POST['pesquisar'];
	$pesquisar1=$_POST['pesquisar1'];
			
			$resultado="SELECT * FROM pagamentos WHERE datas BETWEEN '$pesquisar' and '$pesquisar1'";
			echo '<br><br>DATA INICIAL '.'<div class="btn alert-primary">'.date("d/m/Y", strtotime($pesquisar))	.'</div><br><br>'.'DATA FIM '.'<div class="btn alert-primary">'.date("d/m/Y", strtotime($pesquisar1)).'</div><br><br>';
			$inicio = strtotime($pesquisar); 
			$final = strtotime($pesquisar1);
			$dias= ($inicio - $final) /86400;
			if($dias < 0){
			$dias = $dias * -1;
			echo 'DIAS '.'<div class="btn alert-primary">' .number_format($dias , 0, ',', '.')." Dias</div><br><br>";
			}else{
				echo 'DIAS '.'<div class="btn alert-danger">' .number_format($dias , 0, ',', '.')." Dias</div><br><br>";
			}
			$relatorio=mysqli_query($conexao,$resultado);
			while($dados=mysqli_fetch_assoc($relatorio)){
				echo 	'<tbody>';
				echo 	'<tr>';
				echo 	'<td>';
			    echo strtoupper($dados ['placa']);
			    echo 	'</td>';
				echo 	'<td>';
			    echo strtoupper($dados ['modelo']);
			    echo 	'</td>';
				echo '<td>';
				$dados ['datas'];
				$data = $dados ['datas'];
				echo date("d-m-Y",strtotime($data));
				echo '</td>';
                echo 	'<td>';
			    echo 	$dados ['horaEntrada'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['horaSaida'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['permanencia'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['recebido'];
				echo 	'</td>';
				echo 	'<td>';
			    echo 	$dados ['devolver'];
				echo 	'</td>';
				echo 	'<td>';
			    echo 	$dados ['total'];
                echo 	'</td>';
				echo 	'</tr>';
				echo 	'</tbody>';


			}
			$subtotal1="SELECT total,SUM(total) as subtotal FROM pagamentos WHERE datas BETWEEN '$pesquisar' and '$pesquisar1'";
			$relatorio1=mysqli_query($conexao,$subtotal1);
		 
			while($dados1=mysqli_fetch_assoc($relatorio1)){
		 
				echo '<table class="table table-bordered alert-light float-right">';
				echo	'<thead>';
				echo	'<tr>';
				echo 	'<th class="float-right">SUBTOTAL</th>';
				echo	'</tr>';
				echo	'</thead>';	
				echo 	'<tbody>';
				echo 	'<tr>';
                echo 	'<td class="float-right text-primary border-primary" style="margin-top:10px;">';
				echo 	$dados1 ['subtotal'];
                echo 	'</td>';
				echo 	'</tr>';
				echo 	'</tbody>';
				echo	'</table>';
			}
		 }
?>
</table>
		<p>
		<a href="../" class="btn alert-warning">‹--Voltar</a>
		</p> 

    	</div>
   	 
	</div>  

    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/popper.min.js" type="text/javascript"></script>


</body>

</html>
