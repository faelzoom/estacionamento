<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Pesquisa de Cliente</title>
	<link href="img/car_23964.ico" rel="icon">
	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
		rel="stylesheet">

	<!-- Bootstrap CSS File -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

	<!-- Main Stylesheet File -->
	<link href="css/style.css" rel="stylesheet">

</head>

<body class="container">

 <table class="table table-striped table-hover table-bordered alert-light">
				<thead>
				<tr>
				<th>ID</th>
				<th>PLACA</th>
				<th>MODELO</th>
				<th>ENTRADA</th>
				<th>DATA</th>
				<th>VALOR HORA</th>
				<th>TOTAL</th>
				<th>TEMPO</th>
				<th>LIMPAR</th>
				</tr>
				</thead>

		<?php

		   

		   if($pesquisar1=$_POST['idveiculo'] || $pesquisar=$_POST['placa']){
		  
		  $resultado="SELECT * FROM veiculo WHERE placa LIKE '%$pesquisar%';";
		  $relatorio=mysqli_query($conexao,$resultado);

		  while($dados=mysqli_fetch_assoc($relatorio)){




			echo 	'<tbody>';
			echo 	'<tr>';
			echo 	'<td>';
			echo 	$dados ['id_veiculo'];
			echo 	'</td>';
			echo '<td>';
			echo strtoupper($dados ['placa']);
			echo '</td>';		
			echo '<td>';   	 
			echo strtoupper($dados ['modelo']);
			echo '</td>';
			echo 	'<td>';
			echo 	$dados ['hora_entrada'];
			echo 	'</td>';
			echo '<td>';
			$dados ['dia_mes'];
			$data = $dados ['dia_mes'];
			echo date("d-m-Y",strtotime($data));
			echo '</td>';
			
			echo '<td>';
			echo '<div> R$ '.$dados ['valor_entrada'].'</div>';
			$valorentrada=$dados ['valor_entrada'];
			echo '</td>';



			echo '<td>';
			date_default_timezone_set('America/Sao_Paulo');
			$H_final= strtotime(date('H:i:s'));
			$H_inicial=  strtotime($dados['hora_entrada']);
			// $valorsaida= strtotime($total)-strtotime($hora);
			$val2=bcsub($H_final,$H_inicial);
			$total =($val2/3600)*$dados['valor_entrada'];
			$horas = floor($val2 / 3600);
			$minutos = floor(($val2 - ($horas * 3600)) / 60);
			$segundos = floor($val2 % 60);

			if ($val2 >= 0 && $val2 < 900) { // a partir 1:15 minutos 3600=1hora     900=15minutos 
				if($valorentrada == 4){
					$total = 3.00;
				}else if($valorentrada == 3){
					$total = 1.50;
				}else{
					$total = 20.00;
				}
			} else {
				if ($val2 >= 900 && $val2 < 4500) { // a partir 1:15 minutos 3600=1hora     900=15minutos
					if($valorentrada == 4){
						$total = 4.00;
					}else if($valorentrada == 3){
						$total = 3.00;
					}else{
						$total = 20.00;
					}
				} else if ($val2 >= 4500 && $val2 < 8100) { // a partir 2:15 minutos
					if($valorentrada == 4){
						$total = 8.00;
					}else if($valorentrada == 3){
						$total = 6.00;
					}else{
						$total = 20.00;
					}
					
				} else if ($val2 >= 8100 && $val2 < 11700) { // a partir 3:15 minutos
					if($valorentrada == 4){
						$total = 12.00;
					}else if($valorentrada == 3){
						$total = 9.00;
					}else{
						$total = 20.00;
					}
					
				} else if ($val2 >= 11700 && $val2 < 15300) { // 4:15 minutos
					if($valorentrada == 4){
						$total = 16.00;
					}else if($valorentrada == 3){
						$total = 12.0;
					}else{
						$total = 20.00;
					}
					
				} else if ($val2 >= 15300 && $val2 < 18900) { // 5:15 minutos
					if($valorentrada == 4){
						$total = 20.00;
					}else if($valorentrada == 3){
						$total = 15.00;
					}else{
						$total = 20.00;
					}
					
				} else if ($val2 >= 18900 && $val2 < 22500) { // 6:15 minutos
					if($valorentrada == 4){
						$total = 24.00;
					}else if($valorentrada == 3){
						$total = 18.00;
					}else{
						$total = 20.00;
					}
					
				} else if ($val2 >= 22500 && $val2 < 26100) { // 7:15 minutos
					if($valorentrada == 4){
						$total = 28.00;
					}else if($valorentrada == 3){
						$total = 21.00;
					}else{
						$total = 20.00;
					}
				} else if ($val2 >= 26100 && $val2 < 29700) { // 8:15 minutos
					if($valorentrada == 4){
						$total = 32.00;
					}else if($valorentrada == 3){
						$total = 24.00;
					}else{
						$total = 20.00;
					}
					
				} else if ($val2 >= 29700 && $val2 < 33300) { // 9:15 minutos
					if($valorentrada == 4){
						$total = 36.00;
					}else if($valorentrada == 3){
						$total = 27.00;
					}else{
						$total = 20.00;
					}
					
				} else if ($val2 >= 33300 && $val2 < 36900) { // 10:15 minutos
					if($valorentrada == 4){
						$total = 4.00;
					}else if($valorentrada == 3){
						$total = 30.00;
					}else{
						$total = 20.00;
					}
					
				}
			}
		
			echo '<div class="text-success">R$'.number_format($total, 2, ',', '.').'</div>';
			echo '</td>';

			echo '<td>';
			echo '<div class="text-primary fas fa-clock">';
			echo $horario = " " .$horas . ":" . $minutos ;
			echo '</div>';

			echo '<td>';
			echo '<form action="#veiculo" method="post" onsubmit="deletando()">
			<input class="btn alert-danger btn-block" type="submit" onclick="myFunction()" value="Deletar" name="del" id="del" >
			</form>';
			echo '</td>';

			echo '</td>';
			echo '</tr>';
			echo '</tbody>';
			

		  }
		}
?>
</table>
		<script src="lib/jquery/jquery.min.js"></script>
		<script src="lib/jquery/jquery-migrate.min.js"></script>
		<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="lib/easing/easing.min.js"></script>
		<script src="lib/mobile-nav/mobile-nav.js"></script>
		<script src="lib/wow/wow.min.js"></script>
		<script src="lib/waypoints/waypoints.min.js"></script>
		<script src="lib/counterup/counterup.min.js"></script>
		<script src="lib/owlcarousel/owl.carousel.min.js"></script>
		<script src="lib/isotope/isotope.pkgd.min.js"></script>
		<script src="lib/lightbox/js/lightbox.min.js"></script>
		<!-- Contact Form JavaScript File -->
		<script src="contactform/contactform.js"></script>

		<!-- Template Main Javascript File -->
		<script src="js/main.js"></script>


</body>

</html>