<?php 
require_once '../components/head.php'; 
require_once __DIR__ . '/../../model/ArtigoModel.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../config/database.php'; // Inclui o database.php
$artigoModel = new ArtigoModel($conn);
$id = $_GET['id'];

 // Cria uma instância do ArtigoModel
$artigo = $artigoModel->buscarPorId($id); // Chama o método na instância

$categoriaModel = new CategoriaModel($conn); // Cria uma instância do CategoriaModel
$usuarioModel = new UsuarioModel($conn); // Cria uma instância do UsuarioModel

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];

    // Chama o método editar() na instância $artigoModel, sem categoria_id e usuario_id
    $artigoModel->editar($id, $titulo, $conteudo); 

    header('Location: artigos.php');
    exit();
}
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Editar Artigo</h1>

        <form method="POST">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= $artigo->titulo ?>" required> 
            </div>
            <div>
                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" required><?= $artigo->conteudo ?></textarea> 
            </div>
            <div>
                <label for="categoria_id">Categoria:</label>
                <select id="categoria_id" name="categoria_id" required>
                    <?php foreach ($categoriaModel->listar() as $categoria): ?> 
                        <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $artigo->categoria_id ? 'selected' : '' ?>><?= $categoria['nome'] ?></option> 
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="usuario_id">Usuário:</label>
                <select id="usuario_id" name="usuario_id" required>
                    <?php foreach ($usuarioModel->listar() as $usuario): ?> 
                        <option value="<?= $usuario['id'] ?>" <?= $usuario['id'] == $artigo->usuario_id ? 'selected' : '' ?>><?= $usuario['nome'] ?></option> 
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