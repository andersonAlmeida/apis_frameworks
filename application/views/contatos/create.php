
<?php echo validation_errors(); ?>

<?php echo form_open('contatos/create'); ?>

    <label for="nome">Nome</label>
    <input type="input" name="nome" /><br />

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email"><br>

    <label for="telefone">telefone</label>
    <input type="text" name="telefone"><br />

    <input type="submit" name="submit" value="Create news item" />

</form>