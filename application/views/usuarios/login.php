<html>
<body>

    <div>
        <?php echo $this->session->userdata('login'); ?>
        <form method="post" action="<?= base_url("usuarios/login_validation"); ?>">
            <input type="text" name="login" />
            <span><?php echo form_error('login'); ?></span>
            <input type="text" name="senha" />
            <span><?php echo form_error('senha'); ?></span>
            <input type="submit" name="entrar", value="Login" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

</body>
</html>