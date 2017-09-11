<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/9/17
 * Time: 1:08 PM
 */
require_once 'partials/head.php';
require_once 'partials/funcoes.php';
?>
    <div class="principal row jumbotron">
        <h1 class="text-center">Bem-vindo!</h1>
    </div>
    <div class="login row">
        <div class="msgLogin col-xs-12">
<?php
echo alert('success');
echo alert('danger');

if (usuarioEstaLogado()) :
?>
            <div class="text-success text-center">
                Você esta logado como <strong class="text-uppercase"><?= usuarioLogado() ?></strong>
                <a class="text-info" href="logout.php">Deslogar</a>
            </div>
<?php
endif;
?>
        </div>
<?php
if (!isset($_SESSION['usuario_logado'])) :
?>
        <div class="col-xs-6 col-xs-offset-3">
            <form action="login.php" method="post">
                <div class="col col-xs-12 email">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email"
                           name="email" placeholder="test@test.com" autofocus required>
                </div>
                <div class="col-xs-12">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" class="form form-control"
                           id="password" placeholder="********" required>
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php
require_once 'partials/footer.php';
?>
