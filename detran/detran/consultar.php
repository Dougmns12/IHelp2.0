<html>
<head> Detran RN</head>
<body>
<table border="1">
	<tr>
		<td colspan="6" align="center"> <h2>Listar Pessoas</h2> </td>
	</tr>
	<tr>
		<td><b>CPF</b></td>
		<td><b>Nome</b></td>
		<td><b>Endereço</b></td>
		<td><b>Data de Nascimento</b></td>
		<td><b>Telefone </b></td>
		<td><b>Número CNH</b></td>
	</tr>

<?php

	$con = mysqli_connect("localhost","userdetran","1234", "bddetran");
	// Checando a conexão
	if (mysqli_connect_errno($con)){
		echo "Erro ao conectar com a base de dados: ";
		mysqli_connect_error();
	}else{

		/*echo "<tr> <td colspan=\"6\"> 
			<font color=\"green\">Conexão Aberta!! </font>
				</td> </tr>";*/

		$sql = "SELECT * FROM pessoas;";

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
				echo "<tr> \n";
		        echo "<td>" . $row["cpf"] . "</td> \n";
		        echo "<td>" . $row["nome"] . "</td> \n";
		        echo "<td>" . $row["endereco"] . "</td> \n";
		        echo "<td>" . $row["datadeNascimento"] . "</td> \n";
		        echo "<td>" . $row["telefone"] . "</td> \n";
		        echo "<td>" . $row["numCNH"] . "</td> \n";
    		    echo "</tr> \n";
		    }

		}


	}

?>


</table>
</body>

</html>