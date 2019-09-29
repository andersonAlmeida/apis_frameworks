<div class="row new_entry">
    <div class="col-12 text-right">
        <a target="_self" class="btn btn-primary" href="<?php echo site_url('produto/create'); ?>">Adicionar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Estoque</th>
                <th scope="col">Editar / Excluir</th>
            </thead>
            <?php
                $i = 1;
                foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><a class="view-details-link" href="<?php echo site_url('produto/view/'.$produto['id']); ?>"><span class="icon icon-search"></span> <?php echo $produto['nome']; ?></a></td>
                    <td><?php echo $produto['preco']; ?></td>
                    <td><?php echo $produto['categoria']; ?></td>
                    <td><?php echo $produto['estoque']; ?></td>
                    <td>
                        <a href="<?php echo site_url('produto/edit/'.$produto['id']); ?>">Editar</a> /
                        <a href="<?php echo site_url('produto/delete/'.$produto['id']); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
