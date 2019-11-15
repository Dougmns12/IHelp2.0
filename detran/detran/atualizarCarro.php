<html>
	<body><h2>Atualizar Pessoa</h2>
		<form action="atualizarCarro.php" name="formCarro" 
		id="formCarro" method="POST">
		<table>
			<tr>
				<td colspan="2"><b><a href="index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td><b>Renavam:</b></td>
				<td> <input type="text" name="renavam" value=""> </td>
			</tr>
			<tr>
				<td><b>Marca:</b></td>
				<td> <input type="text" name="marca" value=""> </td>
			</tr>
			<tr>
				<td><b>Placa: </b></td>
				<td> <input type="text" name="placa" value=""> </td>
			</tr>
			<tr>
				<td><b>Chassi: </b></td>
				<td> <input type="text" name="chassi" value=""> </td>
			</tr>
			<tr>
				<td><b>Ano de Fabricação: </b></td>
				<td> <input type="text" name="anoFabricacao" value=""> </td>
			</tr>
			<tr>
				<td><b>Ano de Modelo: </b></td>
				<td> <input type="text" name="anoModelo" value=""> </td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="atualizar" value="Atualizar">
				</td>
			</tr>
        </table>
		</form>
    </body>
    
	<?php

$renavam = "";
$marca = "";
$placa = "";
$chassi = "";
$anoFabricacao = "";
$anoModelo = "";


if(isset($_POST["renavam"])){
	$renavam = $_POST['renavam'];
}

   if(isset($_POST["marca"])){
	$marca = $_POST['marca'];
}
   if(isset($_POST["placa"])){
	$placa = $_POST['placa'];
}
   if(isset($_POST["chassi"])){
	$chassi = $_POST['chassi'];
}
   if(isset($_POST["anoFabricacao"])){
	$anoFabricacao = $_POST['anoFabricacao'];
}
   if(isset($_POST["anoModelo"])){
	$anoModelo = $_POST['anoModelo'];
}


if($renavam != ""){
	$erro = atualizarCarros($renavam, $marca, $placa, $chassi, $anoFabricacao, $anoModelo);

	if($erro != -1){
		echo "<font color='#00FF00' size='+2'> <b>Registro inserido com sucesso!</b> </font>";

	}
}


function abrirConexao(){
	$con = mysqli_connect("localhost",
		"userdetran","1234", "bddetran");
	// Checando a conexão
	if (mysqli_connect_errno($con)){
		echo "Erro ao conectar com a base de dados: ";
		mysqli_connect_error();
	}else{
		//echo "Conexão Aberta!!";
	}

	return $con;

}

function atualizarCarros($renavam, $marca, $placa, $chassi, $anoFabricacao, $anoModelo){

	$con = abrirConexao();

	$sql = "UPDATE Carros SET " .
		"renavam = '" . $renavam . "', " .
		"marca = '" . $marca . "', " .
		"placa = '" . $placa . "', " .
		"chassi = '" . $chassi . "', " .
		"anoFabricacao = '" . $anoFabricacao . "', " .
		"anoModelo = '" . $anoModelo . "');" ;


	///echo "<br><br>SQL: " . $sql;


	$lastInsertedid = -1;
	 
	if (mysqli_query($con, $sql)) {
			//echo "New record created successfully";
			$lastInsertedid = mysqli_insert_id($con);
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);

	return $lastInsertedid;

} 

?>
</html>
