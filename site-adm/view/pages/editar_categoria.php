<?php
require_once '../components/edit_head.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';
require_once __DIR__ . '/../../config/database.php';

$categoriaModel = new CategoriaModel($conn);

$id = $_GET['id'];
$categoria = $categoriaModel->buscarPorId($id); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoriaModel->editar($id, $nome);
    header('Location: categorias.php');
    exit();
}
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Editar Categoria</h1>

        <form method="POST">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= $categoria['nome'] ?>" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>

</html>