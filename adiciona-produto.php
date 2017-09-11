<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/9/17
 * Time: 1:09 PM
 */
require_once 'partials/head.php';
require_once 'partials/funcoes.php';

verificaUsuario();

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
    insereProduto($mysqli, $nome, $descricao, $preco, $categoria_id, $usado);
?>
    <div class="principal">
        <p class="alert alert-success text-center">
            Produto <?= $nome ?>,
            R$ <?= number_format($preco, 2, ',', '.'); ?>
            adicionado com sucesso!
        </p>
    </div>
<?php
} catch (Exception $e) {
?>
    <div class="principal">
        <p class="alert alert-danger text-center text-uppercase">
            Produto não adicionado com sucesso! <br><br><br>
            <?= $e->getMessage() ?>
        </p>
    </div>
<?php
}
$mysqli->close();
require_once 'partials/footer.php';
?>
