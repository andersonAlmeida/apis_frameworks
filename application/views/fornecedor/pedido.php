<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('fornecedor/create'); ?>
            <div class="form-group">
                <label for="nome">Nome</label>
				<input class="form-control" type="text" name="nome" />
				<?php echo form_error('nome', '<p class="error-feedback">'); ?>
            </div>
            <div class="form-group">
                <label for="razao_social">Razão Social</label>
				<input class="form-control" type="text" name="razao_social" />
				<?php echo form_error('razao_social', '<p class="error-feedback">'); ?>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ</label>
				<input class="form-control" type="text" name="cnpj" />
				<?php echo form_error('cnpj', '<p class="error-feedback">'); ?>
			</div>
			<!-- Telefone -->
			<fieldset>
				<legend>Telefone</legend>

				<div class="row">
					<div class="form-group col-6">
						<label for="nome_telefone">Identificação do Telefone</label>
						<input class="form-control" type="text" name="nome_telefone" placeholder="ex: Telefone do Trabalho" />
						<?php echo form_error('nome_telefone', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-6">
						<label for="numero">Número</label>
						<input class="form-control" type="tel" name="numero" />
						<?php echo form_error('numero', '<p class="error-feedback">'); ?>
					</div>
				</div>
			</fieldset>
			<!-- Endereço -->
			<fieldset>
				<legend>Endereço</legend>

				<div class="form-group">
					<label for="nome_endereco">Identificação do endereço</label>
					<input class="form-control" type="text" name="nome_endereco" placeholder="ex: Endereço do Trabalho" />
					<?php echo form_error('nome_endereco', '<p class="error-feedback">'); ?>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label for="cep">CEP</label>
						<input class="form-control" type="text" name="cep" />
						<?php echo form_error('cep', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-6">
						<label for="bairro">Bairro</label>
						<input class="form-control" type="text" name="bairro" />
						<?php echo form_error('bairro', '<p class="error-feedback">'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="logradouro">Logradouro</label>
					<input class="form-control" type="text" name="logradouro" />
					<?php echo form_error('logradouro', '<p class="error-feedback">'); ?>
				</div>
				<div class="row">
					<div class="form-group col-4">
						<label for="numero_endereco">Número</label>
						<input class="form-control" type="text" name="numero_endereco" />
						<?php echo form_error('numero_endereco', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-4">
						<label for="cidade">Cidade</label>
						<input class="form-control" type="text" name="cidade" />
						<?php echo form_error('cidade', '<p class="error-feedback">'); ?>
					</div>
					<div class="form-group col-4">
						<label for="estado">Estado</label>
						<input class="form-control" type="text" name="estado" />
						<?php echo form_error('estado', '<p class="error-feedback">'); ?>
					</div>
				</div>
				<input type="hidden" name="tipo" value="0">
			</fieldset>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Salvar</button>
            </div>
        </form>
    </div>
</div>
