<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Imprimir 2 via Saída</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="../../css/meuEstilo.css">
	<link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon">
	<script src="../../js/main.js" type="text/javascript"></script>
    <script src="../../js/jquery.min.js" type="text/javascript"></script>
    <script src="../../js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="../../js/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

	<script type="text/javascript">
		$(document).ready(function () {

			var options = {
				translation: {
					'A': {
						pattern: /[A-Z]/
					},
					'a': {
						pattern: /[a-zA-Z]/
					},
					'S': {
						pattern: /[a-zA-Z0-9]/
					},
					'L': {
						pattern: /[a-z]/
					},
				}
			}

			$("#pesquisar").mask("aaa-0000", options)

		})
	</script>

</head>

<body>

	<?php
include_once("../bloqueio.php");    
include_once("cabecalho.php");   
include_once("../_pagamento/txt.class.php"); 
$consulta='select * from veiculo_historico order by id_veiculo';
?>
	<div class="" style="margin:-20px 20px 80px 20px;padding:100px;background-color:#fff;border-radius:10px">

		<div class="col form-group">
			<h2 class="display-4 text-center">2 via de Saída</h2><br><br>

			<form form method="POST" action="?go=pesquisa">
				<div class="row">
					<div class="col-4 form-group"></div>
					<div class="col-4 form-group">
						<input type="text" name="pesquisar" id="pesquisar" class="form-control"
							placeholder="ABC-1020" required>
					</div>
					<div class="col-2 form-group">
						<input type="submit" class="btn alert-primary btn-block" value="Pesquisar">
					</div>
					<div class="col-2 form-group">
						<p><a href="../" class="btn alert-warning">‹--Voltar</a></p>
					</div>
				</div>
			</form>
			 <table class=" container table table-striped table-hover table-bordered alert-light"> 
       	<thead>
       	<tr>
       	<th>ID</th>
       	<th>PLACA</th>
        <th>MODELO</th>
        <th>DATA</th>
       	<th>HORA ENTRADA</th>
       	<th>HORA SAIDA</th>
       	<th>PERMANENCIA</th>
       	<th>TOTAL</th>
        <th>IMPRIMIR</th> 

		</tr>
       	</thead>

			<?php
                                // PESQUISA DE PLACA
