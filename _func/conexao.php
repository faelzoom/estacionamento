<?php
    $conexao=@mysqli_connect("br980.hostgator.com.br","iptvmo85_adm","pegapega1","iptvmo85_mb");
    mysqli_select_db($conexao,"iptvmo85_mb") or die ("Erro no Sistema codigo 00011..322");
    if(!$conexao){
           die("Falha na conexão".mysqli_connect_error());
    }else
?>