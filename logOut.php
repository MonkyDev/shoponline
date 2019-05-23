<?php
session_start();
session_name('inicio');
unset($_SESSION['usuario']);
unset($_SESSION['pk_user']);

header("Location:index.php")
?>