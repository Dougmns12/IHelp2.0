 <html>
	<body><h2>Excluir Pessoa</h2>
		<form action="excluir.php" name="formExcluirPessoa" 
		id="formExcluirPessoa" method="POST">
		<table>
			<tr>
				<td colspan="2"><b><a href="index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td><b>CPF: </b></td>
				<td> <input type="text" name="cpf" value=""> </td>
			</tr>
			<tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="excluir" value="Excluir">
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>

<?php

	$cpf = "";

	if(isset($_POST["cpf"])){
    	$cpf = $_POST['cpf'];
   }


	if($cpf != ""){
		$erro = excluirPessoa($cpf);

		if($erro != -1){
			echo "<font color='#00FF00' size='+2'> <b>Registro excluído com sucesso!</b> </font>";

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

	function excluirPessoa($cpf){

		$con = abrirConexao();

		$sql = "DELETE FROM Pessoas WHERE cpf = '" . $cpf . "' ; ";


		//echo "<br><br>SQL: " . $sql;


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