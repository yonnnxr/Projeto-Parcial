<?php 
require_once '../components/edit_head.php'; 
require_once __DIR__ . '/../../model/ArtigoModel.php';
require_once __DIR__ . '/../../model/CategoriaModel.php';
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../config/database.php';
?>
<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Editar Artigo</h1>

        <form method="POST">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required> 
            </div>
            <div>
                <label for="categoria">Categorias:</label>
                <input type="text" id="titulo" name="titulo" required> 
            </div>
            <div>
                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" required></textarea> 
            </div>
            <button type="submit">Salvar</button>
        </form>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
    
</body>
</html>