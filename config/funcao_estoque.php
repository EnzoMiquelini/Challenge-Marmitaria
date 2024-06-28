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

    }



    function cadastrarProduto(){

        include 'conecta.php';

        $nome = $_POST['nome'];
        $categoria= $_POST['categoria'];
        $qnt_Estoque= $_POST['qnt_add'];
        $validade= new DateTime(strtotime($_POST['validade']));
        $compra= new DateTime(strtotime($_POST['compra']));
        $valor= $_POST['valor'];

        if($nome == ('') || $categoria == ('') || $qnt_Estoque == ('') || $validade == ('') || $compra == ('') || $valor == ('')){
            echo json_encode('Nao Cadastrado');
            return;
        }
        $stmt = $pdo->prepare('INSERT INTO produto (`id_categoria`, `nome`, `qnt_Estoque`, `data_validade`, `data_compra`, `valor`) VALUES (:ca, :na, :es, :va, :co, :vl)');
        $stmt->bindValue(':ca', $categoria);
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':es', $qnt_Estoque);
        $stmt->bindValue(':va', $validade->format('Y-m-d'));
        $stmt->bindValue(':co', $compra->format('Y-m-d'));
        $stmt->bindValue(':vl', $valor);
        $stmt->execute();
        
        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Cadastrado');
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
            echo json_encode ($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
        }
        
    }



    function lerProdutoCategoria(){
        
        include 'conecta.php';

        
        if(isset($_POST['id_produto'])){
            $id_produto = $_POST['id_produto'];

            $stmt = $pdo->prepare('SELECT `id_produto`, `nome`, `nome_categoria`, `qnt_Estoque`, `data_validade`, `data_compra` FROM produto INNER JOIN categorias_alimentos ON produto.id_categoria = categorias_alimentos.id_categoria WHERE id_produto =' . $id_produto);
            $stmt->execute();
        }else{
            $stmt = $pdo->prepare('SELECT `id_produto`, `nome`, `nome_categoria`, `qnt_Estoque`, `data_validade`, `data_compra` FROM produto INNER JOIN categorias_alimentos ON produto.id_categoria = categorias_alimentos.id_categoria');
            $stmt->execute();
        }    

        if ($stmt->rowCount() >= 1){
            
            // $data_certa = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // foreach ($data_certa as $data_certa){
            //     $data_certa 
                
            // }
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
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

        if($id_produto == ('') || $categoria == ('') || $nome == ('') || $qnt_Estoque == ('') || $data_validade == ('') || $data_compra == ('')){
            echo json_encode('Nao Editado');
            return;
        }
        
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
            echo json_encode('Nao Editado');
        }

    }



    function excluirProduto(){
        
        include 'conecta.php'; 

        $id_produto = $_POST['id_produto'];
        
        if($id_produto == ('')){
            echo json_encode("Nao Excluido");
            return;
        }

        $stmt = $pdo->prepare('DELETE FROM produto WHERE id_produto = '.$id_produto);
        $stmt->execute();

        echo json_encode('Excluido');

    }
?>