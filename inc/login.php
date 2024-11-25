<?php
    include("../config.php");
    include(HEADER_TEMPLATE);
?>
        <div id="actions" class="mt-4 mb-5" >
            <form action="valida.php" method="post">
                <div class="row justify-content-center align-items-center">
					<h2 class="mb-2 text-center">Realize seu login</h2>
				
                    <!--Usuário-->
                    <div class="form-floating col-5 mb-2 mt-3">
                        <input type="text" class="form-control" id="log" placeholder="usuário" name="login">
                        <label for="log">Usuário</label>
                    </div>
				</div>
                <div class="row justify-content-center align-items-center">
                    <!--Senha-->
                    <div class="form-floating col-5 mb-2">
                        <input type="password" class="form-control" id="pass" placeholder="senha" name="senha">
                        <label for="pass">Senha</label>
                    </div>
                    <!--Submit-->
                    <div class="col-12 mb-2 d-flex justify-content-center gap-2">
                        <button type="submit" class="btn btn-secondary btn-block mb-4"><i class="fa-solid fa-user-check"></i> Conectar</button>
                        <a href="<?php echo BASEURL; ?>" class="btn btn-light btn-block mb-4"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
                    </div>
				  </div>
            </form>
        </div>
<?php include(FOOTER_TEMPLATE); ?>