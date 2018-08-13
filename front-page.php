<?php get_header(); ?>
<?php get_template_part( 'template-parts/header' );?>
<main>
    <div id="content">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/post' );?>

        <?php endwhile; else: ?>
          <p><?php _e('Nie znaleziono postów spełniających podane kryteria.'); ?></p>
        <?php endif; ?>
    </div>
    <?php get_template_part( 'template-parts/sidebar' );?>
  </main>



<?php get_footer(); ?>
