<html>
<body>

    <div>
        <form method="post" action="<?= base_url("usuarios/code_validation"); ?>">
            <input type="text" name="code" />
            <span><?php echo form_error('code'); ?></span>
            <input type="submit" name="continuar", value="Continuar" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

</body>
</html>