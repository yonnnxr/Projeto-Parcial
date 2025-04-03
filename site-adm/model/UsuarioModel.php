<?php
require_once __DIR__ . '/../config/database.php';

class UsuarioModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function listar()
    {
        $stmt = $this->conn->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function adicionar($email, $nome, $cpf, $data_nascimento)
    {
        $query = "INSERT INTO usuarios (email, nome, cpf, data_nascimento) VALUES (:email, :nome, :cpf, :data_nascimento)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":data_nascimento", $data_nascimento);
        $stmt->execute();
    }

    public function editar($id, $email, $nome, $cpf, $data_nascimento)
    {
        $query = "UPDATE usuarios SET email = :email, nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":data_nascimento", $data_nascimento);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluir($id)
    {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}