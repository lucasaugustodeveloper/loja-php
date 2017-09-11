<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/11/17
 * Time: 2:40 PM
 */

require_once 'partials/funcoes.php';

logout();
$_SESSION['success'] = 'Deslogado com sucesso';
header('Location: /');
die();
