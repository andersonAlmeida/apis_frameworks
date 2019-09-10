<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('contatos/edit/' . $contatos_item['id']); ?>
            <input type="hidden" name="id" value="<?php echo $contatos_item['id'] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="input" name="nome" value="<?php echo $contatos_item['nome'] ?>">
            </div>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $contatos_item['email'] ?>">
            </div>
            
            <div class="form-group">
                <label for="telefone">telefone</label>
                <input class="form-control" type="text" name="telefone" value="<?php echo $contatos_item['telefone'] ?>">
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
