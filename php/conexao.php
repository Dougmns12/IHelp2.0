 <?php
/**
*  CONEXÃO COM O SGDB E COM A BASE
*  DE DADOS IHELP
**/

//CONEXAO
$conexao = mysqli_connect('localhost','douglas', '1234');
if (!$conexao) {
    die('Não foi possível conectar: ' . mysqli_error());
}
// Entrando na base de dados/schema
// ihelp
$resultado = mysqli_query($conexao, "use bdihelp;");
//echo "<br />".$resultado."<br />";
//var_dump($resultado);

//echo 'Conexão bem sucedida';
?>