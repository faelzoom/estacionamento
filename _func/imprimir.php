<?php
    include_once("conexao.php");
    include("_pagamento/txt.class.php");
$impressoraPorta = "select * from impressora";
$portaAdds = mysqli_query($conexao, $impressoraPorta);
while ($dados = mysqli_fetch_assoc($portaAdds)){
    $escolhaPorta= $dados['porta'];
    $escolhaVelocidade= $dados['velocidade'];
};

$porta = $escolhaPorta;
$velocidade = $escolhaVelocidade;

$modo = 'normal';
//Crio um objeto da classe Envia_Txt
$txt = new Txt();
$porta_ok = $txt->seta_porta($porta, $velocidade);
usleep(20);
/* Declarando as Variáveis para comandos diretos: */
$Ni = chr(27) . chr(69);
$Nf = chr(27) . chr(70);
$Dai = chr(27) . chr(119) . '1';
$Daf = chr(27) . chr(119) . '0';
$Ci = chr(15);
$Cf = chr(18);
$Ei = chr(14);
$Ef = chr(20);
$Si = chr(27) . chr(45) . '1';
$Sf = chr(27) . chr(45) . '0';
/*Negrito*/
if ($modo == "negrito")
    $placa = $Ni . $placa . $Nf;
/*Sublinhado*/
if ($modo == "sublinhado")
    $placa = $Si . $placa . $Sf;
/*Condensado*/
if ($modo == "condensado")
    $placa = $Ci . $placa . $Cf;
/*Expandido*/
if ($modo == "expandido")
    $placa = $Ei . $placa . $Ef;
/*Dupla Altura*/
if ($modo == "dupla_altura")
    $placa = $Dai . $placa . $Daf;
// Para o modo normal, vai imprimir o texto que recebeu, sem nenhuma alteração nele.
$retorno = 0;
usleep(2000);

$resultado1 = "SELECT * FROM estacionamento";
$relatorio1 = mysqli_query($conexao, $resultado1);
while ($dados = mysqli_fetch_assoc($relatorio1)){
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
}
$resultado2 = "select * from veiculo order by id_veiculo";
$relatorio2 = mysqli_query($conexao, $resultado2);
while ($dados = mysqli_fetch_assoc($relatorio2)){

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
        . '     Id : ' . $codId . "\r\n"
        . '     Placa Veiculo  : ' . $placas . "\r\n"
        . '     Modelo Veiculo : ' . $modelos . "\r\n"
        . '     Data : ' . $dataCerta . "\r\n"
        . '     Hora Entrada : ' . $hora_entrada . "\r\n"
        . '     Tipo : ' . $veiculo . "\r\n"
        . '  ----------------------------------------------' . "\r\n"
        . '     Rua: ' . $rua . ' N: ' . $numero . "\r\n"
        . '     Bairro: ' . $bairro . '  Cep: ' . $cep . "\r\n"
        . '     Cidade: ' . $cidade . ' UF: ' . $estado . "\r\n" . "\r\n" . "\r\n" . "\r\n"
        . '  -------------Obrigado e volte sempre------------'
        . "\r\n" . "\r\n" . "\r\n" . "\r\n" . "\r\n"

);
echo "<meta http-equiv='refresh' content='0, url=index.php'>";
?>