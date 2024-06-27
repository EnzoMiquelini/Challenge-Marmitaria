<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'inserirNovo'){
            // cadastrarNovoPedido();
        }else if($_POST['action'] == 'inputProduto'){
            inputProduto();
        }else if($_POST['action'] == 'cadastroPedido'){
            cadastroPedido();
        }else if($_POST['action'] == 'inserir'){
            cadastrarPedido();
        }else if($_POST['action'] == 'ler'){
            lerPedido();
        }else if($_POST['action'] == 'excluir'){
            excluirPedido();
        }
    };



    function cadastroPedido(){

        include 'conecta.php';

        $cpf = $_POST['cpf_pedido'];

        $stmt = $pdo->prepare('SELECT `CPF` FROM cliente` WHERE cpf ='.$cpf);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Sem CPF');
        }


    }



    // function cadastrarNovoPedido(){


    //     include 'conecta.php';

    //     $stmt = $pdo->prepare('SELECT `id_pedido` `id_cliente`FROM pedido ORDER BY `id_pedido` DESC');
    //     $stmt->execute();
        
    //     if ($stmt->rowCount() >= 1){
    //         $id_cliente = (int)$stmt->fetchAll(PDO::FETCH_ASSOC) + 1;

    //         $stmt = $pdo->prepare('INSERT INTO pedido (`id_pedido`, `id_cliente`)VALUE(:ca, :cl)');
    //         $stmt->bindValue(':ca', $id_cliente);
    //         $stmt->bindValue(':cl', $id_cliente);
    //         $stmt->execute();

    //         if ($stmt->rowCount() >= 1){
    //             echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    //         }else{
    //             echo json_encode('Nao Cadastrou');
    //         }
    //     }else{
    //         $stmt = $pdo->prepare('INSERT INTO pedido (`id_pedido`, `id_cliente`)VALUE(:pe, :cl)');
    //         $stmt->bindValue(':pe', 1);
    //         $stmt->bindValue(':cl', 1);
    //         $stmt->execute();

    //         if ($stmt->rowCount() >= 1){
    //             var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    //             exit;
    //             echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    //         }else{
    //             echo json_encode('Nao Cadastrou');
    //         }
    //     }
        
    // }



    function inputProduto(){

        include 'conecta.php';
        
        $nome_produto = $_POST['nome_produto'];


        $stmt = $pdo->prepare('SELECT `id_produto`, `nome`, `valor`, `data_validade` FROM `produto` WHERE `nome` = :na ORDER BY `data_validade` ASC LIMIT 1;');
        $stmt->bindValue(':na', $nome_produto);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
        }

    }



    function lerNovoPedido(){

        include "conecta.php";
        
        $stmt= $pdo->prepare('SELECT `id_pedido`, `valor_pedido` FROM pedido');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
        }

    }


    
    function cadastrarPedido(){

        include 'conecta.php';
        
        $id_pedido = $_POST['id_pedido'];
        $id_produto = $_POST['id_produto'];
        $qnt_produto= $_POST['qnt_produto'];
        $valor= $_POST['valor'];
        

        $stmt = $pdo->prepare('INSERT INTO pedido_produto (`id_pedido`, `id_produto`, `qnt_produto`, `valor_produto`)VALUE(:pe, :po, :qp, :va)');
        $stmt->bindValue(':pe', $id_pedido);
        $stmt->bindValue(':na', $id_produto);
        $stmt->bindValue(':qp', $qnt_produto);
        $stmt->bindValue(':va', $valor);
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
            
        // $stmt = $pdo->prepare('SELECT * FROM produto');
        // $stmt->execute();
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