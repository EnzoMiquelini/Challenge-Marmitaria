<?php
    header('Content-Type: application/json'); 

    include 'conecta.php';

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];


    $stmt = $pdo->prepare('INSERT INTO categorias_alimentos (`nome`, `descricao`)VALUE(:na, :de)');
    $stmt->bindValue(':na', $nome);
    $stmt->bindValue(':de', $descricao);
    $stmt->execute();

    if ($stmt->rowCount() >= 1){
        echo json_encode('Categoria Salva com Sucesso');
    }else{
        echo json_encode('Falha ao Salvar Categoria');
    }
    
?>