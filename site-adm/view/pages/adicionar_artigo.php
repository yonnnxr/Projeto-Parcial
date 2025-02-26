<?php 
require_once '../components/head.php'; 
require_once __DIR__ . '/../../model/ArtigoModel.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';
require_once __DIR__ . '/../../model/UsuarioModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $categoria_id = $_POST['categoria_id'];
    $usuario_id = $_POST['usuario_id'];
    ArtigoModel::adicionar($titulo, $conteudo, $categoria_id, $usuario_id);
    header('Location: artigos.php');
    exit();
}
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Adicionar Artigo</h1>

        <form method="POST">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div>
                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" required></textarea>
            </div>
            <div>
                <label for="categoria_id">Categoria:</label>
                <select id="categoria_id" name="categoria_id" required>
                    <?php foreach (CategoriaModel::listar() as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="usuario_id">Usuário:</label>
                <select id="usuario_id" name="usuario_id" required>
                    <?php foreach (UsuarioModel::listar() as $usuario): ?>
                        <option value="<?= $usuario['id'] ?>"><?= $usuario['nome'] ?></option>
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