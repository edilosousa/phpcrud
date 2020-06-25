<?php
include '../config/conexao.php';
$valor = $_POST['valor'];
$data = $conn->query("SELECT * FROM colaboradores WHERE nome LIKE '%" . $valor . "%' OR telefone like '%". $valor ."%' OR empresa like '%". $valor ."%' 
                        OR setor like '%". $valor ."%' OR email like '%". $valor ."%' OR cargo like '%". $valor ."%'");

?>

<table class="table table-hover table_colaborador"  style="font-size: 14px;">
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
        foreach ($data as $row) :
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
</table>