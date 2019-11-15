<?php
session_start();
require_once("Colaboradores.php"); //include

$email = $_POST['email'];
$senha = $_POST['senha'];
$login = $_POST['login'];
//instanciando a classe
$Codcolaborador = new Colaboradores();
$Codcolaborador->inicializar( $email, $senha, $login);
if ($Codcolaborador->cadastrar()) {
	//echo "<b>Olá ".$usuario->nome.",</b> Seu cadastro foi realizado com sucesso!";
	$_SESSION["logado"] = true;
	$_SESSION["Colaboradores"] = serialize($Codcolaborador);
	header("Location: ask.php");
	
} else {
	echo "<b><font color=\"red\">ERRO!!!!! :(</font></b>";
}


//$usuario->listarUsuarios();
?>