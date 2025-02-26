<?php 
require_once __DIR__ . '/../../model/CategoriaModel.php';

$id = $_GET['id'];
CategoriaModel::excluir($id);

header('Location: categorias.php');
exit();
?>