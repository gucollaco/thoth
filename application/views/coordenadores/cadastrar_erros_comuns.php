<html>
<body>

    <div class="content-wrapper">
		<div class="container-fluid">
			<div class="container">
		      	<form method="post" action="<?= base_url("coordenadores/cadastro_erros_comuns"); ?>">
					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="erro">Erro Comum</label>
								<textarea class="form-control" id="erro" rows="3" name="descricao" placeholder="Inserir Erro"></textarea>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
					<div class="row">
					    <div class="col-md-2"><input type="submit" class="btn btn-primary btn-block" name="cadastrar", value="Cadastrar" /></div>
            
					    <div class="col-md-10"></div>
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