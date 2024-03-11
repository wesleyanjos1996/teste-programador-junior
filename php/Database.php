<?php

$connect = new PDO('mysql:host=localhost;dbname=dashboard_ramal', 'usuario', 'senha');

// Dados em ramal
$ramal = $connect->prepare('select * from ramais');
$ramal->execute();
$results = $ramal->fetchAll(PDO::FETCH_ASSOC);
echo mb_strtoupper('<h1 style="text-align: center;">Ramal</h1><hr>');

if (!empty($results)) {
    foreach ($results as $row) {
        $created = date('d/m/Y H:i:s', strtotime($row['created_at']));
        echo '<pre>';
        echo mb_strtoupper("
            id: $row[idramal]
            número: $row[numero]
            nome: $row[nome]
            ip: $row[ip]
            status: $row[status]
            created: $created<br>
        ");
        echo '</pre>';
    }
} else {
    echo 'Nenhum registro encontrado !';
}

echo '<hr>';

// Dados em fila
$fila = $connect->prepare('select * from filas');
$fila->execute();
$result = $fila->fetchAll(PDO::FETCH_ASSOC);
echo mb_strtoupper('<h1 style="text-align: center;">Fila</h1><hr>');

if ($result) {    
    foreach ($result as $row) {
        $created = date('d/m/Y H:i:s', strtotime($row['created_at']));
        echo '<pre>';
        echo mb_strtoupper("
            id: $row[idfila] 
            número: $row[numero] 
            status: $row[status]
            user: $row[user]
            created: $created<br>
        ");
        echo '</pre>';
    }
} else {
    echo "Nenhum registro encontrado !";
}

$connect = null;

?>