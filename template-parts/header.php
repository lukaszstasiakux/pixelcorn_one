<header>
  <div class="logo__header">
    <?php
        if ( function_exists( 'the_custom_logo' ) ) {
          the_custom_logo();
      }
      ?>
  </div>
  <?php
    wp_nav_menu( array(
      'theme_location' => 'header-menu',
      'menu_class' => 'menu__header'
      ) ); 
  ?>
</header>