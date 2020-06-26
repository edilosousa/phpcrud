<?php

include_once '../../class/colaborador.class.php';
include_once '../../config/conexao.php';
define("URL","http://localhost/phpcrud/phpcrud/");

$database = new Database();
$db = $database->getConnection();
$colaborador = new Colaboradores($db);
$retorno = $colaborador->read();

?>



<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css" />
    <title>Digiboard</title>

</head>

<body class="bg-dark">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary mt-2 rounded">
            <span class="btn btn-info" href="#">Digiboard</span>
            <a class="navbar-brand ml-3" href="<?= URL ?>index.php">Home</a>
            <a class="navbar-brand" href="<?= URL ?>views/colaboradores/colaboradores.php">Colaboradores</a>
            <a class="navbar-brand" href="<?= URL ?>views/colaboradores/cadastrarColaborador.php">Cadastrar</a>
        </nav>

        <div class="row mt-5 ml-1 mr-1 rounded">
            <div class="col-sm-12 mt-2">
                <h5 class="text-light">Buscar colaborador</h5>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Filtro por nome, telefone, email, cargo, setor, empresa..." id="valorBuscar" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button" id="buscarColaborador">Buscar</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Funcionários cadastrados</h5>
                        <div class="col-sm-12 table_ajax">
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
                                    foreach ($retorno as $row) :
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
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        Digiboard 2020
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?= URL ?>assets/js/jquery.min.js"></script>
<script>
    $('#buscarColaborador').click(function() {
        var valor = $('#valorBuscar').val();
        $.ajax({
            type: "POST",
            url: "http://localhost/phpcrud/phpcrud/php/buscarColaborador.php",
            data: {
                valor: valor
            },
            beforeSend: function() {
                $('.table_colaborador').hide();
            },
            success: function(resultado) {
                $('.table_ajax').html(resultado);
            }
        });
    });
</script>

</html>