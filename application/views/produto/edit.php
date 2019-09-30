<div class="row">
    <div class="col-sm-6">
		<?php echo form_open_multipart('produto/edit/' . $produto_item['id']);?>
            <div class="form-group">
                <label for="nome">Nome</label>
				<input class="form-control" type="text" name="nome" placeholder="Nome do Produto" value="<?php echo $produto_item['nome']?>"/>
				<?php echo form_error('nome', '<p class="error-feedback">'); ?>
			</div>
			<div class="row">
				<div class="form-group col-6">
					<label for="categorias">Categoria</label>
					<select name="categoria" class="form-control" id="categorias">
						<option value="">Selecione uma categoria</option>
						<?php foreach($categorias as $categoria) { ?>
							<option value="<?php echo $categoria['id']; ?>" <?php echo $produto_item['id_categoria'] == $categoria['id'] ? 'selected' : ''; ?>><?php echo $categoria['nome']; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('categoria', '<p class="error-feedback">'); ?>
				</div>
				<div class="form-group col-6">
				<label for="marcas">Marca</label>
					<select name="marca" class="form-control" id="marcas">
						<option value="">Selecione uma marca</option>
						<?php foreach($marcas as $marca) { ?>
							<option value="<?php echo $marca['id']; ?>" <?php echo $produto_item['id_marca'] == $marca['id'] ? 'selected' : ''; ?>><?php echo $marca['nome']; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('marca', '<p class="error-feedback">'); ?>
				</div>
			</div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
				<textarea class="form-control" type="text" name="descricao" placeholder="Texto descritivo para o produto" value="<?php echo $produto_item['descricao']?>"><?php echo $produto_item['descricao']?></textarea>
				<?php echo form_error('descricao', '<p class="error-feedback">'); ?>
			</div>
			<div class="row">
				<div class="form-group col-6">
					<label for="preco">Preço</label>
					<input class="form-control" type="number" step="0.01" min="0" name="preco" placeholder="R$" value="<?php echo $produto_item['preco']?>"/>
					<?php echo form_error('preco', '<p class="error-feedback">'); ?>
				</div>
				<div class="form-group col-6">
					<label for="desconto">Desconto</label>
					<input class="form-control" type="number" step="0.01" min="0" name="desconto" placeholder="%" value="<?php echo $produto_item['desconto']?>"/>
					<?php echo form_error('desconto', '<p class="error-feedback">'); ?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-6">
				<label for="estoque">Quantidade em Estoque</label>
					<input class="form-control" type="number" min="0" name="estoque" placeholder="Quantidade total em estoque" value="<?php echo $produto_item['estoque']?>"/>
					<?php echo form_error('estoque', '<p class="error-feedback">'); ?>
				</div>
			</div>
			<fieldset>
				<legend>Imagens</legend>
				<?php if ($produto_item['imagem']) { ?>
				<div class="row mb-4">
					<div class="col-6">
						<figure class="figure">
							<img src="<?php echo base_url() . "_assets/uploads/" . $produto_item['imagem']; ?>" class="figure-img img-fluid rounded" alt="">
						</figure>
						<a class="btn btn-danger" href="<?php echo base_url() . "produto/delete_img/" . $produto_item['id_imagem'] . "/" . $produto_item['id']; ?>"><span class="icon icon-close"></span> Remover</a>
					</div>
				</div>
				<?php } ?>

				<?php if (!$produto_item['imagem']) { ?>
				<div class="form-group">
					<label for="imagem">Imagem</label>
					<input class="form-control-file" type="file" name="imagem" placeholder="jpg ou png"/>
					<?php echo isset($error) ? $error : '';?>
					<?php echo form_error('imagem', '<p class="error-feedback">'); ?>
				</div>
				<?php } ?>
			</fieldset>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
