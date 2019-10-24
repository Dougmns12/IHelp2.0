<!DOCTYPE html>
<html>
<head> My Sistema</head>
<body>
<table>
<tr>
<td colspan="6" align="center"> <h2>Listar Pessoas</h2> </td>
</tr>
<tr>
<td><b>Nome</b></td>
<td><b>Data Nascimento</b></td>
<td><b>Curso</b></td>
<td><b>Instituição </b></td>
<td><b>Login</b></td>
<td><b>Senha</b></td>
<td><b>Email</b></td>
<td><b>Apelido</b></td>
<td><b>Sexo</b></td>
<td><b>Nível de Escolaridade</b></td>
<td><b>Cidade</b></td>
<td><b>Estado</b></td>
<td><b>Nivel do Colaborador</b></td>

</tr>

<?php

$con = mysqli_connect("localhost","doug","1234", "bdihelp");
// Checando a conexão
if (mysqli_connect_errno($con)){
echo "Erro ao conectar com a base de dados: ";
mysqli_connect_error();
}else{
//echo "Conexão Aberta";

echo "<tr> <td colspan=\"6\">
<font color=\"green\">Conexão Aberta!! </font>
</td> </tr>";

$sql = "SELECT * FROM colaboradores;";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
echo "<tr> \n";
       echo "<td>" . $row["nome"] . "</td> \n";
       echo "<td>" . $row["datadeNascimento"] . "</td> \n";
       echo "<td>" . $row["curso"] . "</td> \n";
       echo "<td>" . $row["instituicao"] . "</td> \n";
       echo "<td>" . $row["login"] . "</td> \n";
       echo "<td>" . $row["senha"] . "</td> \n";
       echo "<td>" . $row["email"] . "</td> \n";
       echo "<td>" . $row["apelido"] . "</td> \n";
       echo "<td>" . $row["sexo"] . "</td> \n";
       echo "<td>" . $row["niveldeEscolaridade"] . "</td> \n";
       echo "<td>" . $row["cidade"] . "</td> \n";
       echo "<td>" . $row["estado"] . "</td> \n";
       echo "<td>" . $row["niveldoColaborador"] . "</td> \n";
       echo "</tr> \n";
   }

}


}

?>


</table>
</body>

</html>