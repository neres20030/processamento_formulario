<?php
$jsonFile = 'dados.json';

// Verifica se o arquivo já existe e lê os dados atuais
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $dados = json_decode($jsonData, true);
    if ($dados === null) {
        $dados = [];
    }
} else {
    $dados = [];
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoDado = [
        "nome" => trim($_POST['nome']),
        "sobrenome" => trim($_POST['sobrenome']),
        "idade" => trim($_POST['idade'])
    ];

    // Verifica se a pessoa já existe (mesmo nome e sobrenome)
    foreach ($dados as $pessoa) {
        if ($pessoa['nome'] === $novoDado['nome'] &&
            $pessoa['sobrenome'] === $novoDado['sobrenome']) {
            echo "<script>alert('Esta pessoa já está cadastrada!'); window.location.href='index.php';</script>";
            exit();
        }
    }

    // Se não existir, adiciona e salva
    $dados[] = $novoDado;
    file_put_contents($jsonFile, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='index.php';</script>";
    exit();
}
?>
