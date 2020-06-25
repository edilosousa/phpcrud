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

    function dadosGraficoColaborador()
    {
        $colaboradores = $this->conn->query("SELECT cargo,COUNT(*) as qtd FROM " . $this->table_name . " GROUP BY cargo ORDER BY cargo asc");
        return $colaboradores;
    }

    function buscarColaborador($valor)
    {
        define("URL","http://localhost/phpcrud/phpcrud/");
        $colaboradores = $this->conn->query("SELECT * FROM colaboradores WHERE nome LIKE '%" . $valor . "%' OR telefone like '%" . $valor . "%' OR empresa like '%" . $valor . "%' 
                        OR setor like '%" . $valor . "%' OR email like '%" . $valor . "%' OR cargo like '%" . $valor . "%'");
?>
        <table class="table table-hover table_colaborador" style="font-size: 14px;">
            <thead>
                <th>ID</th>
                <th>NOME</th>
                <th>TELEFONE</th>
                <th>EMPRESA</th>
                <th>SETOR</th>
                <th>CARGO</th>
                <th>E-MAIL</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                foreach ($colaboradores as $row) :
                ?>
                    <tr>
                        <td>
                            <span class="badge badge-danger">
                                <?= $row['id'] ?>
                            </span>
                        </td>
                        <td><?= $row['nome'] ?></td>
                        <td><?= $row['telefone'] ?></td>
                        <td><?= $row['empresa'] ?></td>
                        <td><?= $row['setor'] ?></td>
                        <td><?= $row['cargo'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="<?= URL ?>views/colaboradores/detalhesColaborador.php?id=<?= $row['id'] ?>">Editar</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
    <?php
    }
}
