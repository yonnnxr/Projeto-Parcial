<?php 
require_once __DIR__ . '/../../model/ArtigoModel.php';

$id = $_GET['id'];
ArtigoModel::excluir($id);

header('Location: artigos.php');
exit();
?>