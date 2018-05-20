<html>
<body>

    <div>
        <form method="post" action="<?= base_url("coordenadores/cadastro_corretor"); ?>">
            <input type="text" name="hashcorretor" />
            <span><?php echo form_error('hashcorretor'); ?></span>
            <input type="submit" name="cadastrar", value="Cadastrar" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

</body>
</html>