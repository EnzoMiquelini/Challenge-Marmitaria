<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'inserir'){
            cadastrarCliente();
        }else if($_POST['action'] == 'ler'){
            lerCliente();
        }else if($_POST['action'] == 'editar'){
            editarCliente();
        }else if($_POST['action'] == 'excluir'){
            excluirCliente();
        }
    };

    function cadastrarCliente(){

        include 'conecta.php';
        
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
        $CPF = $_POST['CPF'];

        $stmt = $pdo->prepare('INSERT INTO cliente (`nome`, `sobrenome`,`telefone`, `CPF`)VALUE(:na, :so, :te, :cp)');
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':so', $sobrenome);
        $stmt->bindValue(':te', $telefone);
        $stmt->bindValue(':cp', $CPF);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode('Salvo com Sucesso');
        }else{
            echo json_encode('Falha ao Salvar');
        }
    }


    function lerCliente(){
        
        include 'conecta.php';
        
        if(isset($_POST['id_cliente'])){
            $id_cliente = $_POST['id_cliente'];
            $stmt = $pdo->prepare('SELECT * FROM cliente WHERE id_cliente =' . $id_cliente );
            $stmt->execute();
        }else{
        $stmt = $pdo->prepare('SELECT * FROM cliente');
        $stmt->execute();
        }
        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Não Encontrado!');
        }
    }


    function editarCliente(){
        
        include 'conecta.php';

        $id_cliente = $_POST['id_cliente'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['descricao'];

        // var_dump($id_cliente, $nome, $descricao);
        // exit;

        $stmt = $pdo->prepare('UPDATE cliente SET nome = '.$nome.', descricao = '.$sobrenome.', telefone = '.$telefone.' WHERE id_cliente = '.$id_cliente);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Não Encontrado!');
        }
    }


    function excluirCliente(){
        
        include 'conecta.php'; 

        $id_cliente = $_POST['id_cliente'];

        $stmt = $pdo->prepare('DELETE FROM cliente WHERE id_cliente = '.$id_cliente);
        $stmt->execute();

    }
?>