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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="home_coordenador.html">Thoth</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cadastrar">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCadastrar" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Cadastrar</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseCadastrar">
                        <li>
                            <a href="home_coordenador_cadastrar_aluno.html">Aluno</a>
                        </li>
                        <li>
                            <a href="home_coordenador_cadastrar_corretor.html">Corretor</a>
                        </li>
                        <li>
                            <a href="home_coordenador_cadastrar_erros.html">Erros Comuns</a>
                        </li>
                        <li>
                            <a href="home_coordenador_cadastrar_comentarios.html">Comentários Comuns</a>
                        </li>
                        <li>
                            <a href="home_coordenador_cadastrar_criterio.html">Critério</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Consultar">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseConsultar" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Consultar</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseConsultar">
                        <li>
                            <a href="home_coordenador_consultar_acessocorretor.html">Acesso Corretor</a>
                        </li>
                        <li>
                            <a href="home_coordenador_consultar_redacoesentregues.html">Redações Entregues</a>
                        </li>
                        <li>
                            <a href="home_coordenador_consultar_redacoescorrigidas.html">Redações Corrigidas</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Exportar">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExportar" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Exportar</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExportar">
                        <li>
                            <a href="home_coordenador_exportar_notas.html">Nota de Alunos</a>
                        </li>
                    </ul>
                </li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Designar">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDesignar" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Designar</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseDesignar">
                        <li>
                            <a href="home_coordenador_designar_alunos.html">Alunos com Corretor</a>
                        </li>
                    </ul>
                </li>
			</ul>
			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#exampleModal">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="container">
		      	<form  method="post" action="<?= base_url("coordenadores/cadastro_aluno"); ?>">
					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="hash">Hash</label>
								<input type="text" name="hash" class="form-control" id="hash" placeholder="Hash">
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
                    <div class="form-group">
    					<div class="row">
    					    <div class="col-md-2"><a class="btn btn-primary btn-block" href="#">Gerar Hash</a></div>
    					    <div class="col-md-10"></div>
    					</div>
					</div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="unidade">Unidade:</label>
                                <select class="form-control" id="unidade" name="unidade">
                                    <option>São José dos Campos</option>
                                    <option>São Paulo</option>
                                    <option>Rio de Janeiro</option>
                                </select>
							</div>
							<div class="col-md-4"></div>
						</div>
					</div>
                    <div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="turma">Hash</label>
								<input  type="text" name="turma" class="form-control" id="turma" placeholder="Turma">
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
						<a class="btn btn-primary" href="login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>

</body>
</html>