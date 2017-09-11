<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/9/17
 * Time: 11:49 PM
 */
require_once 'partials/head.php';
require_once 'partials/funcoes.php';

verificaUsuario();

$id = $_POST['id'];

removeProduto($mysqli, $id);
$_SESSION['success'] = 'Produto removido com sucesso!';
header("Location: listagem-produto.php");
die();
