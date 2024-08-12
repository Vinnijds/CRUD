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
    <title>CRUD AlunoReceitas</title>
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
        <h2>Lista de Receita</h2>

        <input type="text" id="searchInput" placeholder="Buscar Receitas" />

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
                            <a href="delete-receita.php?id=<?= $receita['id'] ?>" class="delete-link">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; Mang0 Labs</p>
    </footer>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
        let searchTerm = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            let recipeName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            
            if (recipeName.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Seleciona todos os links de exclusão
    const deleteLinks = document.querySelectorAll('.delete-link');

    // Adiciona um event listener para cada link de exclusão
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Previne a navegação imediata

            const userConfirmed = confirm("Você tem certeza que deseja excluir esta receita?");

            if (userConfirmed) {
                // Se o usuário confirmou, redireciona para o link de exclusão
                window.location.href = this.href;
            }
        });
    });

    </script>

</body>
</html>
