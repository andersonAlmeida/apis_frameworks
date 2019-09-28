
<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('categoria/create'); ?>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
