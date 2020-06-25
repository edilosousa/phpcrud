

<!-- $data = $conn->query('SELECT * FROM colaboradores');

foreach ($data as $row) :
     print_r($row);
endforeach; -->

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/crudphp/crudphp/assets/bootstrap/css/bootstrap.min.css" />
    <title>Digiboard</title>

</head>

<body class="bg-dark">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary mt-2 rounded">
            <span class="btn btn-info" href="#">Digiboard</span>
            <a class="navbar-brand ml-3" href="#">Home</a>
            <a class="navbar-brand" href="views/colaboradores/colaboradores.php">Colaboradores</a>
            <a class="navbar-brand" href="#">Cadastrar</a>
        </nav>

        <div class="row mt-5 ml-1 mr-1 bg-light rounded">