<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Extrato por Mes</title>
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
		<h2 class="display-4 text-center">Extrato por Mes</h2><br><br>
		
		<form action="?go=pesquisar" method="POST">
		<div class="row">
		<div class="col-4 form-group"></div>
		<div class="col-4 form-group">
		<select class="form-control" name="pesquisar" id="pesquisar">
							<option selected>Escolha o mês</option>
							<option value="01">Janeiro</option>
							<option value="02">Fevereiro</option>
							<option value="03">Março</option>
							<option value="04">Abril</option>
							<option value="05">Maio</option>
							<option value="06">Junho</option>
							<option value="07">Julho</option>
							<option value="08">Agosto</option>
							<option value="09">Setembro</option>
							<option value="10">Outubro</option>
							<option value="11">Novembro</option>
							<option value="12">Dezembro</option>
						</select>
		</div>
		<div class="col-2 form-group">
		  <input type="submit" class="btn alert-primary btn-block" value="Pesquisar">
		</div>
		<div class="col-2 form-group">
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
			
			$resultado="SELECT * FROM pagamentos WHERE datas LIKE '%$pesquisar-%';";
			if($pesquisar == 1){
				$pesquisar = 'Janeiro';
			}
			if ($pesquisar == 2){
				$pesquisar = 'Fevereiro';
			}
			if ($pesquisar == 3){
				$pesquisar = 'Março';
			}
			if ($pesquisar == 4){
				$pesquisar = 'Abril';				
			}
			if ($pesquisar == 5){
				$pesquisar = 'Maio';				
			}
			if ($pesquisar == 6){
				$pesquisar = 'Junho';				
			}
			if ($pesquisar == 7){
				$pesquisar = 'Julho';				
			}
			if ($pesquisar == 8){
				$pesquisar = 'Agosto';				
			}
			if ($pesquisar == 9){
				$pesquisar = 'Setembro';				
			}
			if ($pesquisar == 10){
				$pesquisar = 'Outubro';				
			}
			if ($pesquisar == 11){
				$pesquisar = 'Novembro';				
			}
			if ($pesquisar == 12){
				$pesquisar = 'Dezembro';				
			};

			

			echo '<br><br>Mês '.'<div class="btn alert-primary">'.$pesquisar.'</div><br><br>';
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
			if($pesquisar == 'Janeiro'){
				$pesquisar = 1;
			}
			if ($pesquisar == 'Fevereiro'){
				$pesquisar = 2;
			}
			if ($pesquisar == 'Março'){
				$pesquisar = 3;
			}
			if ($pesquisar == 'Abril'){
				$pesquisar = 4;				
			}
			if ($pesquisar == 'Maio'){
				$pesquisar = 5;				
			}
			if ($pesquisar == 'Junho'){
				$pesquisar = 6;				
			}
			if ($pesquisar == 'Julho'){
				$pesquisar = 7;				
			}
			if ($pesquisar == 'Agosto'){
				$pesquisar = 8;				
			}
			if ($pesquisar == 'Setembro'){
				$pesquisar = 9;				
			}
			if ($pesquisar == 'Outubro'){
				$pesquisar = 10;				
			}
			if ($pesquisar == 'Novembro'){
				$pesquisar = 11;				
			}
			if ($pesquisar == 'Dezembro'){
				$pesquisar = 12;			
			};
			$subtotal1="SELECT total,SUM(total) as subtotal FROM pagamentos WHERE datas LIKE '%$pesquisar%'";
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
