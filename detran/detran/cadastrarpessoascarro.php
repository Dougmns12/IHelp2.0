<html>
	<body><h2>Cadastrar Pessoa</h2>
		<form action="cadastrarpessoascarro.php" name="formInserirPessoa" 
		id="formInserirPessoa" method="POST">
		<table>
			<tr>
				<td colspan="2"><b><a href="index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td><b>FKCPF: </b></td>
				<td> <input type="text" name="fkcpf" value=""> </td>
			</tr>
			<tr>
				<td><b>FKRENAVAM: </b></td>
				<td> <input type="text" name="fkrenavam" value=""> </td>
			</tr>
			<tr>
				<td><b>DATA: </b></td>
				<td> <input type="text" name="data" value=""> </td>
			</tr>
			<tr>
				<td><b>HORA: </b></td>
				<td> <input type="text" name="hora" value=""> </td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="inserir" value="Inserir">
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>

<?php

	$fkcpf = "";
	$fkrenavam = "";
	$data = "";
	$hora = "";


	if(isset($_POST["fkcpf"])){
    	$fkcpf = $_POST['fkcpf'];
   }

   	if(isset($_POST["fkrenavam"])){
    	$fkrenavam = $_POST['fkrenavam'];
   }
   	if(isset($_POST["data"])){
    	$data = $_POST['data'];
   }
   if(isset($_POST["hora"])){
    $hora = $_POST['hora'];
}   


	if($fkrenavam != ""  && $fkcpf  != ""){
		$erro = adicionarPessoa($fkcpf, $fkrenavam, $data, $hora);

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

	function adicionarPessoa($fkcpf, $fkrenavam, $data, $hora){

		$con = abrirConexao();

		$sql = "INSERT INTO Pessoas_Carros(fkcpf, fkrenavam, data, hora) VALUES (" .
			"'" . $fkcpf . "', " .
			"'" . $fkrenavam . "', " .
			"'" . $data . "', " .
			"'" . $hora . "');" ;


		echo "<br><br>SQL: " . $sql;


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