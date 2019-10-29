<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie("nome_usuario");
setcookie("senha_usuario");
header("Location: index.php");
?>