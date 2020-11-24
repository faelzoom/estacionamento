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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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

<body class="container"><br>

 <table class="table table-striped table-hover table-bordered alert-light">


		<?php

                $placa=$_GET['placa'];


		$pesquisa = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM veiculo where placa = '$placa'; "));
		   if($pesquisa== 1){
		  
		  $resultado="SELECT * FROM veiculo WHERE placa ='$placa';";
		  $relatorio=mysqli_query($conexao,$resultado);

		  while($dados=mysqli_fetch_assoc($relatorio)){



                        echo 	'<thead>';
			echo 	'<tr>';
			echo 	'<th>PLACA</th>';
			echo 	'<th>MODELO</th>';
                        echo 	'</thead>';
			echo 	'<tbody>';
			echo 	'<tr>';
			echo '<td>';
			echo strtoupper($dados ['placa']);
			echo '</td>';	
	
			echo '<td>';   	 
			echo strtoupper($dados ['modelo']);
			echo '</td>';

			echo 	'</tr>';
                        echo 	'</tbody>';
			echo 	'<tbody>';
                        echo 	'<thead>';
			echo 	'<tr>';
			echo 	'<th>HORA</th>';
			echo 	'<th>DATA</th>';
                        echo 	'</thead>';
			echo 	'<tr>';


			echo 	'<td>';
			echo 	$dados ['hora_entrada'];
			echo 	'</td>';
			echo '<td>';
			$dados ['dia_mes'];
			$data = $dados ['dia_mes'];
			echo date("d-m-Y",strtotime($data));
			echo '</td>';
			echo 	'</tr>';
                        echo 	'</tbody>';
			echo 	'<tbody>';
                        echo 	'<thead>';
			echo 	'<tr>';
			echo 	'<th>VALOR HORA</th>';
			echo 	'<th>VALOR TOTAL</th>';
                        echo 	'</thead>';
			echo 	'<tr>';
			
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
			echo 	'</tr>';

                        echo 	'</tbody>';
			echo 	'<tbody>';
                        echo 	'<thead>';
			echo 	'<tr>';
			echo 	'<th>TEMPO</th>';
			echo 	'<th>SAIDA</th>';
                        echo 	'</thead>';
			echo 	'<tr>';

			echo '<td>';
			echo '<div class="text-primary fas fa-clock">';
			echo $horario = " " .$horas . ":" . $minutos . ":" .$segundos;
			echo '</div>';

			echo '<td>';
			echo '<form action="#" method="post" 
                        onsubmit="deletando()">
			<input class="btn alert-danger btn-block" type="submit" 
                        onclick="myFunction()" value="Voltar" name="del" id="del" >
			</form>';
			echo '</td>';
			echo '</td>';
			echo '</tr>';
			echo '</tbody>';
			

		  }
		}
?>
</table>
			<form action="#" method="post" 
                        onsubmit="deletando()">
			<input class="btn alert-success btn-block" type="submit" 
                        onclick="myFunction()" value="PAGAR" name="del" id="del" >
			</form>
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