<?php 

session_start();
$_SESSION =[];
session_unset();

setcookie('id','',time()-3600);
setcookie('key','',time()-3600);

header("Location: index.php");
exit;

 ?>