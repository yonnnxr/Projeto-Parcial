<?php 
require_once __DIR__ . '/../../model/CategoriaModel.php';
require_once __DIR__ . '/../../config/database.php';

$categoriaModel = new CategoriaModel($conn);

$id = $_GET['id'];
$categoriaModel->excluir($id);

header('Location: categorias.php');
exit();
?>