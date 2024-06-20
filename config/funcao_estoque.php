<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'inserir'){
            cadastrarProduto();
        }else if($_POST['action'] == 'ler'){
            lerProduto();
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
        
        $stmt = $pdo->prepare('INSERT INTO produto (`id_categoria`, `nome`, `qnt_Estoque`, `data_validade`, `data_compra`)VALUE(:ca, :na, :es, :va :co)');
        $stmt->bindValue(':ca', $categoria);
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':es', $qnt_Estoque);
        $stmt->bindValue(':va', $validade);
        $stmt->bindValue(':co', $compra);
        $stmt->execute();
        
        if ($stmt->rowCount() >= 1){
            echo json_encode('Salvo com Sucesso');
        }else{
            echo json_encode('Falha ao Salvar');
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
            echo json_encode('Não Encontrado!');
        }
    }


    function editarProduto(){
        
        include 'conecta.php';

        $id_produto = $_POST['id_produto'];
        $nome = $_POST['nome'];
        $categoria = $_POST['id_caegoria'];
        $qnt_Estoque = $_POST['qnt_Add'];
        $data_validade = $_POST['validade'];
        $data_compra = $_POST['compra'];


        // var_dump($id_categoria, $nome, $descricao);
        // exit;

        $stmt = $pdo->prepare('UPDATE produto SET nome = '.$nome.', categoria = '.$categoria.', qnt_Estoque = '.$qnt_Estoque.', data_validade = '.$data_validade.', data_compra = '.$data_compra.' WHERE id_produto = '.$id_produto);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Não Encontrado!');
        }
    }


    function excluirProduto(){
        
        include 'conecta.php'; 

        $id_produto = $_POST['id_produto'];
        
        $stmt = $pdo->prepare('DELETE FROM produto WHERE id_produto = '.$id_produto);
        $stmt->execute();
    }
?>