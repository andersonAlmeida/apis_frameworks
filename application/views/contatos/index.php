<table>
    <thead>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>link</th>
        <th>Editar / Excluir</th>
    </thead>
    <?php foreach ($contatos as $contato): ?>
        <tr>
            <td><?php echo $contato['nome']; ?></td>
            <td><?php echo $contato['email']; ?></td>
            <td><?php echo $contato['telefone']; ?></td>
            <td><a href="<?php echo site_url('contatos/'.$contato['id']); ?>">View article</a></td>
            <td>
            <a href="<?php echo site_url('contatos/edit/'.$contato['id']); ?>">Editar</a> <br>
            <a href="<?php echo site_url('contatos/delete/'.$contato['id']); ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>    