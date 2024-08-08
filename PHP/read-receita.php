<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM receitas");
$receitas = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h1>Caderno de Receitas</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="read-receita.php">Receitas</a></li>
                <li><a href="create-receita.php">Adicionar Receita</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Receitas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ingredientes</th>
                    <th>Modo de preparo</th>
                    <th>Tempo e preparo</th>
                    <th>Serve</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($receitas as $receita): ?>
                    <tr>
                        <td><?= $receita['id'] ?></td>
                        <td><?= $receita['nome'] ?></td>
                        <td><?= $receita['ingredientes'] ?></td>
                        <td><?= $receita['modo_preparo'] ?></td>
                        <td><?= $receita['tempo_preparo'] ?></td>
                        <td>
                            <a href="update-receita.php?id=<?= $receita['id'] ?>">Editar</a>
                            <a href="delete-receita.php?id=<?= $receita['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; Mang0 Labs</p>
    </footer>
</body>
</html>
