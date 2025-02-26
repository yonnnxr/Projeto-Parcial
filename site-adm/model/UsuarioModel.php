<?php
require_once __DIR__ . '/../config/database.php';

class UsuarioModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function listar() {
        $stmt = $this->conn->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function adicionar($email, $nome, $cpf, $data_nascimento) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO usuarios (email, nome, cpf, data_nascimento) VALUES (?, ?, ?, ?)");
        $stmt->execute([$email, $nome, $cpf, $data_nascimento]);
    }

    public function editar($id, $email, $nome, $cpf, $data_nascimento) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE usuarios SET email = ?, nome = ?, cpf = ?, data_nascimento = ? WHERE id = ?");
        $stmt->execute([$email, $nome, $cpf, $data_nascimento, $id]);
    }

    public function excluir($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }
}

?>