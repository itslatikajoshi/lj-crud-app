<?php
   session_start();
   unset($_SESSION["email"]);
   unset($_SESSION["password"]);
   
   echo 'You have successfully logout';
   header('Refresh: 1; URL = index.php');
?>