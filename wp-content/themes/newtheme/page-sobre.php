<?php get_header(); ?>
	<h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
    <p>meu nome completo é <?php the_field('nome_completo'); ?></p>
    <p>meu email para contato é <?php the_field('email'); ?></p>
    <img src="<?php the_field('foto_do_rosto'); ?>">








    <h1 style="color: #c800ff;">Criando novo usuário</h1>

<!--    <form action="--><?php //echo esc_url( admin_url('admin-post.php') ); ?><!--" method="post">-->
<!--        <input type="hidden" name="action" value="novo_usuario">-->
<!---->
<!--        <input type="text" name="usuario" placeholder="usuário" required /><br>-->
<!--        <input type="email" name="email" placeholder="Email" required /><br>-->
<!--        <input type="password" name="senha" placeholder="senha" required><br>-->
<!---->
<!--        <input type="submit" value="enviar">-->
<!--    </form>-->


    <h1 style="color: #297e00;">Exibindo todos usuário</h1>

<?php

$usuarios = get_users( array('fields' => array('ID')));

foreach ($usuarios as $user){
    $campo_usarios = get_user_meta($user->ID);
    $dado_usuarios = get_userdata($user->id);


    print_r($dado_usuarios);


//    echo '<span>ID: ' . $dado_usuarios->ID . ',</span> ';
//	echo '<span>Usuário: ' . $dado_usuarios->user_login . ',</span> ';
//	echo '<span>E-mail: ' . $dado_usuarios->user_email . ',</span> ';
//	echo '<span>Data de Registro: ' . $dado_usuarios->user_registered . ',</span><br>';
}


?>


    <h1 style="color: #ff471d;">Exibir dados do usuário logado</h1>


<?php if ( is_user_logged_in() ) {
    $usuario_atual = wp_get_current_user();
    ?>
        <span>Olá <?php echo $usuario_atual->user_login; ?> </span>
    <a href="<?php echo wp_logout_url(); ?>"> | Logout</a>
<?php } else { ?>
    <a href="<?php echo get_home_url(). '/wp-login.php' ?>" title="Members Area Login" rel="home">Members Area</a>
<?php } ?>

<?php get_footer(); ?>