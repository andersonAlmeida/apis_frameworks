<div class="row">
    <div class="col-sm-6">
		<?php echo form_open_multipart('produto/create');?>
            <div class="form-group">
                <label for="nome">Nome</label>
				<input class="form-control" type="text" name="nome" placeholder="Nome do Produto"/>
				<?php echo form_error('nome', '<p class="error-feedback">'); ?>
			</div>
			<div class="row">
				<div class="form-group col-6">
					<label for="categorias">Categoria</label>
					<select name="categoria" class="form-control" id="categorias">
						<option value="">Selecione uma categoria</option>
						<?php foreach($categorias as $categoria) { ?>
							<option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('categoria', '<p class="error-feedback">'); ?>
				</div>
				<div class="form-group col-6">
				<label for="marcas">Marca</label>
					<select name="marca" class="form-control" id="marcas">
						<option value="">Selecione uma marca</option>
						<?php foreach($marcas as $marca) { ?>
							<option value="<?php echo $marca['id']; ?>"><?php echo $marca['nome']; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('marca', '<p class="error-feedback">'); ?>
				</div>
			</div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
				<textarea class="form-control" type="text" name="descricao" placeholder="Texto descritivo para o produto"></textarea>
				<?php echo form_error('descricao', '<p class="error-feedback">'); ?>
			</div>
			<div class="row">
				<div class="form-group col-6">
					<label for="preco">Preço</label>
					<input class="form-control" type="number" step="0.01" min="0" name="preco" placeholder="R$"/>
					<?php echo form_error('preco', '<p class="error-feedback">'); ?>
				</div>
				<div class="form-group col-6">
					<label for="desconto">Desconto</label>
					<input class="form-control" type="number" step="0.01" min="0" name="desconto" placeholder="%"/>
					<?php echo form_error('desconto', '<p class="error-feedback">'); ?>
				</div>
			</div>
			<!-- Telefone -->
			<fieldset>
				<legend>Imagens</legend>

				<div class="form-group">
					<label for="imagem">Imagem</label>
					<input class="form-control-file" type="file" name="imagem" placeholder="jpg ou png"/>
					<?php echo isset($error) ? $error : '';?>
					<?php echo form_error('imagem', '<p class="error-feedback">'); ?>
				</div>
			</fieldset>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
