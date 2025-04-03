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

        <div>
            <a href="adicionar_artigo.php" class="add-button">
                <span class="material-symbols-outlined">add</span>
                Adicionar Artigo
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Conteúdo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $artigos = $artigoModel->listar();
                if (is_array($artigos)) :
                    foreach ($artigos as $artigo) :
                ?>
                        <tr>
                            <td><?= $artigo['id'] ?></td>
                            <td><?= $artigo['titulo'] ?></td>
                            <td><?= $artigo['conteudo'] ?></td>
                            <td>
                                <a href="editar_artigo.php?id=<?= $artigo['id'] ?>"><span class="material-symbols-outlined">edit</span></a>
                                <a href="excluir_artigo.php?id=<?= $artigo['id'] ?>"><span class="material-symbols-outlined">delete</span></a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                else :
                    ?>
                        <tr>
                            <td colspan="4">Nenhum artigo encontrado.</td>
                        </tr>
                    <?php
                endif;
                ?>
            </tbody>
        </table>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>

</html>