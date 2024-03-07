<?php get_header(); ?>

<h1>single</h1>

<h2><?php the_title(); ?></h2>
<p><?php the_content(); ?></p>
<img src="<?php the_post_thumbnail_url(); ?>">


<?php get_footer(); ?>
