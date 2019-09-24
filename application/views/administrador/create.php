
<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('administrador/create'); ?>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="input" name="nome" maxlength="20"/>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>
            
            <div class="form-group">
                <label for="senha">senha</label>
                <input class="form-control" type="password" name="senha">
            </div>

            <div class="form-group">
                <label for="funcao">Função</label>
                <select name="funcao" id="funcao" class="form-control">
                    <option value="">Selecione uma função</option>
                    <?php foreach($funcoes as $funcao) { ?>
                        <option value="<?php echo $funcao['id']; ?>"><?php echo $funcao['nome']; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>