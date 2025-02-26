<?php 
require_once __DIR__ . '/../../model/UsuarioModel.php';

$id = $_GET['id'];
UsuarioModel::excluir($id);

header('Location: usuarios.php');
exit();
?>