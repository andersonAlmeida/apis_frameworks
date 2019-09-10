<table class="table table-striped">
    <thead class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Telefone</th>
        <th scope="col">Link</th>
        <th scope="col">Editar / Excluir</th>
    </thead>
    <?php
        $i = 1; 
        foreach ($contatos as $contato): ?>
        <tr>
            <td><?php echo $i; $i++;?></td>
            <td><?php echo $contato['nome']; ?></td>
            <td><?php echo $contato['email']; ?></td>
            <td><?php echo $contato['telefone']; ?></td>
            <td><a href="<?php echo site_url('contatos/'.$contato['id']); ?>">Ver detalhes</a></td>
            <td>
            <a href="<?php echo site_url('contatos/edit/'.$contato['id']); ?>">Editar</a> /
            <a href="<?php echo site_url('contatos/delete/'.$contato['id']); ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>    