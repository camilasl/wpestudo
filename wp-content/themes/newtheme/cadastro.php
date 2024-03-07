<?php /* Template Name: Cadastro */ ?>

<?php get_header(); ?>

<div class="cadastro" >
	<div class="container">
		<div class="row center">
			<div class="col-md-4">
				<div class="area-cadastro">
                    <a href="#" title=" " rel=" ">
                        <img src="<?php the_images('jfsexy-icon.png'); ?>">
                    </a>
                    <h2>Criar Conta</h2>

                    <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
                        <input type="hidden" name="action" value="novo_usuario">

                        <label for="input-nome">Nome:</label>
                        <input type="text" name="nome" placeholder="Nome" id="input-nome" required><br>

                        <label for="input-sobrenome">Sobrenome:</label>
                        <input type="text" name="sobrenome" placeholder="Sobrenome" id="input-sobrenome" required><br>

                        <label for="input-usuario">Usuário:</label>
                        <input type="text" name="usuario" placeholder="Usuário" id="input-usuario" required><br>

                        <label for="input-email">E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" id="input-email" required><br>

                        <label for="input-senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" id="input-senha" required><br>

                        <input type="submit" id="btn-enviar" value="Registrar">
                    </form>

                    <div class="link-conta">
                        <p>Já possui conta ?&nbsp<a href="<?php echo get_home_url(). '/wp-login.php' ?>"> Entre Aqui</a> </p>
                    </div>


				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