if(@$_GET['go']=='pesquisa'){
   $pesquisar=$_POST['pesquisar'];
   $resultado="select * from pagamentos where placa LIKE '%$pesquisar%';";
	echo '<br><br>Pesquisando '.'<div class="btn alert-primary">'.$pesquisar.'</div><br><br>';
   $relatorio=mysqli_query($conexao,$resultado);

   while($dados=mysqli_fetch_assoc($relatorio)){
       echo 	'<tbody>';
       echo 	'<tr>';
       echo '<td>';
       echo $dados ['id_pagamento'];
       $cod=$dados['id_pagamento'];

       echo '</td>';

        echo '<td>';
       echo strtoupper($dados ['placa']);
       $placa = strtoupper($dados ['placa']);
       echo '</td>';
             
        echo '<td>';   	 
        echo strtoupper($dados ['modelo']);
        $modelo = strtoupper($dados ['modelo']);
        echo '</td>';

        echo '<td>';
		$dados ['datas'];
		$data = $dados ['datas'];
		echo date("d-m-Y",strtotime($data));
        echo '</td>';

        echo '<td>';
        echo $dados ['horaEntrada'];     
        $horaEntrada = $dados ['horaEntrada'];                  
        echo '</td>';
        

        echo '<td>';
        echo $dados ['horaSaida']; 
        $horaSaida =$dados ['horaSaida']; 
        echo '</td>';

        echo '<td>';
        echo $dados ['permanencia'];
        $permanencia = $dados ['permanencia'];
        echo '</td>';

        echo '<td>';
        echo $dados ['total']; 
        $total = $dados ['total']; 
        echo '</td>';
        
        
    
	   
	   echo '<td>';
	   echo '<div class="col modal-footer">
       <form action="?go=imprimir" method="post" onclick="imprimir()">
	   <input type="text" hidden="true" name="enviar" id="enviar" value="' . $cod . '" >
	   <input type="submit" class="btn alert-primary btn-lg fa fa-print center" name="pagar" id="pagar"
	   value="&#xf02f;">                    
	   </form>
       </div>';
       
       $Ni= chr(27) .chr(69);

       $Nf= chr(27) .chr(70);
       
       $Dai= chr(27) .chr(119) .'1';
       
       $Daf= chr(27) .chr(119) .'0';
       
       $Ci= chr(15);
       
       $Cf= chr(18);
       
       $Ei= chr(14);
       
       $Ef= chr(20);
       
       $Si= chr(27) .chr(45) .'1';
       
       $Sf= chr(27) .chr(45) .'0';
       
       $dia_mes = date('Y-m-d ');
       $dataCerta = date("d-m-Y", strtotime($dia_mes));
       $hora_entrada = date('H:i:s');
            

       $impressoraPorta = "select * from impressora";
            $portaAdds = mysqli_query($conexao, $impressoraPorta);
            while ($dados = mysqli_fetch_assoc($portaAdds)){
                $escolhaPorta= $dados['porta'];
                $escolhaVelocidade= $dados['velocidade'];
            };
           
            //dual_envia_txt.php
           
            //recebo as informações e coloco elas em variáveis que vou utilizar:
            $porta = $escolhaPorta;
            $velocidade = $escolhaVelocidade;
            
            $modo = 'normal';
            //Crio um objeto da classe Envia_Txt
            $txt = new Txt();
            $porta_ok = $txt->seta_porta($porta, $velocidade);
            usleep(20);
            usleep(2000);

            $resultado1 = "SELECT * FROM estacionamento";
            $relatorio1 = mysqli_query($conexao, $resultado1);
            while ($dados = mysqli_fetch_assoc($relatorio1)) {
                $cnpj = $_POST = $dados['cnpj'];
                $razao = $_POST = $dados['razao'];
                $ie = $_POST = $dados['ie'];
                $fantasia = $_POST = $dados['fantasia'];
                $email = $_POST = $dados['email'];
                $telefone = $_POST = $dados['telefone'];
                $rua = $_POST = $dados['rua'];
                $numero = $_POST = $dados['numero'];
                $bairro = $_POST = $dados['bairro'];
                $complemento = $_POST = $dados['complemento'];
                $cep = $_POST = $dados['cep'];
                $cidade = $_POST = $dados['cidade'];
                $estado = $_POST = $dados['estado'];
            };
            $resultado2 = "select * from veiculo order by id_veiculo";
            $relatorio2 = mysqli_query($conexao, $resultado2);
            while ($dados = mysqli_fetch_assoc($relatorio2)) {

                $dados['id_veiculo'];
                $codId = $dados['id_veiculo'];
            };
            $retorno = $txt->envia_txt(
                "\r\n" . "\r\n"
                    . '                 ESTABELECIMENTO          ' .
                    "\r\n" . '-              ' . $Ni . $fantasia . $Nf . '              -' . "\r\n" . "\r\n"
                    . '          CNPJ  : ' . $cnpj . "\r\n"
                    . '          RAZAO SOCIAL  : ' . $razao . "\r\n"
                    . '          IE : ' . $ie . "\r\n"
                    . '          EMAIL  : ' . $email . "\r\n"
                    . '          TELEFONE  : ' . $telefone . "\r\n"
                    . '  ----------------------------------------------' . "\r\n"
                    . '     Placa Veiculo  : ' . $placa . "\r\n"
                    . '     Modelo Veiculo : ' . $modelo . "\r\n"
                    . '     Data : ' . date("d-m-Y", strtotime($data)) . "\r\n"
                    . '     Hora Entrada : ' . $horaEntrada . "\r\n"
                    . '     Hora Saida : ' . $horaSaida . "\r\n"
                    . '     Permanencia : ' . $permanencia . "\r\n"
                    . '     Total : R$' . $total . "\r\n"
                    . '  ----------------------------------------------' . "\r\n"
                    . '     Rua: ' . $rua . ' N: ' . $numero . "\r\n"
                    . '     Bairro: ' . $bairro . '  Cep: ' . $cep . "\r\n"
                    . '     Cidade: ' . $cidade . ' UF: ' . $estado . "\r\n" . "\r\n" . "\r\n" . "\r\n"
                    . '  -------------Obrigado e volte sempre------------'
                    . "\r\n" . "\r\n" . "\r\n" . "\r\n" . "\r\n"
        
        
            );
            
	   echo '</td>';
    
       echo 	'</tr>';
       echo 	'</tbody>';
       



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
