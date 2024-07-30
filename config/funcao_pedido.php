<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'inserirNovo'){
            // cadastrarNovoPedido();
        }else if($_POST['action'] == 'inputProduto'){
            inputProduto();
        }else if($_POST['action'] == 'lerClientePedido'){
            lerClientePedido();
        }else if($_POST['action'] == 'inserirProdutoPedido'){
            inserirProdutoPedido();
        }else if($_POST['action'] == 'criarPedido'){
            criarPedido();
        }else if($_POST['action'] == 'lerPedido'){
            lerPedido();
        }else if($_POST['action'] == 'lerProduto'){
            lerProduto();
        }else if($_POST['action'] == 'lerPedidoProduto'){
            lerPedidoProduto();
        }else if($_POST['action'] == 'excluir'){
            // excluirPedido();
        }
    }



    function lerClientePedido(){

        include 'conecta.php';

        $cpf = $_POST['cpf_pedido'];

        $cpf_certo = preg_match("/^[0-a-z9\s]{1,14}$/i",$cpf);

        if(!$cpf_certo){
            $cpf = str_replace(['.','-'],'',$cpf);
        }

        $stmt = $pdo->prepare('SELECT `id_cliente`, `nome`, `sobrenome`, `telefone`, `CPF` FROM cliente WHERE cpf = '.$cpf);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Sem CPF');
        }


    }



    function criarPedido(){

        include 'conecta.php';

        $id_cliente = $_POST['id_cliente'];
        $data_pedido = new DateTime();

        $stmt = $pdo->prepare('INSERT INTO pedido (`id_cliente`, `data_pedido`) VALUES (:id, :da)');
        $stmt->bindValue(':id', $id_cliente[0]);
        $stmt->bindValue(':da', $data_pedido->format('Y-m-d H:i:s'));
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Cadastrou');
        }

    }

    function lerPedido() {
        
        include 'conecta.php';

        $id_cliente = $_POST['id_cliente'];

        $stmt = $pdo->prepare('SELECT `id_pedido`, `id_cliente` FROM pedido WHERE id_cliente = :cl ORDER BY `id_pedido` DESC LIMIT 1;');
        $stmt->bindValue(':cl', $id_cliente[0]);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
        }

    }
        



    function inputProduto(){

        include 'conecta.php';
        
        $nome_produto = $_POST['nome_produto'];

        if($nome_produto == ('')){
            $stmt = $pdo->prepare('SELECT `id_produto`, `nome`, `valor`, `data_validade` FROM `produto` ORDER BY `data_validade` ASC LIMIT 1;');
            $stmt->execute();
            return;
        }
        $stmt = $pdo->prepare('SELECT `id_produto`, `nome`, `valor`, `data_validade` FROM `produto` WHERE `nome` = :na ORDER BY `data_validade` ASC LIMIT 1;');
        $stmt->bindValue(':na', $nome_produto);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
        }

    }




    function lerProduto(){

        include "conecta.php";

        $nome_produto = $_POST['nome_produto'];

        $stmt = $pdo->prepare("SELECT `id_produto`, `nome`, `valor`, `data_validade` FROM produto WHERE `nome` = :pr ORDER BY `data_validade` ASC LIMIT 1" );
        $stmt->bindValue(':pr', $nome_produto);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado');
        }

    }


    // function lerNovoPedido(){

    //     include "conecta.php";
        
    //     $stmt= $pdo->prepare('SELECT `id_pedido`, `valor_pedido` FROM pedido');
    //     $stmt->execute();

    //     if ($stmt->rowCount() >= 1){
    //         echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    //     }else{
    //         echo json_encode('Nao Encontrado');
    //     }

    // }


    
    function inserirProdutoPedido(){

        include 'conecta.php';
        
        $id_pedido = $_POST['id_pedido'];
        $id_produto = $_POST['id_produto'];
        $qnt_produto= $_POST['qnt_produto'];
        $valor_produto= $_POST['valor_produto'];
        
        $stmt = $pdo->prepare('INSERT INTO pedido_produto (`id_pedido`, `id_produto`, `qnt_produto`, `valor_produto`)VALUE(:pe, :po, :qe, :vr)');
        $stmt->bindValue(':pe', $id_pedido);
        $stmt->bindValue(':po', $id_produto);
        $stmt->bindValue(':qe', $qnt_produto);
        $stmt->bindValue(':vr', $valor_produto);
        $stmt->execute();
        
        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Salvou!');
        }
    }
    



    function lerPedidoProduto(){
        
        include 'conecta.php';

        $id_pedido = $_POST['id_pedido'];
       
        $stmt = $pdo->prepare('SELECT `idPedido_produto`, `nome`, `qnt_produto`, `valor_produto` FROM pedido_produto INNER JOIN produto ON pedido_produto.id_produto = produto.id_produto WHERE id_pedido = :pe ORDER BY `idPedido_produto` DESC');
        $stmt->bindValue(':pe', $id_pedido);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Encontrado!');
        }
    }

    // function excluirPedido(){
        
    //     include 'conecta.php'; 

    //     $id_produto = $_POST['id_produto'];
        
    //     $stmt = $pdo->prepare('DELETE FROM produto WHERE id_produto = '.$id_produto);
    //     $stmt->execute();
    // }
?>