<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>login</title>
  <link href="img/icone.png" rel="icon">
  <link rel="stylesheet" type="text/css" href="css/entrar.css">
  <link rel="icon" type="imagem/png" href="images/logo.png" />

  <!-- fontes -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="content second-content">
          <div class="first-column">
            <h2 class="title-bemvindo">Olá amigo</h2>
            <p class="description description-primary">Está precisando atualizar seus login?</p>
            <p class="description description-primary">Insira um novo nome e pronto! Tudo resolvido.</p>
          </div> <!-- Primeira Coluna -->
          <div class="second-column">
            <h2 class="title title-second">Entrar</h2>
            <!-- FORMULÁRIO -->
            <form action="ask.php" name="login" id="formulariodeLogin" method="POST" class="form">          
              <label class="label-input" for="">
                <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/email.png">
                <input  type="email" name="email" value="" placeholder="Email">
              </label>
              <label class="label-input">
                <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/forgot-password.png">
                <input type="password" name="senha" value="" placeholder="Senha">
              </label>
              <label class="label-input" for="">
              <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/user.png">
              <input type="text" name="login" placeholder="Nome">
            </label>
            <input class="btn btn-second" type="submit" name="atualizar" value="Atualizar" ><a href="#"></a></input>
            </form>
          </div>
      </div>
      </div>
    </div>

  <!-- JavaScript Bibliotecas -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>

<?php

	$login = "";
	$senha = "";
	$email = "";


	if(isset($_POST["login"])){
    	$login = $_POST['login'];
   }

   	if(isset($_POST["senha"])){
    	$senha = $_POST['senha'];
   }
   	if(isset($_POST["email"])){
    	$email = $_POST['email'];
   }


	if($login != -1){
		$erro = atualizarPessoa($login, $senha, $email);

		if($erro != ""){
			echo "<font color='#00FF00' size='+2'> <b>Registro atualizado com sucesso!</b> </font>";

		}
	}
	

	function abrirConexao(){
		$con = mysqli_connect("localhost",
			"douglas","1234", "bdihelp");
		// Checando a conexão
		if (mysqli_connect_errno($con)){
			echo "Erro ao conectar com a base de dados: ";
			mysqli_connect_error();
		}else{
			//echo "Conexão Aberta!!";
		}

		return $con;

	}

	function atualizar($login, $senha, $email){

		$con = abrirConexao();

		$sql = "UPDATE Colaboradores SET " .
			"login = '" . $login . "', " .
			"senha = '" . $senha . "', " .
			"email = '" . $email . "';" ;


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