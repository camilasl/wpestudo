<?php /* Template Name: Contato */ ?>

<?php get_header(); ?>

<h1 style="color: #3E8BFF;">Criando novo post</h1>

<form action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post" ">
    <input type="hidden" name="action" value="nova_postagem">
    <?php if (isset($_GET['success'])):?>
    <div style="background-color: green;">
        <p>Sucesso Caralho !</p>
    </div>
    <?php endif; ?>

	<?php if (isset($_GET['error'])):?>
        <div style="background-color: red;">
            <p>Que Merda !</p>
        </div>
	<?php endif; ?>


	<input type="text" name="titulo" placeholder="titulo da postagem" required /><br>
	<textarea name="conteudo" placeholder="conteudo da postagem" required></textarea><br>
    <input type="submit" name="submit" value="enviar">
</form>











<?php get_footer(); ?>



