<html>
<body>

    <div>
        <form method="post" action="<?= base_url("coordenadores/cadastro_aluno"); ?>">
            <input type="text" name="hash" />
            <span><?php echo form_error('hash'); ?></span>
            <input type="text" name="unidade" />
            <span><?php echo form_error('unidade'); ?></span>
            <input type="text" name="turma" />
            <span><?php echo form_error('turma'); ?></span>
            <input type="submit" name="cadastrar", value="Cadastrar" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

</body>
</html>