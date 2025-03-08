<?php
$jsonFile = 'dados.json';

// Verifica se o arquivo já existe e lê os dados atuais
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $dados = json_decode($jsonData, true);
    if ($dados === null) {
        echo "Erro ao decodificar JSON existente!<br>";
        $dados = [];
    }
} else {
    echo "Arquivo JSON não encontrado, criando um novo.<br>";
    $dados = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoDado = [
        "nome" => $_POST['nome'],
        "sobrenome" => $_POST['sobrenome'],
        "idade" => $_POST['idade']
    ];

    echo "Recebendo dados: ";
    print_r($novoDado);
    echo "<br>";

    $dados[] = $novoDado;

    // Salvar no JSON e testar se ocorreu algum erro
    if (file_put_contents($jsonFile, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
        echo "Erro ao salvar no JSON!<br>";
    } else {
        echo "Cadastro realizado com sucesso!<br>";
    }
}
?>
