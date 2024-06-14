<?php

    include 'conecta.php';

    $sql = "SELECT * FROM categoria_alimentos";
    $exec = $pdo->query($sql);

    while($reg = $exec->fetch()){
        echo $reg["id"] . "-" .  $reg["nome"] . "-" . $reg["descricao"]. "<br/>";
        echo "<a href=''>";
    }

?>