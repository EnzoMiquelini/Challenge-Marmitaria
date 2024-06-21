<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'inserir'){
            cadastrarProduto();
        }else if($_POST['action'] == 'ler'){
            lerProduto();
        }else if($_POST['action'] == 'lerProdutoCategoria'){
        lerProdutoCategoria();
        }else if($_POST['action'] == 'editar'){
            editarProduto();
        }else if($_POST['action'] == 'excluir'){
            excluirProduto();
        }
    };

    function cadastrarProduto(){

        include 'conecta.php';
        
        $nome = $_POST['nome'];
        $categoria= $_POST['categoria'];
        $qnt_Estoque= $_POST['qnt_add'];
        $validade= $_POST['validade'];
        $compra= $_POST['compra'];
        
        $stmt = $pdo->prepare('INSERT INTO produto (`id_categoria`, `nome`, `qnt_Estoque`, `data_validade`, `data_compra`) VALUES (:ca, :na, :es, :va, :co)');
        $stmt->bindValue(':ca', $categoria);
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':es', $qnt_Estoque);
        $stmt->bindValue(':va', $validade);
        $stmt->bindValue(':co', $compra);
        $stmt->execute();
        
        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Salvo!');
        }
    }


    function lerProduto(){
        
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

    function lerProdutoCategoria(){
        
        include 'conecta.php';
        
            $stmt = $pdo->prepare('SELECT `id_produto`, `nome`, `qnt_Estoque`, `data_validade`, `data_compra`, `nome_categoria` FROM produto INNER JOIN categorias_alimentos ON produto.id_categoria = categorias_alimentos.id_categoria');
            $stmt->execute();
            
        
        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado!');
        }
    }


    function editarProduto(){
        
        include 'conecta.php';

        $id_produto = $_POST['id_produto'];
        $categoria = $_POST['id_categoria'];
        $nome = $_POST['nome'];
        $qnt_Estoque = $_POST['qnt_add'];
        $data_validade = $_POST['validade'];
        $data_compra = $_POST['compra'];


        $stmt = $pdo->prepare('UPDATE produto SET id_categoria = :ca, nome = :na, qnt_Estoque = :es, data_validade = :va, data_compra = :co WHERE id_produto = '.$id_produto);
        $stmt->bindValue(':ca', $categoria);
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':es', $qnt_Estoque);
        $stmt->bindValue(':va', $data_validade);
        $stmt->bindValue(':co', $data_compra);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado!');
        }
    }


    function excluirProduto(){
        
        include 'conecta.php'; 

        $id_produto = $_POST['id_produto'];
        
        $stmt = $pdo->prepare('DELETE FROM produto WHERE id_produto = '.$id_produto);
        $stmt->execute();
    }
?>