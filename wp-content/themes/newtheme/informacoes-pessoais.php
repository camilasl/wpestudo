<?php /* Template Name: Informacoes Pessoais */ ?>

<?php get_header( 'special' ); ?>

<?php
if (is_user_logged_in()){
	$usuario_atual = wp_get_current_user();
	$id = $usuario_atual->id;
?>

	<div class="info-pessoal">
		<div class="container">
			<div class="row">
				<h1>Informações pessoais</h1>
			</div>
			<div class="row">
				<div class="caixa-informacao">
					<span class="label">Usuário</span>
					<span class="field"><?php echo $usuario_atual->user_login; ?></span>
					<hr>
					<span class="label">Nome Completo</span>
					<span class="field"><?php echo $usuario_atual->first_name . ' ' . $usuario_atual->last_name; ?></span>
					<hr>
					<span class="label">E-mail</span>
					<span class="field"><?php echo $usuario_atual->user_email; ?></span>
					<hr>
					<span class="label">CPF</span>
					<span class="field"><?php the_field('cpf', 'user_'. $id); ?></span>
					<hr>
					<span class="label">Data de Nascimento</span>
					<span class="field"><?php the_field('data_de_nascimento', 'user_'. $id); ?></span>
					<hr>
					<span class="label">Telefone Pessoal</span>
					<span class="field"><?php the_field('telefone_pessoal', 'user_'. $id); ?></span>
					<hr>
					<h2>Endereço</h2>
					<div class="area-endereco">
						<div class="campo-endereco">
							<span class="label">Rua</span>
							<span class="field"><?php the_field('rua', 'user_'. $id); ?></span>
						</div>

						<div class="campo-endereco">
							<span class="label">Número</span>
							<span class="field"><?php the_field('numero', 'user_'. $id); ?></span>
						</div>
						<div class="campo-endereco">
							<span class="label">Bairro</span>
							<span class="field"><?php the_field('bairro', 'user_'. $id); ?></span>
						</div>
						<div class="campo-endereco">
							<span class="label">Cidade</span>
							<span class="field"><?php the_field('cidade', 'user_'. $id); ?></span>
						</div>
						<div class="campo-endereco">
							<span class="label">UF</span>
							<span class="field"><?php the_field('uf', 'user_'. $id); ?></span>
						</div>
						<div class="campo-endereco">
							<span class="label">CEP</span>
							<span class="field"><?php the_field('cep', 'user_'. $id); ?></span>
						</div>
					</div>
					<div class="area-documento">
                        <div class="img-documento">
                            <h2>Documento - Frente</h2>
                            <img src="<?php the_field( 'documento_frente', 'user_' . $id ); ?>" alt="Documento Frente">
                        </div>
                        <div class="img-documento">
                            <h2>Documento - Verso</h2>
                            <img src="<?php the_field( 'documento_verso', 'user_' . $id ); ?>" alt="Documento Frente">
                        </div>
					</div>
                    <div class="btn-atualiza">
                        <a href="<?php echo get_home_url(). '/atualizar-informacao-pessoal/' ?>" rel="#">Atualizar dados</a>
                    </div>
				</div>
			</div>
		</div>
	</div>


	 <br>
	<?php  ?> <br>


<?php
}else{
	$redirect = get_home_url(). '/login';
	echo("<script>location.href = '".$redirect."'</script>");
	exit();
}
?>

<?php get_footer(); ?>
