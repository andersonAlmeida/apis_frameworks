<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('funcao/edit/' . $funcoes_item['id']); ?>
            <input type="hidden" name="id" value="<?php echo $funcoes_item['id'] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" value="<?php echo $funcoes_item['nome'] ?>">
            </div>
            <div class="form-group">
                <label for="nivel">Nível</label>
                <input class="form-control" type="number" min="0" max="5" name="nivel" value="<?php echo $funcoes_item['nivel'] ?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
