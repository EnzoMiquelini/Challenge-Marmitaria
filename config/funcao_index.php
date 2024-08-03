<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){

        if($_POST['action'] == 'lerPedido'){
            lerPedido();
        }else if($_POST['action'] == 'lerEmAberto'){
            lerEmAberto();
        }else if($_POST['action'] == 'validade'){
            validade();
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

        $stmt = $pdo->prepare('SELECT `nome`, `status` FROM pedido INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente ORDER BY `data_pedido` DESC LIMIT 5;');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao EmAberto');
        }

    }

    function validade(){
        
        include 'conecta.php';

        $stmt = $pdo->prepare('SELECT `nome`, `id_produto`, `data_validade` FROM `produto` ORDER BY `data_validade` DESC;');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Nao Validade');
        }

    }


?>