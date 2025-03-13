<?php
$jsonFile = 'dados.json';

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $dados = json_decode($jsonData, true);

        if (isset($dados[$index])) {
            unset($dados[$index]);
            $dados = array_values($dados); // Reorganiza os índices

            file_put_contents($jsonFile, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }
}

header('Location: index.php');
exit();
