<?php
class Colaboradores
{
    private $conn;
    public $table_name = "colaboradores";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        $query = $this->conn->query("SELECT * FROM " . $this->table_name . "");
        return $query;
    }

    function readOne($id)
    {
        $query = $this->conn->query("SELECT * FROM " . $this->table_name . " WHERE id = " . $id . "");
        return $query;
    }

    function saveColaborador($id, $nome, $telefone, $empresa, $setor, $email, $cargo)
    {
        $sql = "UPDATE colaboradores SET nome=?, telefone=?, empresa=?,  setor=?, email=?, cargo=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $telefone, $empresa, $setor, $email, $cargo, $id]);
        echo $stmt->rowCount();
    }

    function excluirColaborador($id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        echo $stmt->rowCount();
    }

    function saveNovoColaborador($nome, $telefone, $empresa, $setor, $email, $cargo)
    {
        $sql = "INSERT INTO " . $this->table_name . " (nome,telefone,empresa,setor,email,cargo) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $telefone, $empresa, $setor, $email, $cargo]);
        echo $stmt->rowCount();
    }

    function dadosGraficoColaborador(){
        $colaboradores = $this->conn->query("SELECT cargo,COUNT(*) as qtd FROM " . $this->table_name . " GROUP BY cargo ORDER BY cargo asc");
        return $colaboradores;
    }
}
