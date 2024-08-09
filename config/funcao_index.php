<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){

        if($_POST['action'] == 'lerPedido'){
            lerPedido();
        }else if($_POST['action'] == 'lerEmAberto'){
            lerEmAberto();
        }else if($_POST['action'] == 'validade'){
            validade();
        }else if($_POST['action'] == 'editarStatus'){
            editarStatus();
        }else if($_POST['action'] == 'acabando'){
            produtosAcabando();
        }
    }

    function lerPedido(){

        include 'conecta.php';

        $stmt = $pdo->prepare('SELECT `nome`, `data_pedido`, `status` FROM pedido INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente ORDER BY `data_pedido` DESC LIMIT 5;');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Editado');
        }

    }

    function lerEmAberto(){

        include 'conecta.php';

        $stmt = $pdo->prepare('SELECT `nome`, `status`, `id_pedido` FROM pedido INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente ORDER BY `data_pedido` DESC LIMIT 5;');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao EmAberto');
        }

    }

    function validade(){
        
        include 'conecta.php';

        $stmt = $pdo->prepare('SELECT `nome`, `id_produto`, `data_validade` FROM `produto` ORDER BY `data_validade` DESC LIMIT 5;');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Validade');
        }

    }

    function editarStatus(){

        include 'conecta.php';

        $id_pedido = $_POST['id_pedido'];
        $status = $_POST['status'];

        $stmt = $pdo->prepare('UPDATE pedido SET `status` = (:st) WHERE id_pedido ='.$id_pedido);
        $stmt->bindValue(':st', $status);
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Alterado');
        }

    }

    function produtosAcabando(){

        include 'conecta.php';

        $stmt = $pdo->prepare('SELECT * FROM `produto` ORDER BY qnt_Estoque ASC LIMIT 5;');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Alterado');
        }

    }

?>