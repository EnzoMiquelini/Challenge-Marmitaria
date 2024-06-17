<?php

    include 'conecta.php';

    $sql = "SELECT * FROM categorias_alimentos";
    $exec = $pdo->query($sql);

    while($reg = $exec->fetch()){
        echo $reg["id_categoria"] . "-" .  $reg["nome"] . "-" . $reg["descricao"]. "<br/>";
        echo "<a href=''>";
    }

?>