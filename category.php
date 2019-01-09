
<?php get_header(); ?>
<?php get_template_part( 'template-parts/header' );?>

<main>
    <div id="content">
    <div class="category__header">
    Kategoria: <?php echo single_cat_title("", false) ?>
    </div>

       <?php $current_category = single_cat_title("", false); ?>
      <?php
        $args = array(
            'category_name'  => $current_category
        );  
        $the_query = new WP_Query( $args ); ?>
        <?php
        if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <?php get_template_part( 'template-parts/post','category' );?>
            <?php endwhile; else: ?>
              <?php get_template_part( 'template-parts/nopost' );?>
            <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php get_template_part( 'template-parts/sidebar' );?>
  </main>
<!--


  <div class="entry">
    <h1></h1> -->



<?php get_footer(); ?>
