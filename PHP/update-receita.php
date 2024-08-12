<?php
require_once 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM receitas WHERE id = ?");
$stmt->execute([$id]);
$receita = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $ingredientes = $_POST['ingredientes'];
    $modo_preparo = $_POST['modo_preparo'];
    $tempo_preparo = $_POST['tempo_preparo'];
    $stmt = $pdo->prepare("UPDATE receitas SET nome = ?, ingredientes = ?, modo_preparo = ?, tempo_preparo = ? WHERE id = ?");
    $stmt->execute([$nome, $ingredientes, $modo_preparo, $tempo_preparo, $id]);
    header('Location: read-receita.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Receita</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Menu</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="read-receita.php">Receitas</a></li>
                <li><a href="create-receita.php">Adicionar Receita</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Receita</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $receita['nome'] ?>" required>
            <label for="ingredientes">Ingredientes:</label>
            <input type="text" id="ingredientes" name="ingredientes" value="<?= $receita['ingredientes'] ?>" required>
            <label for="modo_preparo">Modo de Preparo:</label>
            <input type="text" id="modo_preparo" name="modo_preparo" value="<?= $receita['modo_preparo'] ?>" required>
            <label for="tempo_preparo">Tempo de Preparo:</label>
            <input type="text" id="tempo_preparo" name="tempo_preparo" value="<?= $receita['tempo_preparo'] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; Mang0 Labs</p>
    </footer>
    
    </script>

</body>
</html>
