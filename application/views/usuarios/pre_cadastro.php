<html>
<body>

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-55 p-b-30">
				<form method="post" action="<?= base_url("usuarios/cadastro_aluno_validation()"); ?>" class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						Thoth
					</span>


					<div class="text-center w-full p-b-20">
						<span class="txt1" style="font-size: 16px;">
							Entre com o código de cadastro fornecido pelo coordenador:
						</span>
                    </div>
                    
					<div class="wrap-input100 validate-input" data-validate="Hashbode is required">
						<input class="input100" type="text" name="code" placeholder="Código de cadastro">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-link"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-16">
						<button type="submit" name="continuar" value="Continuar" class="login100-form-btn" style="height: 62px; width: auto; margin-left: auto;">
							Continuar
						</button>
					</div>

					<div class="text-center w-full p-t-65">
						<span class="txt1">
							Ja possui uma conta?
						</span>

						<a class="txt1 bo1 hov1" href="<?=base_url('login')?>">
							Entrar				
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>