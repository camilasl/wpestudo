<?php /* Template Name: Atualiza Informacoes Pessoais */ ?>

<?php get_header( 'special' ); ?>

<?php
if (is_user_logged_in()){
$usuario_atual = wp_get_current_user();
$id = $usuario_atual->id;

?>






    <form id="update-user-form">
        <input type="hidden" name="user_id" value="<?php echo get_current_user_id(); ?>">

        <label for="first_name">Primeiro Nome:</label><br>
        <input type="text" name="first_name" value="<?php echo esc_attr( wp_get_current_user()->first_name ); ?>"><br>

        <label for="last_name">Sobrenome:</label><br>
        <input type="text" name="last_name" value="<?php echo esc_attr( wp_get_current_user()->last_name ); ?>"><br>

        <label for="user_login">Login:</label><br>
        <input type="text" name="user_login" value="<?php echo esc_attr( wp_get_current_user()->user_login ); ?>"><br>

        <label for="user_email">Email:</label><br>
        <input type="email" name="user_email" value="<?php echo esc_attr( wp_get_current_user()->user_email ); ?>"><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" name="cpf" value="<?php echo esc_attr( get_field('cpf', 'user_' . get_current_user_id()) ); ?>"><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" value="<?php echo esc_attr( get_field('telefone_pessoal', 'user_' . get_current_user_id()) ); ?>"><br>

        <input type="submit" value="Atualizar">
    </form>





	<?php
}else{
	$redirect = get_home_url(). '/login';
	echo("<script>location.href = '".$redirect."'</script>");
	exit();
}
?>

<?php get_footer(); ?>
