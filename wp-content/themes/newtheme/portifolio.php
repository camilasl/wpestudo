<?php /* Template Name: Portifolio */ ?>

<?php get_header(); ?>

<?php
$args = array(
	'post_type' => array(
		'bolo',
		'cenoura'
	)

);
$loop = new WP_Query( $args );
if( $loop->have_posts() ) {
	?>

    <div>
		<?php while( $loop->have_posts() ) {
			$loop->the_post(); ?>
            <a href="<?php the_permalink();?>">
                <h2><?php the_title(); ?></h2>
				<?php $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                <img src="<?php echo $img_url ?>" alt="">
                <p><?php the_content(); ?></p>
            </a>




		<?php } ?>
    </div>

<?php } ?>
<?php get_footer(); ?>
