<?php
$jsonFile = 'dados.json';

// Lê os dados do arquivo JSON
$dados = [];
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $dados = json_decode($jsonData, true) ?? [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Cadastro de Pessoas</h1>

    <!-- Formulário para cadastrar nova pessoa -->
    <form action="processa_formulario.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <h2>Lista de Pessoas Cadastradas</h2>

    <?php if (!empty($dados)): ?>
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($dados as $index => $pessoa): ?>
                <tr>
                    <td><?= htmlspecialchars($pessoa['nome']) ?></td>
                    <td><?= htmlspecialchars($pessoa['sobrenome']) ?></td>
                    <td><?= htmlspecialchars($pessoa['idade']) ?></td>
                    <td>
                        <a href="editar.php?index=<?= $index ?>">Editar</a> |
                        <a href="excluir.php?index=<?= $index ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Nenhuma pessoa cadastrada.</p>
    <?php endif; ?>

</body>
</html>
