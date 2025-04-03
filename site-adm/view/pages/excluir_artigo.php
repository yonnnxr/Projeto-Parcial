<?php
require_once __DIR__ . '/../../model/ArtigoModel.php';
require_once __DIR__ . '/../../config/database.php';

$artigoModel = new ArtigoModel($conn);

$id = $_GET['id'];
$artigoModel->excluir($id);

header('Location: artigos.php');
exit();
?>