<h2><?php echo $title; ?></h2>

<?php foreach ($contatos as $contato): ?>

    <h3><?php echo $contato['nome']; ?></h3>
    <div class="main">
        <?php echo $contato['email']; ?>
        <?php echo $contato['telefone']; ?>
    </div>
    <p><a href="<?php echo site_url('contatos/'.$contato['id']); ?>">View article</a></p>

<?php endforeach; ?>