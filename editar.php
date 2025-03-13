<?php
$jsonFile = 'dados.json';

if (!isset($_GET['index'])) {
    header('Location: index.php');
    exit();
}

$index = $_GET['index'];
$dados = json_decode(file_get_contents($jsonFile), true);

if (!isset($dados[$index])) {
    header('Location: index.php');
    exit();
}

$pessoa = $dados[$index];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados[$index] = [
        "nome" => $_POST['nome'],
        "sobrenome" => $_POST['sobrenome'],
        "idade" => $_POST['idade']
    ];

    file_put_contents($jsonFile, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Editar Pessoa</h1>
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($pessoa['nome']) ?>" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" value="<?= htmlspecialchars($pessoa['sobrenome']) ?>" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" value="<?= htmlspecialchars($pessoa['idade']) ?>" required><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>

    <a href="index.php">Cancelar</a>

</body>
</html>
