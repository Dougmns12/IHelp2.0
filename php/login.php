<?php

    require(Colaboradore.php);
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $Colaboradores = new Colaboradores();
    $Colaboradores->email($login, $senha);
?>