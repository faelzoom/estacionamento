<?php
    session_start();
   unset($_SESSION["adm"]);
   unset($_SESSION["func"]);
   unset($_SESSION["pwd"]);
    echo "<meta http-equiv='refresh' content='0, url=../'>";
?>
