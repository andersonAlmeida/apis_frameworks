<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('fornecedor/edit/' . $fornecedor_item['id']); ?>
            <div class="form-group">
                <label for="nome">Nome</label>
				<input class="form-control" type="text" name="nome" value="<?php echo $fornecedor_item['nome']; ?>"/>
				<?php echo form_error('nome', '<p class="error-feedback">'); ?>
            </div>
            <div class="form-group">
                <label for="razao_social">Razão Social</label>
				<input class="form-control" type="text" name="razao_social" value="<?php echo $fornecedor_item['razao_social']; ?>"/>
				<?php echo form_error('razao_social', '<p class="error-feedback">'); ?>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
				<input class="form-control" type="text" name="cnpj" value="<?php echo $fornecedor_item['cnpj']; ?>"/>
				<?php echo form_error('cnpj', '<p class="error-feedback">'); ?>
			</div>
			<!-- Telefone -->
			<fieldset>
				<legend>Telefone</legend>
				<input type="hidden" name="id_telefone" value="<?php echo $fornecedor_item['id_telefone']; ?>">
				<div class="row">
					<div class="form-group col-6">
						<label for="nome_telefone">Identificação do Telefone</label>
						<input class="form-control" type="text" name="nome_telefone" placeholder="ex: Telefone do Trabalho" value="<?php echo $fornecedor_item['nome_telefone']; ?>"/>
						<?php echo form_error('nome_telefone', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-6">
						<label for="numero">Número</label>
						<input class="form-control" type="tel" name="numero" value="<?php echo $fornecedor_item['telefone']; ?>"/>
						<?php echo form_error('numero', '<p class="error-feedback">'); ?>
					</div>
				</div>
			</fieldset>
			<!-- Endereço -->
			<fieldset>
				<legend>Endereço</legend>
				<input type="hidden" name="id_endereco" value="<?php echo $fornecedor_item['id_endereco']; ?>">
				<div class="form-group">
					<label for="nome_endereco">Identificação do endereço</label>
					<input class="form-control" type="text" name="nome_endereco" placeholder="ex: Matriz" value="<?php echo $fornecedor_item['nome_endereco']; ?>"/>
					<?php echo form_error('nome_endereco', '<p class="error-feedback">'); ?>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label for="cep">CEP</label>
						<input class="form-control" type="text" name="cep" value="<?php echo $fornecedor_item['cep']; ?>"/>
						<?php echo form_error('cep', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-6">
						<label for="bairro">Bairro</label>
						<input class="form-control" type="text" name="bairro" value="<?php echo $fornecedor_item['bairro']; ?>" />
						<?php echo form_error('bairro', '<p class="error-feedback">'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="logradouro">Logradouro</label>
					<input class="form-control" type="text" name="logradouro" value="<?php echo $fornecedor_item['logradouro']; ?>" placeholder="Av., Rua, Estrada"/>
					<?php echo form_error('logradouro', '<p class="error-feedback">'); ?>
				</div>
				<div class="row">
					<div class="form-group col-4">
						<label for="numero_endereco">Número</label>
						<input class="form-control" type="text" name="numero_endereco" value="<?php echo $fornecedor_item['numero']; ?>"/>
						<?php echo form_error('numero_endereco', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-4">
						<label for="cidade">Cidade</label>
						<input class="form-control" type="text" name="cidade" value="<?php echo $fornecedor_item['cidade']; ?>"/>
						<?php echo form_error('cidade', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-4">
						<label for="estado">Estado</label>
						<input class="form-control" type="text" name="estado" value="<?php echo $fornecedor_item['estado']; ?>"/>
						<?php echo form_error('estado', '<p class="error-feedback">'); ?>
					</div>
				</div>
				<input type="hidden" name="tipo" value="0">
				<input type="hidden" name="id" value="<?php echo $fornecedor_item['id']; ?>">
			</fieldset>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
