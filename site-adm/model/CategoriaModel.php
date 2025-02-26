<?php

require_once __DIR__ . '/../config/database.php';

class CategoriaModel {
    private $conn; // Declaração da propriedade $conn

    public function __construct($conn) {
        $this->conn = $conn; // Inicializa a propriedade $conn com a conexão recebida
    }

    public function listar() {
        $stmt = $this->conn->query("SELECT * FROM categorias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM categorias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function adicionar($nome) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO categorias (nome) VALUES (?)");
        $stmt->execute([$nome]);
    }

    public static function editar($id, $nome) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
        $stmt->execute([$nome, $id]);
    }

    public static function excluir($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM categorias WHERE id = ?");
        $stmt->execute([$id]);
    }
}

?>