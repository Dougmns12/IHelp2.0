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
            <p class="description description-primary">Está perdido e não sabe para onde ir?</p>
            <p class="description description-primary">Cadastre-se e tire suas dúvidas</p>
            <a href="cadastro.php"><button class="btn btn-primary">Criar conta</button></a>
          </div> <!-- Primeira Coluna -->
          <div class="second-column">
            <h2 class="title title-second">Entrar</h2>
            <!-- FORMULÁRIO -->
            <form action="ask.php" name="entrar" id="formulariodeLogin" method="POST" class="form">          
              <label class="label-input" for="">
                <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/email.png">
                <input  type="email" name="email" value="" placeholder="Email">
              </label>
              
              <label class="label-input">
                <img class="modificando-icone" src="https://img.icons8.com/ios-glyphs/24/000000/forgot-password.png">
                <input type="password" name="senha" value="" placeholder="Senha">
              </label>
            <a class="password" href="#">esqueceu sua senha?</a>
            <input class="btn btn-second" type="submit" name="enviar" value="Entrar" ><a href="#"></a></input>
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

$email = $_POST['email'];
$senha = $_POST['senha'];
$enviar = $_POST['enviar'];

function Conexao(){
  $con = mysqli_connect("localhost","douglas","1234", "bdihelp");
  if (mysqli_connect_errno($con)){
    echo "Erro ao conectar com a base de dados: ";
    mysqli_connect_error();
  }else{
    //echo "Conexão Aberta!!";
  }

  return $con;

}
echo"AQUI";
  if(isset($enviar)){
    $verificando = mysql_query("SELECT * FROM Colaboradores WHERE login = '$login' AND senha = '$senha'") or die ("ERRO AO SELECIONAR");
      if (mysql_num_rows($verificando)<=-1) {
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
echo"OIOIOIOI";
          die();
      }else{
        setcookie("login", $login);

        header("location:ask.php");
      }
  }
?>
