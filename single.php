<?php get_header(); ?>
<?php get_template_part( 'template-parts/header' );?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="post_header">       
    <div class="post_header_img" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post_id, 'cover-post-thumb' )?>)"></div>
    <div class="post_header_title_wrapper">
      <div class="post_header_title">
        <?php the_title(); ?>
      </div> 
    </div>
  </div>
  <main>
    <div id="content" class="post_content">    
     <?php the_content(); ?> 
    </div>
    <?php get_template_part( 'template-parts/sidebar' );?>
  </main>
<?php endwhile; else: ?>
  <p>Coś poszło nie tak :( </p>
<?php endif; ?>

<?php get_footer(); ?>
