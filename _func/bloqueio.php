<?php
    if(!isset($_SESSION["func"])){
        die("<script>
        alert('PAGINA NÃO EXISTE');
                history.back();
                </script>");
                include_once ("sair.php");     
    }
?>