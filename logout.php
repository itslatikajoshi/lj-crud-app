<?php
   session_start();
   unset($_SESSION["email"]);
   unset($_SESSION["password"]);
   
   echo 'You have seccussfully logout';
   header('Refresh: 2; URL = index.php');
?>