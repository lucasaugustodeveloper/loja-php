<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/11/17
 * Time: 10:40 AM
 */

require_once 'partials/connection.php';
require_once 'partials/funcoes.php';

$usuario = buscaUsuario($mysqli, $_POST['email'], $_POST['password']);

if ($usuario !== null) {
    $_SESSION['success'] = 'Usuário logado com sucesso';
    header("Location: /");
    logaUsuario($usuario['email']);
} else {
    $_SESSION['danger'] = 'Usuário ou senha inválido';
    header("Location: /");
    die();
}
