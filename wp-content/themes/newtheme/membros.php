<?php /* Template Name: Membros */ ?>

<?php get_header( 'special' ); ?>

<?php
if (is_user_logged_in()){
	$usuario_atual = wp_get_current_user();
?>
        <div class="membros">
            <div class="container">
                <div class="row">
                    <div class="membro-pagina-inicial">
                        <div class="imagem-perfil">
                            <img src="<?php the_images('do-utilizador.png'); ?>" alt="Usuário sem imagem">
                        </div>
                        <div class="membros-cabecalho">
                            <h1>Olá <span><?php echo $usuario_atual->nickname; ?></span></h1>
                            <p>Último login: <?php echo ultimo_login($usuario_atual->id); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="membros-planos">
                        <h2>Detalhes da Assinatura</h2>
                        <p>Olá <span><?php echo $usuario_atual->nickname; ?> estamos felizes por você fazer parte do Premium</p>
                        <div class="planos">
                            <div class="plano-col">
                                <h3>Plano</h3>
                                <span class="info-plano">Premium</span>
                                <span class="info-plano">R$55,90/mês</span>
                            </div>
                            <div class="plano-col">
                                <h3>Data de término</h3>
                                <span class="info-plano">17 de março de 2024</span>
                            </div>
                            <div class="plano-col">
                                <a href="#">Clique aqui para Renovar plano</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
}else{
	$redirect = get_home_url(). '/login';
	echo("<script>location.href = '".$redirect."'</script>");
	exit();
}
?>

<?php get_footer(); ?>