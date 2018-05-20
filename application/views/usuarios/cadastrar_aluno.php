<html>
<body>

    <div>
        <form method="post" action="<?= base_url("usuarios/cadastro_aluno_validation"); ?>">
            <input type="text" name="login" />
            <span><?php echo form_error('login'); ?></span>
            <input type="text" name="senha" />
            <span><?php echo form_error('senha'); ?></span>
            <input type="text" name="nome" />
            <span><?php echo form_error('nome'); ?></span>
            <input type="text" name="rm" />
            <span><?php echo form_error('rm'); ?></span>
            <input type="submit" name="cadastrar", value="Cadastrar" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

</body>
</html>