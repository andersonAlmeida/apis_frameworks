<div class="row new_entry">
    <div class="col-12 text-right">
        <a target="_self" class="btn btn-primary" href="<?php echo site_url('categoria/create'); ?>">Adicionar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Editar / Excluir</th>
            </thead>
            <?php
                $i = 1;
                foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $categoria['nome']; ?></td>
                    <td>
                        <a href="<?php echo site_url('categoria/edit/'.$categoria['id']); ?>">Editar</a> /
                        <a href="<?php echo site_url('categoria/delete/'.$categoria['id']); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
