<?php echo validation_errors(); ?>

<?php echo form_open('contatos/edit/' . $contatos_item['id']); ?>

    <input type="hidden" name="id" value="<?php echo $contatos_item['id'] ?>">

    <label for="nome">Nome</label>
    <input type="input" name="nome" value="<?php echo $contatos_item['nome'] ?>"/><br />

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" value="<?php echo $contatos_item['email'] ?>"><br>

    <label for="telefone">telefone</label>
    <input type="text" name="telefone" value="<?php echo $contatos_item['telefone'] ?>"><br />

    <input type="submit" name="submit" value="Edit news item" />

</form>