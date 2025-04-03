<?php
require_once '../components/head.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';
require_once __DIR__ . '/../../config/database.php';

$categoriaModel = new CategoriaModel($conn);
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Categorias</h1>

        <div>
            <a href="adicionar_categoria.php" class="add-button">
                <span class="material-symbols-outlined">add</span>
                Adicionar categoria
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoriaModel->listar() as $categoria) : ?>
                    <tr>
                        <td><?= $categoria['id'] ?></td>
                        <td><?= $categoria['nome'] ?></td>
                        <td>
                            <a href="editar_categoria.php?id=<?= $categoria['id'] ?>"><span class="material-symbols-outlined">edit</span></a>
                            <a href="excluir_categoria.php?id=<?= $categoria['id'] ?>"><span class="material-symbols-outlined">delete</span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>

</html>