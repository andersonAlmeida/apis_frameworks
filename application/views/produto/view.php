<div class="row">
	<div class="col-12">
		<?php if ($produto_item['imagem']) { ?>
			<div class="row mb-4">
				<div class="col-6">
					<figure class="figure">
						<img src="<?php echo base_url() . "_assets/uploads/" . $produto_item['imagem']; ?>" class="figure-img img-fluid rounded" alt="">
					</figure>
				</div>
			</div>
		<?php } ?>
		<p><strong>Nome:</strong> <?php echo $produto_item['nome']; ?></p>
		<p><strong>Marca:</strong> <?php echo $produto_item['marca']; ?></p>
		<p><strong>Categoria:</strong> <?php echo $produto_item['categoria']; ?></p>
		<p><strong>Preço:</strong> <?php echo $produto_item['preco']; ?></p>
		<p><strong>Desconto:</strong> <?php echo $produto_item['desconto']; ?></p>
		<p><strong>Quantidade em estoque:</strong> <?php echo $produto_item['estoque']; ?></p>
		<a class="btn btn-primary mt-3" href="<?php echo site_url('produto/edit/'.$produto_item['id']); ?>"><span class="icon icon-form"></span> Editar</a>
	</div>
</div>
