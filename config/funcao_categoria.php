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
        }
    };

    function cadastrarCategoria(){

        include 'conecta.php';

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];


        $stmt = $pdo->prepare('INSERT INTO categorias_alimentos (`nome`, `descricao`)VALUE(:na, :de)');
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':de', $descricao);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode('Salvo com Sucesso');
        }else{
            echo json_encode('Falha ao Salvar');
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
            echo json_encode('Não Encontrado!');
        }
    }


    function editarCategoria(){
        
        include 'conecta.php';

        $id_categoria = $_POST['id_categoria'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        var_dump($id_categoria, $nome, $descricao);
        exit;

        $stmt = $pdo->prepare('UPDATE categorias_alimentos SET nome = '.$nome.', descricao = '.$descricao.' WHERE id_categoria = '.$id_categoria);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Não Encontrado!');
        }
    }


    function excluirCategoria(){
        
        include 'conecta.php'; 

        $id_categoria = $_POST['id_categoria'];
        
        $stmt = $pdo->prepare('DELETE FROM categorias_alimentos WHERE id_categoria = '.$id_categoria);
        $stmt->execute();
    }
?>