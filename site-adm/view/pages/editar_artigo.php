<?php
require_once '../components/edit_head.php';
require_once __DIR__ . '/../../model/ArtigoModel.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';
require_once __DIR__ . '/../../config/database.php';

$artigoModel = new ArtigoModel($conn);
$categoriaModel = new CategoriaModel($conn);

$id = $_GET['id'];
$artigo = $artigoModel->buscarPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $categoria_id = $_POST['categoria_id'];

    $artigoModel->editar($id, $titulo, $conteudo, $categoria_id);
    header('Location: artigos.php');
    exit();
}

$categorias = $categoriaModel->listar();
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Editar Artigo</h1>

        <form method="POST">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= $artigo['titulo'] ?>" required>
            </div>
            <div>
                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" required><?= $artigo['conteudo'] ?></textarea>
            </div>
            <div>
                <label for="categoria_id">Categoria:</label>
                <select id="categoria_id" name="categoria_id" required>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<?= $categoria['id'] ?>" <?= ($artigo['categoria_id'] == $categoria['id']) ? 'selected' : '' ?>>
                            <?= $categoria['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Salvar</button>
        </form>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>

</body>

</html>
