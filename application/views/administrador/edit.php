<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('administrador/edit/' . $administrador_item['id']); ?>
            <input type="hidden" name="id" value="<?php echo $administrador_item['id'] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="input" name="nome" value="<?php echo $administrador_item['nome'] ?>">
            </div>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $administrador_item['email'] ?>">
            </div>

            <div class="form-group">
                <label for="senha">senha</label>
                <input class="form-control" type="password" name="senha" value="<?php echo $administrador_item['senha'] ?>">
            </div>
            
            <div class="form-group">
                <label for="funcao">Função</label>
                <select name="funcao" id="funcao" class="form-control" value="<?php echo $administrador_item['funcao']; ?>">
                    <option value="">Selecione uma função</option>
                    <?php foreach($funcoes as $funcao) { ?>
                        <option value="<?php echo $funcao['id']; ?>" <?php echo ($administrador_item['funcao'] == $funcao['id']) ? "selected" : ""; ?> ><?php echo $funcao['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
