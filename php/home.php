<?php
//----------------------------------------//
//verificando se o usuário está logado
session_start();
if(!$_SESSION['logado']) {
	header("Location: login.html");
	exit();
}
require("usuario.php");
$usuario = new Usuario();
$usuario = unserialize($_SESSION["usuario"]);
// ---------------------------------------------- //
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="icon" type="imagem/png" href="lapis_icon.png" />

	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>


    <title>Selecionados</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="estilo.css">

  </head>
    
<!---------------------------------BODY---------------------------------------->
    
  <body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-info" >
      <a class="navbar-brand" href="index.html"><strong>Início</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>Documentos</strong></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="inform.html"> O que é a oficina </a>
               <a class="dropdown-item" href="selecionados.html"> Lista dos oficineiros</a>
            </div>
          </li>
        </ul>
       </div>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>
            	<?php echo $usuario->nome; ?>
	
            </strong></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="#"> <?php echo $usuario->email; ?> </a>
               <a class="dropdown-item" href="login.php?sair=true"> SAIR</a>
            </div>
          </li>
        </ul>
       </div>


     </nav>
      
<!---------------------------------LISTA DE APROVADOS---------------------------------------->
      
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
          <br />
                <p class="centralizar"><img src="logo.png" width="30%" class="img-fluid" alt="" /></p>
            </div>
        </div>

        <div class="col-md-8 offset-md-2" class="justificar">
            <table class="table table-hover" >
                
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">OFICINEIROS SELECIONADOS</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Abraão Dantas do Amaral Silva</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Adriano Fernandes de Oliveira</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Alannis Beatriz de Barros Dias</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Anderson Figueredo da Silva</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Antonio Cirilo da Silva Neto</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Ariana Vitória Lucas Bonfim</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Claudielle Samara Oliveira de Alcantara</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Danielle Fernandes do Nascimento</td>
                  </tr> 
                  <tr>
                    <th scope="row">9</th>
                    <td>Eules de Moura Lima</td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>Flavio José Alves</td>
                  </tr>
                  <tr>
                    <th scope="row">11</th>
                    <td>Giselle Albuquerque Gonzaga</td>
                  </tr>
                  <tr>
                    <th scope="row">12</th>
                    <td>Greyce Kelly Nascimento da Costa</td>
                  </tr>
                  <tr>
                    <th scope="row">13</th>
                    <td>Gustavo Henrique Martins</td>
                  </tr>
                  <tr>
                    <th scope="row">14</th>
                    <td>Henrique Targino de Lima</td>
                  </tr>
                  <tr>
                    <th scope="row">15</th>
                    <td>Joana D'arc Costa dos Santos</td>
                  </tr>
                  <tr>
                    <th scope="row">16</th>
                    <td>José Davi Viana Francelino</td>
                  </tr>
                  <tr>
                    <th scope="row">17</th>
                    <td>Júlia Hilary Oliveira da Silva</td>
                  </tr>
                  <tr>
                    <th scope="row">18</th>
                    <td>Lara Ryane da Silva Menezes</td>
                  </tr>
                  <tr>
                    <th scope="row">19</th>
                    <td>Larissa Andressa Pereira Silva</td>
                  </tr>
                  <tr>
                    <th scope="row">20</th>
                    <td>Maria Naiany Pereira soares</td>
                  </tr>
                  <tr>
                    <th scope="row">21</th>
                    <td>Maria Raquel Basilio Dantas</td>
                  </tr>
                  <tr>
                    <th scope="row">22</th>
                    <td>Maria Viviane do Nascimento</td>
                  </tr>
                   <tr>
                    <th scope="row">23</th>
                    <td>Marina Noberto de Oliveira</td>
                  </tr>
                   <tr>
                    <th scope="row">24</th>
                    <td>Melina Rosendo da Silva</td>
                  </tr>
                   <tr>
                    <th scope="row">25</th>
                    <td>Mikaelly Loise Lima Silva</td>
                  </tr>
                  <tr>
                    <th scope="row">26</th>
                    <td>Milenna Nunes Marinho</td>
                  </tr>
                  <tr>
                    <th scope="row">27</th>
                    <td>Natália Cristina Tertuliano Melo</td>
                  </tr>
                  <tr>
                    <th scope="row">28</th>
                    <td>Nicelia Rosa da Silva Conceição</td>
                  </tr>
                  <tr>
                    <th scope="row">29</th>
                    <td>Nícolas de Andrade Santos</td>
                  </tr>
                   <tr>
                    <th scope="row">30</th>
                    <td>Wanderson Cleiton Bento da Silva</td>
                  </tr>
                </tbody>
                
            </table> 
        </div><!--fim do container da tabela-->
   </div><!--fim do container principal -->
      
<!---------------------------------SCRIPT---------------------------------------->
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
  </body>
</html>
