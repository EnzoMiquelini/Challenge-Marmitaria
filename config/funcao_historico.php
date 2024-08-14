<?php
    header('Content-Type: application/json');

    if(isset($_POST['action'])){
        if($_POST['action'] == 'lerHistoricoPedidos'){
            lerHistoricoPedidos();
        }
    }

    function lerHistoricoPedidos(){

        include 'conecta.php';

        $stmt = $pdo->prepare('SELECT `nome`,`sobrenome`, `data_pedido`, `tipo_pgto`, `entrega`, `valor_pedido`, `status` FROM pedido INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente ORDER BY `data_pedido`;');
        $stmt->execute();

        if ($stmt->rowCount() >= 1){
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Sem Pedido');
        }
    }


?>