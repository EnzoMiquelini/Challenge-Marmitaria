<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'inserir'){
            cadastrarPedido();
        }else if($_POST['action'] == 'ler'){
            lerPedido();
        }else if($_POST['action'] == 'excluir'){
            excluirPedido();
        }
    };


    
    function cadastrarPedido(){

        include 'conecta.php';
        
        $nome = $_POST['nome'];
        $categoria= $_POST['categoria'];
        $qnt_Estoque= $_POST['qnt_add'];
        $validade= $_POST['validade'];
        $compra= $_POST['compra'];
        
        $stmt = $pdo->prepare('INSERT INTO produto (`id_categoria`, `nome`, `qnt_Estoque`, `data_validade`, `data_compra`)VALUE(:ca, :na, :es, :va :co)');
        $stmt->bindValue(':ca', $categoria);
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':es', $qnt_Estoque);
        $stmt->bindValue(':va', $validade);
        $stmt->bindValue(':co', $compra);
        $stmt->execute();
        
        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Salvou!');
        }
    }



    function lerPedido(){
        
        include 'conecta.php';
        
        if(isset($_POST['id_produto'])){
            $id_produto = $_POST['id_produto'];
            $stmt = $pdo->prepare('SELECT * FROM produto WHERE id_produto =' . $id_produto);
            $stmt->execute();
        }else{
            
        $stmt = $pdo->prepare('SELECT * FROM produto');
        $stmt->execute();
        }
        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado!');
        }
    }



    function excluirPedido(){
        
        include 'conecta.php'; 

        $id_produto = $_POST['id_produto'];
        
        $stmt = $pdo->prepare('DELETE FROM produto WHERE id_produto = '.$id_produto);
        $stmt->execute();
    }
?>