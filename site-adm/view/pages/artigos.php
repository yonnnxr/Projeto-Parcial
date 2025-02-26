<?php 
require_once '../components/head.php'; 
require_once __DIR__ . '/../../model/ArtigoModel.php';
require_once __DIR__ . '/../../config/database.php';

$artigoModel = new ArtigoModel($conn); 
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Artigos</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Conteúdo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artigoModel->listar() as $artigo): ?> 
                    <tr>
                        <td><?= $artigo['id'] ?></td>
                        <td><?= $artigo['titulo'] ?></td>
                        <td><?= $artigo['conteudo'] ?></td>
                        <td>
                            <a href="editar_artigo.php?id=<?= $artigo['id'] ?>">Editar</a>
                            <a href="excluir_artigo.php?id=<?= $artigo['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="adicionar_artigo.php">Adicionar Artigo</a>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>
</html>