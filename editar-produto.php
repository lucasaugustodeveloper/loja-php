<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/10/17
 * Time: 1:33 AM
 */
require_once 'partials/head.php';
require_once 'partials/funcoes.php';

$id = $_GET['id'];
$produto = buscaProduto($mysqli, $id);
$categorias = listaCategorias($mysqli);

$usado = $produto['usado'] ? 'checked="checked"' : "";

?>
    <div class="principal jumbotron">
        <h1 class="text-center">Adicionar Produto</h1>
    </div>
    <form class="row" action="/altera-produto.php" method="post">
        <div class="col-xs-12">
            <?php
                require_once 'form.php';
            ?>
            <div class="row form-group">
                <button type="submit" class="btn btn-primary">Alterar</button>
            </div>
        </div>
    </form>

<?php
require_once 'partials/footer.php';
?>