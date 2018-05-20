<html>
<body>

    <div>
        <form method="post" action="<?= base_url("coordenadores/cadastro_erros_comuns"); ?>">
            <textarea rows="4" cols="50" name="descricao">
            <span><?php echo form_error('descricao'); ?></span>
            <input type="submit" name="cadastrar", value="Cadastrar" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

</body>
</html>