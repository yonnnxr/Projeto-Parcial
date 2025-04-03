<?php

require_once __DIR__ . '/../config/database.php';

class ArtigoModel
{
    private $table = "artigos";

    private $conn;

    public $id;
    public $titulo;
    public $conteudo;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function listar()
    {
        $query = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $query = "SELECT * FROM $this->table
            WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function adicionar($titulo, $conteudo, $categoria_id)
    {
        $query = "INSERT INTO $this->table (titulo, conteudo, categoria_id)
            values (:titulo, :conteudo, :categoria_id)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":conteudo", $conteudo);
        $stmt->bindParam(":categoria_id", $categoria_id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function editar($id, $titulo, $conteudo, $categoria_id)
    {
        $query = "UPDATE $this->table 
            SET titulo = :titulo, 
                conteudo = :conteudo, 
                categoria_id = :categoria_id
            WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function excluir($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}