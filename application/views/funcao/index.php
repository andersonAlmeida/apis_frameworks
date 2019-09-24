<div class="row new_entry">
    <div class="col-12 text-right">
        <a target="_self" class="btn btn-primary" href="<?php echo site_url('funcao/create'); ?>">Adicionar</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Nível</th>
                <th scope="col">Editar / Excluir</th>
            </thead>
            <?php
                $i = 1; 
                foreach ($funcoes as $funcao): ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $funcao['nome']; ?></td>                    
                    <td><?php echo $funcao['nivel']; ?></td>                    
                    <td>
                        <a href="<?php echo site_url('funcao/edit/'.$funcao['id']); ?>">Editar</a> /
                        <a href="<?php echo site_url('funcao/delete/'.$funcao['id']); ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>    
    </div>
</div>
