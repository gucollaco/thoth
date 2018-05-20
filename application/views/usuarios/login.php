<html>
<body>

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-55 p-b-30">
				<form method="post" action="<?= base_url("usuarios/login_validation"); ?>" class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						Thoth
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100"t type="text" name="login" placeholder="Login">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-20">
						<button class="login100-form-btn" type="submit" name="entrar" value="Login" >
							Entrar
						</button>
					</div>

					<div class="text-center w-full p-t-65">
						<span class="txt1">
							Não possui uma conta?
						</span>

						<a class="txt1 bo1 hov1" href="<?=base_url('pre_cadastro')?>">
							Cadastre-se							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>