<html>
<body>

    <div>
        <form method="post" action="<?= base_url("usuarios/cadastro_aluno_validation"); ?>">
            <textarea rows="4" cols="50" name="observacao">
            <span><?php echo form_error('observacao'); ?></span>
            <input type="text" name="semana" />
            <span><?php echo form_error('semana'); ?></span>
            <input type="text" name="caminho" />
            <span><?php echo form_error('caminho'); ?></span>
            <input type="text" name="datahora" />
            <span><?php echo form_error('datahora'); ?></span>
            <select name="categoria">
                <option value="enem">ENEM</option>
                <option value="fuvest">FUVEST</option>
                <option value="vunesp">VUNESP</option>
                <option value="ita">ITA</option>
            </select>
            <select name="coletanea">
                <option value="1">Desigualdade Social no Brasil</option>
                <option value="2">Pobreza no Brasil</option>
                <option value="3">Preparar o Brasil para os idosos</option>
                <option value="4">Sistema Educacional no Brasil</option>
            </select>
            <input type="submit" name="submeter", value="Submeter" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

</body>
</html>