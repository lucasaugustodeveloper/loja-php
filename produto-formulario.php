<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/9/17
 * Time: 1:12 PM
 */

require_once 'partials/head.php';
require_once 'partials/funcoes.php';

verificaUsuario();
$produto = array(
    "nome" => "",
    "preco" => "",
    "descricao" => "",
    "categoria_id" => "1"
);
$usado = "";
$categorias = listaCategorias($mysqli);
?>
    <div class="principal jumbotron">
        <h1 class="text-center">Adicionar Produto</h1>
    </div>
    <form class="row" action="/adiciona-produto.php" method="post">
        <div class="col-xs-12">
            <?php
                require_once 'form.php';
            ?>
            <div class="row form-group">
                <button type="submit" class="btn btn-primary">Cadastra</button>
            </div>
        </div>
    </form>

<?php
require_once 'partials/footer.php';
?>
