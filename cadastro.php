<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
    <link rel="icon" type="imagem/png" href="img/icone.png" />
  	<title>Entrando no IHelp</title>
    <link rel="stylesheet" type="text/css" href="css/entrar.css">
    <!-- fontes -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
<body>
  
    <div class="container">
      <div class="content first-content">
        <div class="first-column">
          <h2 class="title-bemvindo">Seja Bem-Vindo</h2>
          <p class="description description-primary">Está com duvida? Clique em entrar</p>
          <a href="login.php"><button class="btn btn-primary">Entrar</button></a>
        </div> <!-- Primeira Coluna -->
        <div class="second-column">
          <h2 class="title-second">Criar conta</h2>
          <div class="description description-second">
            <p>Coloque suas informações abaixo</p>
          </div>
          <form class="form" action="cadastro.php" method="POST">
            <label class="label-input" for="">
              <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/user.png">
              <input type="text" name="login" placeholder="Nome">
            </label>
            <label class="label-input" for="">
              <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/email.png">
              <input type="email" name="email" placeholder="Email">
            </label>
            <label class="label-input">
              <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/forgot-password.png">
              <input type="password" name="senha" placeholder="Senha">
            </label>
          <a href=""><input type="submit" value="cadastrar" class="btn btn-second" /></a>
          </form>
        </div>
      </div>
</body>
</html>

<?php

	$login = "";
	$email = "";
	$senha = "";


   	if(isset($_POST["login"])){
    	$login = $_POST['login'];
   }
     if(isset($_POST["email"])){
    	$email = $_POST['email'];
   }
   	if(isset($_POST["senha"])){
    	$senha = $_POST['senha'];
   }

	if($login != -1){
		$erro = cadastrarColaborador($login, $email, $senha);
		if($erro != ""){
      //echo "<font color='#00FF00' size='+2'> <b>Registro inserido com sucesso!</b> </font>";
		}
	}
	

	function abrirConexao(){
		$con = mysqli_connect("localhost",
			"douglas","1234", "bdihelp");
		// Checando a conexão
		if (mysqli_connect_errno($con)){
			//echo "Erro ao conectar com a base de dados: ";
			mysqli_connect_error();
		}else{
			//echo "Conexão Aberta!!";
		}

		return $con;

	}

	function cadastrarColaborador($login, $email, $senha){

		$con = abrirConexao();

		$sql = "INSERT INTO Colaboradores (login, email, senha) VALUES (" .
			"'" . $login . "', " .
			"'" . $email . "', " .
			"'" . $senha . "');" ;


		//echo "<br><br>SQL: " . $sql;


		$lastInsertedid = -1;
	     
	    if (mysqli_query($con, $sql)) {
	 	   	//echo "New record created successfully";
	 	   	$lastInsertedid = mysqli_insert_id($con);
		} else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);

		return $lastInsertedid;

	} 

?>
