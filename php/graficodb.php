<?php
header('Content-Type: application/json');

require_once('../config/conexao.php');

$colaboradores = $conn->query('SELECT cargo,COUNT(*) as qtd FROM colaboradores GROUP BY cargo ORDER BY cargo asc');

$data = array();

foreach ($colaboradores as $row) :
    $data[] = $row;
endforeach;

echo json_encode($data);
?>