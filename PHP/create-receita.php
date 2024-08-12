<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $ingredientes = $_POST['ingredientes'];
    $modo_preparo = $_POST['modo_preparo'];
    $tempo_preparo = $_POST['tempo_preparo'];
    $stmt = $pdo->prepare("INSERT INTO receitas (nome, ingredientes, modo_preparo, tempo_preparo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $ingredientes, $modo_preparo, $tempo_preparo]);
    header('Location: read-receita.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Menu de Receitas</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="read-receita.php">Receitas</a></li>
                <li><a href="create-receita.php">Adicionar Receita</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Adicionar Receita</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="ingredientes">Ingredientes:</label>
            <input type="text" id="ingredientes" name="ingredientes" required>
            <label for="modo_preparo">Modo de Preparo:</label>
            <input type="text" id="modo_preparo" name="modo_preparo" required>
            <label for="tempo_preparo">Tempo de Preparo:</label>
            <input type="text" id="tempo_preparo" name="tempo_preparo" required>
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; Mang0 Labs</p>
    </footer>
</body>
</html>
