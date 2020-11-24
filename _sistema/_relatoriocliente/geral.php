<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Cliente Geral</title>
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
		<h2 class="display-4 text-center">Cliente Geral</h2><br><br>
		
		<form action="?go=pesquisar" method="POST">
		<div class="row">
		<div class="col-4 form-group"></div>
		<div class="col-4 form-group">
		</div>
		<div class="col-2 form-group">
		  <input type="submit" class="btn alert-primary btn-block"  id="todos" name="todos" value="Todos">
		</div>
		<div class="col-2 form-group">
		<p><a href="../" class="btn alert-warning">‹--Voltar</a></p>
		</div>
		</div>
		</form>

		 <table class="table table-striped table-hover table-bordered alert-light">
					<thead>
					<tr>
					<th>CPF CNPJ</th>
					<th>NOME RAZAO</th>
					<th>RG IE</th>
					<th>EMAIL</th>
					<th>TELEFONE<br></th>
					<th>RUA</th>
					<th>N</th>
					<th>BAIRRO</th>
					<!-- <th>COMPLEMENTO</th> -->
					<th>CEP</th>
					<th>CIDADE</th>
					<th>UF</th>
					<!-- <th>DATA</th>
					<th>HORA</th> -->
					</tr>
					</thead>

    	<?php

		 if(@$_GET['go']=='pesquisar'){
			$pesquisar=$_POST['todos'];
			
			$resultado="SELECT * FROM cliente ";
			echo '<br><br>Pesquisando '.'<div class="btn alert-primary">'.$pesquisar.'</div><br><br>';
			$relatorio=mysqli_query($conexao,$resultado);

			while($dados=mysqli_fetch_assoc($relatorio)){
				echo 	'<tbody>';
				echo 	'<tr>';
				echo 	'<td>';
			    echo 	$dados ['cpf_cnpj'];
			    echo 	'</td>';
				echo 	'<td>';
			    echo 	$dados ['nome_razao'];
			    echo 	'</td>';
				echo 	'<td>';
			    echo 	$dados ['rg_ie'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['email'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['telefone'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['rua'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['numero'];
                echo 	'</td>';
                echo 	'<td>';
			    echo 	$dados ['bairro'];
				echo 	'</td>';
				// echo 	'<td>';
			    // echo 	$dados ['complemento'];
				// echo 	'</td>';
				echo 	'<td>';
			    echo 	$dados ['cep'];
				echo 	'</td>';
				echo 	'<td>';
			    echo 	$dados ['cidade'];
				echo 	'</td>';
				echo 	'<td>';
			    echo 	$dados ['estado'];
				echo 	'</td>';

				// echo 	'<td>';
				// $dados ['data'];
                // $data = $dados ['data'];
                // echo date("d-m-Y",strtotime($data));
				// echo 	'</td>';

				// echo 	'<td>';
			    // echo 	$dados ['hora'];
				// echo 	'</td>';
				
				echo 	'</tr>';
				echo 	'</tbody>';


			}
		 }
?>
</table>
<br>
		<p>
		<a href="../" class="btn alert-warning">‹--Voltar</a>
		</p> 

    	</div>
   	 
	</div>  

    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/popper.min.js" type="text/javascript"></script>


</body>

</html>
