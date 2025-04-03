<?php
require_once '../components/edit_head.php';
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../config/database.php';

$usuarioModel = new UsuarioModel($conn);

$id = $_GET['id'];
$usuario = $usuarioModel->buscarPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $usuarioModel->editar($id, $email, $nome, $cpf, $data_nascimento);
    header('Location: usuarios.php');
    exit();
}
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Editar Usuário</h1>

        <form method="POST">
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $usuario['email'] ?>" required>
            </div>
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>" required>
            </div>
            <div>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?= $usuario['cpf'] ?>" required>
            </div>
            <div>
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?= $usuario['data_nascimento'] ?>" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>

</html>