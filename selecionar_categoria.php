<?php
    header('Content-Type: application/json'); 

    include 'conecta.php';

    $stmt = $pdo->prepare('SELECT * FROM categorias_alimentos');
    $stmt->execute();

    if ($stmt->rowCount() >= 1){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }else{
        echo json_encode('Nenhuma Categoria Encontrada');
    }
    
?>