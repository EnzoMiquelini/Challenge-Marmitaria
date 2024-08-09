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
        }else if($_POST['action'] == 'verMaisCliente'){
            verMaisCliente();
        }else if($_POST['action'] == 'verMaisPedido'){
            verMaisPedido();
        }

    }



    function cadastrarCliente(){

        include 'conecta.php';
        
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];
        $CPF = $_POST['CPF'];

        $CPF_certo = preg_match("/^[0-a-z9\s]{1,14}$/i",$CPF);

        if(!$CPF_certo){
            $CPF = str_replace(['.','-'],'',$CPF);
        }

        if($nome == ('') || $sobrenome == ('') || $telefone == ('') || $CPF == ('')){
            echo json_encode('Nao Cadastrou');
            return;
        }

        $stmt = $pdo->prepare('INSERT INTO cliente (`nome`, `sobrenome`,`telefone`, `CPF`)VALUE(:na, :so, :te, :cp)');
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':so', $sobrenome);
        $stmt->bindValue(':te', $telefone);
        $stmt->bindValue(':cp', $CPF);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Cadastrou');
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
            echo json_encode('Nao Encontrado');
        }

    }



    function editarCliente(){
        
        include 'conecta.php';

        $id_cliente = $_POST['id_cliente'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $telefone = $_POST['telefone'];

        if($id_cliente == ('') || $nome == ('') || $sobrenome == ('') || $telefone == ('')){
            echo json_encode('Nao Editou');
            return;
        }

        $stmt = $pdo->prepare('UPDATE cliente SET nome = :na , sobrenome = :so, telefone = :te WHERE id_cliente = '.$id_cliente);
        $stmt->bindValue(':na', $nome);
        $stmt->bindValue(':so', $sobrenome);
        $stmt->bindValue(':te', $telefone);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Editou');
        }

    }



    function excluirCliente(){
        
        include 'conecta.php'; 

        $id_cliente = $_POST['id_cliente'];

        if($id_cliente == ('')){
            echo json_encode('Nao Excluido');
            return;
        }

        $stmt = $pdo->prepare('DELETE FROM cliente WHERE id_cliente = '.$id_cliente);
        $stmt->execute();

        echo json_encode('Excluido');

    }


    function verMaisCliente(){

        include 'conecta.php';

        $id_cliente = $_POST['id_cliente'];

        $stmt = $pdo->prepare('SELECT * FROM cliente WHERE id_cliente ='.$id_cliente);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrou');
        }

    }


    function verMaisPedido(){

        include 'conecta.php';

        $id_cliente = $_POST['id_cliente'];

        $stmt = $pdo->prepare('SELECT * FROM pedido WHERE id_cliente = :cl ORDER BY data_pedido DESC;');
        $stmt->bindValue(':cl', $id_cliente);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrou');
        }

    }
?>