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

        $stmt = $pdo->prepare('SELECT * FROM categorias_alimentos');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Não Encontrado!');
        }
    }


    function editarCategoria(){
        
        include 'conecta.php';

        $id = $_POST['id_categoia'];

        $stmt = $pdo->prepare('UPDATE categorias_alimentos SET nome = '.$nome.', descricao = '.$descricao.' WHERE id_categoria = '.$id);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Não Encontrado!');
        }
    }


    function excluirCategoria(){

        include 'conecta.php';

        $id = $_POST['id_categoria'];

        $stmt = $pdo->prepare('DELETE categorias_alimentos WHERE id_categoria = '.$id);
        $stmt->execute();
    }
?>