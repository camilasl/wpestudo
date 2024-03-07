<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/style.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="menu-login">
	<?php if ( is_user_logged_in() ) {
		$usuario_atual = wp_get_current_user();
		?>
        <span>Seja bem-vindo <?php echo $usuario_atual->user_login; ?> </span>
        <a href="<?php echo wp_logout_url(); ?>">&nbsp;| Logout</a>
	<?php } else { ?>
        <a href="<?php echo get_home_url(). '/cadastro'; ?>" title="Cadastro de membros" rel="home">
            <span>Cadastre-se | </span>
        </a>

        <a href="<?php echo get_home_url(). '/wp-login.php' ?>" title="Login área de membros" rel="home">
            <img src="<?php the_images('user-login.png'); ?>" alt="Entrar">
            <span>&nbsp;Entrar</span>
        </a>
	<?php } ?>
</div>


<div class="menu-principal">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                <img class="logo-menu" src="<?php the_images('jfsexy-logo.png'); ?>" alt="Logo JF Sexy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav mr-auto">
				    <?php
				    $args = array(
					    'theme_location' => 'header-menu'
				    );
				    wp_nav_menu($args);
				    ?>
                </ul>
            </div>
        </nav>
    </div>
</div>

