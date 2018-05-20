<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="    height: 56px;">
		<a class="navbar-brand" href="<?=base_url('coordenadores/home')?>">Thoth</a>
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
                            <a href="<?=base_url('coordenadores/cadastrar_aluno')?>">Aluno</a>
                        </li>
                        <li>
                            <a href="<?=base_url('coordenadores/cadastrar_corretor')?>">Corretor</a>
                        </li>
                        <li>
                            <a href="<?=base_url('coordenadores/cadastrar_erros_comuns')?>">Erros Comuns</a>
                        </li>
                        <li>
                            <a href="<?=base_url('coordenadores/cadastrar_comentarios_comuns')?>">Comentários Comuns</a>
                        </li>
                        <li>
                            <a href="<?=base_url('coordenadores/cadastrar_criterios')?>">Critério</a>
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
                            <a href="<?=base_url('coordenadores/consultar_corretores')?>">Acesso Corretor</a>
                        </li>
                        <li>
                            <a href="<?=base_url('coordenadores/consultar_redacoes_entregues')?>">Redações Entregues</a>
                        </li>
                        <li>
                            <a href="<?=base_url('coordenadores/consultar_redacoes_corrigidas')?>">Redações Corrigidas</a>
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
                            <a href="<?=base_url('coordenadores/exportar_notas')?>">Nota de Alunos</a>
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
                            <a href="<?=base_url('coordenadores/designar_alunos')?>">Alunos com Corretor</a>
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
                    <a class="btn btn-primary" href="<?=base_url('Usuarios/logout')?>">Logout</a>
				</li>
			</ul>
		</div>
	</nav>