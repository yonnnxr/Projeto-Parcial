<?php 
require_once __DIR__ . '/../../model/UsuarioModel.php';
require_once __DIR__ . '/../../config/database.php';

$usuarioModel = new UsuarioModel($conn);

$id = $_GET['id'];
$usuarioModel->excluir($id);

header('Location: usuarios.php');
exit();
?>