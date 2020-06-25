<?php
include_once '../config/conexao.php';
include_once '../class/colaborador.class.php';

$id = $_POST['id'];
$nome = strtoupper($_POST['nome']);
$telefone = strtoupper($_POST['telefone']);
$empresa = strtoupper($_POST['empresa']);
$setor = strtoupper($_POST['setor']);
$email = strtoupper($_POST['email']);
$cargo = strtoupper($_POST['cargo']);

$database = new Database();
$db = $database->getConnection();

$colaborador = new Colaboradores($db);
$colaborador->saveColaborador($id,$nome,$telefone,$empresa,$setor,$email,$cargo);

