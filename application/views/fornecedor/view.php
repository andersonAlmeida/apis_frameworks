<div class="row">
	<div class="col-12">
		<p><strong>Razão Social:</strong> <?php echo $fornecedor_item['razao_social']; ?></p>
		<p><strong>Nome Fantasia:</strong> <?php echo $fornecedor_item['nome']; ?></p>
		<p><strong>CNPJ:</strong> <?php echo $fornecedor_item['cnpj']; ?></p>
		<p><strong>Telefone:</strong> <?php echo $fornecedor_item['telefone']; ?></p>
		<p><strong>Endereço:</strong>
			<?php echo $fornecedor_item['logradouro'] . ", "
			. $fornecedor_item['numero'] . " - "
			. $fornecedor_item['bairro'] . ", "
			. $fornecedor_item['cidade'] . " - "
			. $fornecedor_item['estado'] . ", "
			. $fornecedor_item['cep']
			?>
		</p>
		<a class="btn btn-primary mt-3" href="<?php echo site_url('fornecedor/edit/'.$fornecedor_item['id']); ?>"><span class="icon icon-form"></span> Editar</a>
	</div>
</div>
