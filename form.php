<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/11/17
 * Time: 4:39 PM
 */
?>
<input type="hidden" name="id" value="<?= $produto['id'] ?>">
<div class="col-xs-12">
    <div class="row form-group">
        <label for="name">Nome do produto:</label>
        <input type="text" name="nome" value="<?= $produto['nome'] ?>" placeholder="Nome do Produto..."
               id="name" class="form-control" autofocus>
    </div>
    <div class="row form-group">
        <label for="price">Preço do produto:</label>
        <input type="number" step="0.1" nmin="1" name="preco"
               value="<?= $produto['preco'] ?>" placeholder="Preço do Produto..."
               id="price" class="form-control">
    </div>
    <div class="row form-group">
        <label for="description">Descrição do Produto: </label>
        <textarea name="descricao"
                  class="form-control" id="description"
                  cols="30" rows="10"><?= $produto['descricao'] ?></textarea>
    </div>
    <div class="row form-group">
        <label for="usado">Produto Usado:</label>
        <input type="checkbox" name="usado" id="usado" <?= $usado ?> value="true">
    </div>
    <div class="row form-group">
        <label for="categories">Categoria:</label>
        <select name="categoria_id" class="form-control" id="categories">
            <?php
            foreach ($categorias as $categoria) :
                $categoriaSelected = $produto['categoria_id'] == $categoria['id'];
                $selecao = $categoriaSelected ? 'selected="selected"' : '';
                ?>
                <option value="<?= $categoria['id'] ?>" <?= $selecao ?> >
                    <?= $categoria['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>






