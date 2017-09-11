<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/10/17
 * Time: 1:50 AM
 */
require_once 'partials/head.php';
require_once 'partials/funcoes.php';

verificaUsuario();

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];

if (array_key_exists('usado', $_POST)) {
    $usado = 'true';
} else {
    $usado = 'false';
}

try {
    alteraProduto($mysqli, $id, $nome, $descricao, $preco, $categoria_id, $usado);
    ?>
    <div class="principal">
        <p class="alert alert-success text-center">
            Produto <?= $nome ?>, foi alterado com sucesso!
        </p>
    </div>
    <?php
} catch (Exception $e) {
    ?>
    <div class="principal">
        <p class="alert alert-danger text-center text-uppercase">
            Produto não foi alterado com sucesso! <br><br><br>
            <?= $e->getMessage() ?>
        </p>
    </div>
    <?php
}
$mysqli->close();
require_once 'partials/footer.php';
?>