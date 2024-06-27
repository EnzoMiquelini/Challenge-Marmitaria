<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'inserirNovo'){
            cadastrarNovoPedido();
        }elseif($_POST['action'] == 'inserir'){
            cadastrarPedido();
        }else if($_POST['action'] == 'ler'){
            lerPedido();
        }else if($_POST['action'] == 'excluir'){
            excluirPedido();
        }
    };

    

    function cadastrarNovoPedido(){


        include 'conecta.php';

        $stmt = $pdo->prepare('SELECT `id_pedido` `id_cliente`FROM pedido ORDER BY `id_pedido` DESC');
        $stmt->execute();

        
        if ($stmt->rowCount() >= 1){
            $id_cliente = (int)$stmt->fetchAll(PDO::FETCH_ASSOC) + 1;

            $stmt = $pdo->prepare('INSERT INTO pedido (`id_pedido`, `id_cliente`)VALUE(:ca, :cl)');
            $stmt->bindValue(':ca', $id_pedido);
            $stmt->bindValue(':cl', $id_pedido);
            $stmt->execute();

            if ($stmt->rowCount() >= 1){
                echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            }else{
                echo json_encode('Nao Cadastrou');
            }
        }else{
            $stmt = $pdo->prepare('INSERT INTO pedido (`id_pedido`, `id_cliente`)VALUE(:pe, :cl)');
            $stmt->bindValue(':pe', 1);
            $stmt->bindValue(':cl', 1);
            $stmt->execute();

            if ($stmt->rowCount() >= 1){
                echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            }else{
                echo json_encode('Nao Cadastrou');
            }
        }
        
    }
    
    function cadastrarPedido(){

        include 'conecta.php';
        
        $nome = $_POST['nome'];
        $categoria= $_POST['categoria'];
        $qnt_Estoque= $_POST['qnt_add'];
        $validade= $_POST['validade'];
        $compra= $_POST['compra'];
        
        $stmt = $pdo->prepare('INSERT INTO pedido_has_produto (`id_pedido`, `id_produto`, `valor_produto`)VALUE(:ca, :na, :es, :va :co)');
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