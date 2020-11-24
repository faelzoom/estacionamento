<?php

//txt.class.php

class Txt{

       

        //construtor

        function Txt(){

                $porta = "com1";

                $resposta = "";

                exec('mode '. $porta .':9600,n,8,1'); //executa a configuração de velocidade na porta,

        }

       

        function seta_porta($porta_recebida, $velocidade_recebida) {

                global $porta;

                global $velocidade;

                $porta = $porta_recebida;

                $velocidade = $velocidade_recebida;

                //sem uma porta, ou velocidade configurada:

                if ($porta_recebida == null || $velocidade_recebida == null)

                {

                        exec('mode com1:9600,n,8,1'); //executa a configuração de velocidade na porta setada no construtor

                }

                //com uma porta e velocidade setadas para ser configurada:

                else

                {

                        exec('mode '. $porta .':'. $velocidade .',n,8,1'); //executa a configuração de velocidade na porta

                }

        }

       

        //função genérica que executa comandos de envio de texto

        function envia_txt($comando) {

                global $porta;

                $nome_arq = 'envia_txt.txt';

                $fp = fopen($nome_arq,'w+'); // abre o arquivo que receberá o comando

                fwrite($fp,$comando); //escrevo o comando que será enviando à impressora

                fclose($fp); //fecho o arquivo

                exec('type '. $nome_arq .' > '. $porta);

        }

}

?>