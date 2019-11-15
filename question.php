<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>IHelp</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="icon" type="imagem/png" href="images/logo.png" />

  <!-- Favicons -->
  <link href="img/icone.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  

</head>

<body>

  <!--==========================
  Cabeça
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="index.html" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li><a href="perguntar.html">Perguntar</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="ask section-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5 offset-lg-1">
            <div class="box1">
                <h4 class="title"><a href="">Faça sua pergunta</a></h4>
                <form action="POST">
            <input type="text" name="pergunta" placeholder="Digite sua pergunta" class="texto questionbox"/>
            <input type="submit" name="perguntar" value="Perguntar" class="button"></a>
            <select class="button2" >
                    <option value="eventos">Eventos</option>
                    <option value="eletromecânica">Eletromecânica</option>
                    <option value="informatica">Informática</option>
            </select>
            </form>
            </div>
        </div>
      </div>
    </section>

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