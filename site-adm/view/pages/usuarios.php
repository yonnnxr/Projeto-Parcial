<?php 
require_once '../components/head.php'; 
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../config/database.php';

$usuarioModel = new UsuarioModel($conn);
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Usuários</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarioModel->listar() as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= $usuario['email'] ?></td>
                        <td><?= $usuario['cpf'] ?></td>
                        <td><?= $usuario['data_nascimento'] ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $usuario['id'] ?>"><span class="material-symbols-outlined">edit</span></a>
                            <a href="excluir_usuario.php?id=<?= $usuario['id'] ?>"><span class="material-symbols-outlined">delete</span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- <a href="adicionar_usuario.php">Adicionar Usuário</a> -->
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>
</html>