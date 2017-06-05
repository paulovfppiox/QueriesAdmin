<?php

// 1- Cadastra todos os formulários
// 2- Identifica quem chamou
// 3- redireciona para a função, objeto específicos
// Turn on error reporting so we can see if anything is going wrong
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo $_POST["val"];
echo $_GET["val"];



?>
