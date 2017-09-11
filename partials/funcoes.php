<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/9/17
 * Time: 2:19 PM
 */
session_start();
function usuarioEstaLogado() {
    return isset($_SESSION['usuario_logado']);
}

function verificaUsuario() {
    if (!usuarioEstaLogado()) {
        $_SESSION['danger'] = 'Você não tem acesso a essa funcionalidade';
        header('Location: /');
        die();
    }
}
function usuarioLogado() {
    return $_SESSION['usuario_logado'];
}
function logaUsuario($email) {
    $_SESSION['usuario_logado'] = $email;
}
function logout() {
    session_destroy();
    session_start();
}

function insereProduto($mysqli, $nome, $descricao, $preco, $categoria_id, $usado) {
    $query = "INSERT INTO produtos (nome, descricao, preco, categoria_id, usado) values
              ('{$nome}', '{$descricao}', {$preco}, {$categoria_id}, {$usado})";

    if ($nome !== '' && $preco !== '') {
        return $mysqli->query($query);
    } else {
        throw new Exception('O campo <strong>Nome</strong> ou <strong>Preço</strong> não pode esta vazio');
        return false;
    }
}

function alteraProduto($mysqli, $id, $nome, $descricao, $preco, $categoria_id, $usado) {
    $query = "UPDATE produtos set nome = '{$nome}',  descricao = '{$descricao}',
              preco = {$preco}, categoria_id = {$categoria_id}, usado = {$usado} where id = {$id}";
    return $mysqli->query($query);
}

function listaProdutos($mysqli) {
    $produtos = array();
    $result = $mysqli->query("SELECT p.*, c.nome as categoria_nome FROM produtos as p join categorias as c on c.id=p.categoria_id");
    while($products = $result->fetch_assoc()) :
        array_push($produtos, $products);
    endwhile;

    return $produtos;
}

function buscaProduto($mysqli, $id) {
    $query = "SELECT * FROM produtos where id = {$id}";
    return $mysqli->query($query)->fetch_assoc();
}

function removeProduto ($mysqli, $id) {
    $query = "DELETE FROM produtos where id = {$id}";
    return $mysqli->query($query);
}

function listaCategorias($mysqli) {
    $categorias = array();
    $query = "SELECT * FROM categorias";
    $resultado = $mysqli->query($query);
    while ($categoria = $resultado->fetch_assoc()) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}

function buscaUsuario($mysqli, $email, $senha) {
    $senhaMd5 = md5($senha);
    $mail = mysqli_real_escape_string($mysqli, $email);
    $query = $mysqli->query("SELECT * FROM usuarios WHERE email = '{$mail}' AND senha = '{$senhaMd5}'");
    $resultado = $query->fetch_assoc();
    return $resultado;
}

function alert($type) {
    if (isset($_SESSION[$type])) {
        $msg = "
            <div class=\"alert alert-$type text-center text-uppercase\">
                ".$_SESSION[$type]."
            </div>
        ";
    }
    unset($_SESSION[$type]);
    return $msg;
}
