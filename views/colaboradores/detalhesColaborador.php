<?php
include_once '../../class/colaborador.class.php';
include_once '../../config/conexao.php';
define("URL", "http://localhost/phpcrud/phpcrud/");
$id = $_GET['id'];

$database = new Database();
$db = $database->getConnection();

$colaborador = new Colaboradores($db);
$retorno = $colaborador->readOne($id);

foreach ($retorno as $colabo);


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

        <div class="row mt-5 ml-1 mr-1 bg-light rounded">
            <div class="col-sm-12 mt-2">
                <h4 class="text-muted">Editar colaborador</h4>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="nome" value="<?= $colabo['nome'] ?>">
                    <label>Telefone</label>
                    <input type="text" class="form-control" id="telefone" value="<?= $colabo['telefone'] ?>">
                    <label>Empresa</label>
                    <input type="text" class="form-control" id="empresa" value="<?= $colabo['empresa'] ?>">
                    <label>Setor</label>
                    <input type="text" class="form-control" id="setor" value="<?= $colabo['setor'] ?>">
                    <label>E-mail</label>
                    <input type="text" class="form-control" id="email" value="<?= $colabo['email'] ?>">
                    <label>Cargo</label>
                    <input type="text" class="form-control" id="cargo" value="<?= $colabo['cargo'] ?>">
                    <button class="btn btn-md btn-success mt-3" id="btnSaveAlt">Salvar alterações</button>
                    <button class="btn btn-md btn-danger mt-3" id="btnExcCol">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?= URL ?>assets/js/jquery.min.js"></script>
<script>
    $('#btnSaveAlt').click(function() {
        var id = "<?= $id ?>";
        var nome = $('#nome').val();
        var telefone = $('#telefone').val();
        var empresa = $('#empresa').val();
        var setor = $('#setor').val();
        var email = $('#email').val();
        var cargo = $('#cargo').val();
        $.ajax({
            type: "POST",
            url: "http://localhost/phpcrud/phpcrud/php/salvarAlteracoesColaborador.php",
            data: {
                id: id,
                nome: nome,
                telefone: telefone,
                empresa: empresa,
                setor: setor,
                email: email,
                cargo: cargo
            },
            success: function(resultado) {
                if (resultado === '1') {
                    alert('Alterações salvas com sucesso');
                    setTimeout(function() {
                        window.location.replace("http://localhost/phpcrud/phpcrud/views/colaboradores/colaboradores.php");
                    }, 1000);
                } else if (resultado === '2') {
                    alert('Nada foi alterado!');
                } else if (resultado === '0') {
                    alert('Nada foi alterado!');
                } else {
                    alert('Erro ao alterar');
                }
            }
        });
    });

    $('#btnExcCol').click(function() {
        var id = "<?= $id ?>";
        var nome = $('#nome').val();
        var r = confirm("Deseja realmente excluir o Colaborador: " + nome);
        if (r == true) {
            $.ajax({
                type: "POST",
                url: "http://localhost/phpcrud/phpcrud/php/excluirColaborador.php",
                data: {
                    id: id
                },
                success: function(resultado) {
                    if (resultado === '1') {
                        alert('Colaborador excluído com sucesso!');
                        setTimeout(function() {
                            window.location.replace("http://localhost/phpcrud/phpcrud/views/colaboradores/colaboradores.php");
                        }, 1000);
                    } else if (resultado === '2') {
                        alert('Nada foi possivel excluir!');
                    } else if (resultado === '0') {
                        alert('Nada foi possivel excluir!');
                    } else {
                        alert('Erro ao excluir');
                    }
                }
            });
        }
    });
</script>

</html>