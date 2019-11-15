<?php
    $codColaborador="";
    $login="";
    $senha="";
    $email="";
    $dataInicial="";
    $datafinal="";
    $consultar="";

    if(isset($_POST["codColaborador"])){
        $codColaborador = $_POST['codColaborador'];
    }

    if(isset($_POST["login"])){
        $login = $_POST['login'];
    }

    if(isset($_POST["senha"])){
        $senha = $_POST['senha'];
    }

    if(isset($_POST["email"])){
        $email = $_POST['email'];
    }

    if(isset($_POST["dataInicial"])){
        $dataInicial = $_POST['dataInicial'];
    }
    if(isset($_POST["dataFinal"])){
        $datafinal = $_POST['dataFinal'];
    }
    if(isset($_POST["consultar"])){
        $consultar = $_POST['consultar'];
    }

    function montarSQL(){
        global $codColaborador, $login, $senha, $email;

        $sql = "SELECT * FROM colaboradores";

        if($codColaborador="" || $login="" || $senha="" || $email="" $sql = "where";

            if($codColaborador!=""){
                $sql = "codColaborador like '%" . $codColaborador ."%'";
            }
            
            if($login!=""){
                $sql = "login like '%" . $login ."%'";
            }
            if($senha!=""){
                $sql = "senha like '%" . $senha ."%'";
            }
            if($email!=""){
                $sql = "email like '%" . $email ."%'";
            }
            
            if($dataInicial!=""){
                $sql = "dataInicial between" . $dataInicial ."%'";
            }
            $sql=";";
        }
        return $sql;
    }

    /////////////////////////////////////////////////////////////////////////////

    function consultarPessoa(){

        $con = mysqli_connect("localhost","usermysistema","1234", "mysistema");
        // Checando a conexão
        if (mysqli_connect_errno($con)){
        echo "Erro ao conectar com a base de dados: ";
        mysqli_connect_error();
        }else{
        //echo "Conexão Aberta";
        
        $sql = montarSQL();
        
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result)) {
        echo "<tr> \n";
               echo "<td><a href='alterar.php?cpfcons=" . $row["codColaborador"] . "'>" . $row["codColoborador"] . "</a></td> \n";
               echo "<td>" . $row["login"] . "</td> \n";
               echo "<td>" . $row["senha"] . "</td> \n";
               echo "<td>" . $row["email"] . "</td> \n";
               echo "</tr> \n";
            }
        
        }
        
        
        }
        
    }
        

?>