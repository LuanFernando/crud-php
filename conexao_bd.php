<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeDB = "mais_malas";

    //Criando a conexão com banco de dados.
    $conn = mysqli_connect($host,$usuario,$senha,$nomeDB) or die(mysqli_error);

    //IF caso a conexão falhar
    if($conn->connect_error){
        die('A Conexão falhou! '.$conn->connect_error);
    }
?>