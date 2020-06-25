<?php
include_once '../config/conexao.php';
include_once '../class/colaborador.class.php';

$valor = $_POST['valor'];

$database = new Database();
$db = $database->getConnection();

$colaborador = new Colaboradores($db);
$colaborador->buscarColaborador($valor);

