<?php
include_once '../config/conexao.php';
include_once '../class/colaborador.class.php';

$id = $_POST['id'];

$database = new Database();
$db = $database->getConnection();

$colaborador = new Colaboradores($db);
$colaborador->excluirColaborador($id);
