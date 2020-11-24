<?php

//dual_envia_txt.php

include ("txt.class.php");

 

//recebo as informações e coloco elas em variáveis que vou utilizar:

$porta='COM2';

$velocidade= 115200;

$texto=$_POST['texto'];

$modo=$_POST['modo'];

 

//Crio um objeto da classe Envia_Txt

$txt = new Txt();

$porta_ok = $txt->seta_porta($porta, $velocidade);

usleep(20);

 

/* Declarando as Variáveis para comandos diretos: */

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

 

/*Negrito*/

if ($modo == "negrito")

$texto = $Ni . $texto . $Nf;

/*Sublinhado*/

if ( $modo == "sublinhado" )

$texto = $Si . $texto . $Sf;

/*Condensado*/

if ( $modo == "condensado" )

$texto = $Ci . $texto . $Cf;

/*Expandido*/

if ( $modo == "expandido" )

$texto = $Ei . $texto . $Ef;

/*Dupla Altura*/

if ( $modo == "dupla_altura" )

$texto = $Dai . $texto . $Daf;

// Para o modo normal, vai imprimir o texto que recebeu, sem nenhuma alteração nele.

 

$retorno = 0;

$retorno = $txt->envia_txt($texto);

usleep(2000);

 

echo '<br> Verifique o Texto Impresso!!!<br>';

echo '<a href="testando.php">Voltar</a>';

?>