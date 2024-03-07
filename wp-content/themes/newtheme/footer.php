<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a class="navbar-brand menu-rodape" href="<?php echo get_home_url(); ?>">
                    <img class="logo-rodape" src="<?php the_images('jfsexy-logo-rodape.png'); ?>" alt="Logo JF Sexy">
                </a>
            </div>
            <div class="col-md-3">
	            <div class="menu-rodape">
		            <?php
		            $args = array(
			            'theme_location' => 'header-menu'
		            );
		            wp_nav_menu($args);
		            ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-rodape">
                    <ul>
                        <li><a href="#" title="Teste" rel="Teste">Teste 01</a></li>
                        <li><a href="#" title="Teste" rel="Teste">Teste 02</a></li>
                        <li><a href="#" title="Teste" rel="Teste">Teste 03</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-rodape">
                    <ul>
                        <li>
                            <a href="#" title="Teste" rel="Teste">
                                <img src="<?php the_images('instagram.png'); ?>" alt="Instagram JF Sexy">
                                <span>@fulano_de_tal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Teste" rel="Teste">
                                <img src="<?php the_images('whatsapp.png'); ?>" alt="Whatsapp JF Sexy">
                                <span>(00)00000-0000</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Teste" rel="Teste">
                                <img src="<?php the_images('telefone.png'); ?>" alt="Telefone JF Sexy">
                                <span>(00)0000-0000</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Teste" rel="Teste">
                                <img src="<?php the_images('oemail.png'); ?>" alt="Email JF Sexy">
                                <span>fulanodetal@jfsexy.com</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
    jQuery(document).ready(function($) {
        $('#update-user-form').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: formData + '&action=update_user_data',
                success: function(response) {
                    alert('Dados do usuário atualizados com sucesso!');
                    // Faça qualquer outra ação desejada após a atualização dos dados
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('Erro ao atualizar dados do usuário:', errorThrown);
                }
            });
        });
    });
</script>

</body>
</html>