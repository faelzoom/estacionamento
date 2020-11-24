<?php
    if(!isset($_SESSION["adm"])){
        die("<script>
        alert('PAGINA NÃO EXISTE');
                history.back();
                </script>");
                include_once ("sair.php");     
    }
?>