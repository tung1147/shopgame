<?php 
session_start();
define("TPATH","/gameshop/src");
session_unset();
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
header("Location: index.php"); 
?>
