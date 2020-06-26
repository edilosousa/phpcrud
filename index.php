<?php
include_once 'config/conexao.php';
include_once 'class/colaborador.class.php';
define("URL", "http://localhost/phpcrud/phpcrud/");

$database = new Database();
$db = $database->getConnection();
$colaborador = new Colaboradores($db);
$retorno = $colaborador->dadosGraficoColaborador();
?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
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
            <div class="col-sm-12 text-center">

                <p class="text-info font-weight-bold">Gráfico de quantidade de colaboradores por cargo.</p>
            </div>
            <div class="col-sm-12 mt-4">
                <canvas id="myChart" width="1200" height="450"></canvas>
            </div>

            <?php
            $cargo = '';
            $qtd = '';
            foreach ($retorno as $row) :
                $cargo = $cargo . "'" . $row['cargo'] . "',";
                $qtd = $qtd . "" . $row['qtd'] . ",";
            endforeach;
            $cargo = trim($cargo, ",");
            $qtd = trim($qtd, ",");
            ?>

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

            <script src="assets/js/jquery.min.js"></script>
            <!-- Optional JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
            <script>
                $(document).ready(function() {
                    capturarDados();
                });

                function capturarDados() {
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?= $cargo ?>],
                            datasets: [{
                                data: [<?= $qtd ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            layout: {
                                padding: {
                                    left: 50,
                                    right: 0,
                                    top: 0,
                                    bottom: 20
                                }

                            }
                        }
                    });
                }
            </script>

        </div>

    </div>


</body>

</html>