<html>
<head> Detran RN</head>
<body>
<table border="1">
	<tr>
		<td colspan="6" align="center"> <h2>Listar Pessoas</h2> </td>
	</tr>
	<tr>
		<td><b>Reanvam</b></td>
		<td><b>modelo</b></td>
		<td><b>placa</b></td>
		<td><b>chassi</b></td>
		<td><b>Ano de Fabricação </b></td>
		<td><b> Ano Modelo</b></td>
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

		$sql = "SELECT * FROM Carros;";

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
				echo "<tr> \n";
		        echo "<td>" . $row["renavam"] . "</td> \n";
		        echo "<td>" . $row["marca"] . "</td> \n";
		        echo "<td>" . $row["placa"] . "</td> \n";
		        echo "<td>" . $row["chassi"] . "</td> \n";
		        echo "<td>" . $row["anoFabricacao"] . "</td> \n";
		        echo "<td>" . $row["anoModelo"] . "</td> \n";
    		    echo "</tr> \n";
		    }

		}


	}

?>


</table>
</body>

</html>