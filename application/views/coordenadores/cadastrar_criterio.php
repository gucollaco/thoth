<html>
<body>

    <div>
        <form method="post" action="<?= base_url("coordenadores/cadastro_criterios"); ?>">
            <textarea rows="4" cols="50" name="descricao">
            <span><?php echo form_error('descricao'); ?></span>
            <input type="submit" name="cadastrar", value="Cadastrar" />
            <?php
                echo $this->session->flashdata("error");
            ?>
        </form>
    </div>

    <div class="content-wrapper">
		<div class="container-fluid">
			<div class="container">
		      	<form method="post" action="<?= base_url("coordenadores/cadastro_criterios"); ?>">
					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="nome">Nome:</label>
								<input class="form-control" id="nome" placeholder="Nome">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="descricao">Descrição:</label>
								<textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Inserir Descrição"></textarea>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="notatotal">Nota total:</label>
								<input type="text" name="notatotal" class="form-control" id="notatotal" placeholder="Nota total">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="categoria">Categoria:</label>
                                <select name="categoria" class="form-control" id="categoria">
                                    <option>ENEM</option>
                                    <option>FUVEST</option>
                                    <option>VUNESP</option>
                                    <option>ITA</option>
                                </select>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="infoadicionais">Informações Adicionais:</label>
								<textarea name="extra" class="form-control" id="infoadicionais" rows="3" placeholder="Inserir Informações Adicionais"></textarea>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
                            <div class="col-md-2"><input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary btn-block"/></div>
                            
						    <div class="col-md-10"></div>
						</div>
					</div>
				</form>
		    </div>
		</div>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Thoth - 2018</small>
				</div>
			</div>
		</footer>
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
	      	<i class="fa fa-angle-up"></i>
	    </a>
		<!-- Logout Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
		              		<span aria-hidden="true">×</span>
		            	</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="<?=base_url('Usuarios/logout')?>">Logout</a>
					</div>
				</div>
			</div>
		</div>

</body>
</html>