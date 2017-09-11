<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/9/17
 * Time: 3:25 PM
 */
require_once 'partials/head.php';
require_once 'partials/funcoes.php';

$products = listaProdutos($mysqli);
?>
    <div class="principal">
        <h1 class="jumbotron text-center text-uppercase">
            Lista de Produtos
        </h1>
    </div>
<?php
echo alert('success');
?>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($products as $product) :
            ?>
                <tr>
                    <td>
                        <?= $product['nome'] ?>
                    </td>
                    <td>
                        <?= substr($product['descricao'], 0, 28) ?>
                    </td>
                    <td>
                        <?= 'R$ '.number_format($product['preco'], 2, ',', '.') ?>
                    </td>
                    <td>
                        <?= $product['categoria_nome'] ?>
                    </td>
                    <td>
                        <?php
                        if (usuarioEstaLogado()) {
                        ?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" width="50%">
                                        <a href="editar-produto.php?id=<?=$product['id']?>"
                                           class="btn btn-primary" role="button">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center" width="50%">
                                        <form action="/remove-produto.php" method="post">
                                            <input type="hidden" name="id" value="<?=$product['id']?>">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
require_once 'partials/footer.php';
?>
