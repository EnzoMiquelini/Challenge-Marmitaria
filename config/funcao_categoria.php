<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){

        if($_POST['action'] == 'inserir'){
            cadastrarCategoria();
        }else if($_POST['action'] == 'ler'){
            lerCategoria();
        }else if($_POST['action'] == 'editar'){
            editarCategoria();
        }else if($_POST['action'] == 'excluir'){
            excluirCategoria();
        }else if($_POST['action'] == 'verMais'){
            verMaisCategoria();
        }

    }

    function cadastrarCategoria(){

        include 'conecta.php';

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        if($nome == ('') || $descricao ==('')){
            echo json_encode('Nao Cadastrou');
            return;
        }

        $stmt = $pdo->prepare('INSERT INTO categorias_alimentos (`nome_categoria`, `descricao`)VALUE(:na, :de)');
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':de', $descricao);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Cadastrou');
        }
        
    }



    function lerCategoria(){
       
        include 'conecta.php';

        if(isset($_POST['id_categoria'])){
            $id_categoria = $_POST['id_categoria'];
            
            $stmt = $pdo->prepare('SELECT * FROM categorias_alimentos WHERE id_categoria =' . $id_categoria );
            $stmt->execute();
        }else{
            $stmt = $pdo->prepare('SELECT * FROM categorias_alimentos');
            $stmt->execute();
        }

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
        }

    }



    function editarCategoria(){
        
        include 'conecta.php';

        $id_categoria = $_POST['id_categoria'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        if($id_categoria == ('') || $nome == ('') || $descricao == ('')){
            echo json_encode('Nao Editado');
            return;
        }

        $stmt = $pdo->prepare('UPDATE categorias_alimentos SET nome_categoria = :na, descricao = :de WHERE id_categoria = '.$id_categoria);
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':de', $descricao);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Editado');
        }

    }



    function excluirCategoria(){
        
        include 'conecta.php'; 

        $id_categoria = $_POST['id_categoria'];
        
        if($id_categoria == ('')){
            echo json_encode('Nao Excluido');
            return;
        }

        $stmt = $pdo->prepare('DELETE FROM categorias_alimentos WHERE id_categoria = '.$id_categoria);
        $stmt->execute();

        echo json_encode('Excluido');
          
    }

    function verMaisCategoria(){

        include 'conecta.php';

        $nome_categoria = $_POST['nome_categoria'];

        var_dump($_POST);
        exit;

        $stmt = $pdo->prepare('SELECT `nome_categoria`, `descricao`, `nome`, `qnt_Estoque`, `data_validade`, `data_compra`, `valor` FROM produto INNER JOIN categorias_alimentos ON  produto.id_categoria = categorias_alimentos.id_categoria WHERE nome_categoria ='.$nome_categoria);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrou');
        }

    }
?>