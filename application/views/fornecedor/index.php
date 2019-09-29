<div class="row new_entry">
    <div class="col-12 text-right">
        <a target="_self" class="btn btn-primary" href="<?php echo site_url('fornecedor/create'); ?>">Adicionar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Editar / Excluir</th>
            </thead>
            <?php
                $i = 1;
                foreach ($fornecedores as $fornecedor): ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><a class="view-details-link" href="<?php echo site_url('fornecedor/view/'.$fornecedor['id']); ?>"><span class="icon icon-search"></span> <?php echo $fornecedor['nome']; ?></a></td>
                    <td><?php echo $fornecedor['telefone']; ?></td>
                    <td>
                        <a href="<?php echo site_url('fornecedor/edit/'.$fornecedor['id']); ?>">Editar</a> /
                        <a href="<?php echo site_url('fornecedor/delete/'.$fornecedor['id']); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
