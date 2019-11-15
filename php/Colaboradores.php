<?php
/**
*  CLASSE QUE ABSTRAI A TABELA
*  USUÁRIO
*
***/
class Colaboradores
{
	//propriedades
	public $conexao;
	public $codColaborador;
	public $email;
	public $senha;
	public $login;

	//método construtor
	function Colaboradores() {
		$conexao = null;
		//conexao com o banco
		require("conexao.php");
		$this->conexao = $conexao;
		
	}
	// ------------------------ //
	//seta os valores das variáveis da classe 
	function inicializar($email, $senha, $login) 
	{
		//conexao com o banco
		require("conexao.php");
		$this->conexao = $conexao;
		//setando as propriedadees
		$this->email = $email;
		$this->senha = $senha;
		$this->login = $login;
	}
	// ------------------------ //

	//método para cadastrar o usuário
	//no banco
	public function cadastrar()  {
		$sql = " INSERT INTO Colaboradores (email, senha, login) VALUES ('". $this->email ."' , '". $this->senha ."', '". $this->login ."' ) ";
		echo $sql;
		$resultado = mysqli_query($this->conexao, $sql);

		//echo $sql."<br />";
		//var_dump($resultado);

		if(!$resultado) { return false; }
		return true;

	}
	// ------------------------ //
	//Retorna todos os usuários do sistema
	public function listarColaboradores() {
		$sql = "SELECT codColaborador, email, senha, login FROM Colaboradores";
		if ($result = mysqli_query($this->conexao, $sql)) {
			//pegando linha por linha
			while($linha = $result->fetch_assoc()) {
				
				echo $linha["login"]." , ".$linha["codColaborador"]." <br />";

				$user = new Colaboradores($linha["email"], $linha["senha"], $linha["login"]);


			}
		}

	}


	public function login ($email, $senha){

		$sql = "SELECT * FROM Colaboradores WHERE email='$email' AND senha='$senha'";
		$resultado = mysqli_query($this->conexao, $sql);
		$dados=$resultado->fetch_assoc();
		if($dados!=NULL){
			$this->inicializar($dados["email"],$dados["senha"],$dados["login"]);
			$this->codColaborador = $dados["codColaborador"];
			return true;
		}else{
			//echo "EMAIL OU SENHA INVÁLIDOS";
			return false;
		}

		//var_dump($resultado); // exibe os dados

	}

	// ------------- //
}


?>