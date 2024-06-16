<?php

    include 'conecta.php';

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];


    if($nome != ('') || $descricao != ('')){
        $sql = "INSERT INTO categorias_alimentos (`nome`, `descricao`)VALUE(\"$nome\", \"$descricao\")";
        $exec = $pdo->query($sql);
    }

    
?>