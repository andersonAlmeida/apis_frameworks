<div class="row new_entry">
    <div class="col-12 text-right">
        <a target="_self" class="btn btn-primary" href="<?php echo site_url('administrador/create'); ?>">Adicionar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Função</th>
                <th scope="col">Editar / Excluir</th>
            </thead>
            <?php                
                $i = 1; 
                foreach ($admins as $admin): ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $admin['nome']; ?></td>
                    <td><?php echo $admin['email']; ?></td>
                    <td><?php echo $admin['funcao_nome']; ?></td>
                    <td>
                    <a href="<?php echo site_url('administrador/edit/'.$admin['id']); ?>">Editar</a> /
                    <a href="<?php echo site_url('administrador/delete/'.$admin['id']); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>    
    </div>
</div>
