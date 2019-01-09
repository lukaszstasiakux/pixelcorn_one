<?php
  function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
  }
  add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

  function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
       )
     );
   }
   add_action( 'init', 'register_my_menus' );

if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 150, 150, true );
  add_image_size( 'cover-post-thumb', 910,9999 );
 }

//  add new sizes for photos

add_image_size( 'logo-size', 400, 100, true );

if(function_exists('register_sidebar'))
  register_sidebar(array(
   'before_widget' => '<div class="widget_content" id="%1$s">',
   'after_widget' => '</div>',
   'before_title' => '<div class="widget_title">',
   'after_title' => '</div>'));



function enqueue_media_uploader(){
	wp_enqueue_media();
	wp_enqueue_script('media-upload');
	wp_register_script('uploader-js', site_url().'/wp-content/themes/'.get_template().'/assets/scripts/media_uploader_widget.js', array('jquery'));
	wp_enqueue_script('uploader-js');
	wp_enqueue_style( 'widget-style', site_url().'/wp-content/themes/'.get_template().'/assets/style/media_uploader_widget.css' );
}
add_action("admin_enqueue_scripts", "enqueue_media_uploader");





class About_author extends WP_Widget {
  

	// Main constructor
	public function __construct() {
		parent::__construct(
      'about_author',
      __( 'About Author', 'text_domain' ),
      array(
        'customize_selective_refresh' => true,
      )
    );
    
	}


	public function form( $instance ) {	
	
	$defaults = array(
    'img' => '',
		'textarea'     => '',
		'facebook' => '',
		'instagram' => '',
		'Ppx' => '',
		'linkedin' => '',
		'behance' => '',
		'youtube' => '',


  );


	extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>
	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'img' ) ); ?>"><?php _e( 'Zdjęcie:', 'text_domain' ); ?></label>
				<div class="about_author-wrapper <?php if ( strlen($img) == 0 ) : ?> about_author-hide<?php endif; ?>">
					<div class="about_author-img">
						<img class="about_author-img_src " src="<?php echo esc_attr($img) ?>" alt="" />
					</div>
				</div>
			
			<input class="upload_image widefat <?php if ( strlen($img) == 0 ) : ?> about_author-hide<?php endif; ?>" type="text"  name="<?php echo esc_attr( $this->get_field_name( 'img' ) ); ?>"  value="<?php echo $instance['img']; ?>" />
			<div class="about_author-wrapper ">
				<input class="upload_image_button <?php if ( strlen($img) > 0 ) : ?> about_author-hide<?php endif; ?>" type="button" value="Upload Image"/>
				<div class="remove_image_button <?php if ( strlen($img) == 0 ) : ?> about_author-hide<?php endif; ?>"><?php _e( 'Usuń', 'text_domain' ); ?></div>
			</div>
			
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>"><?php _e( 'O mnie:', 'text_domain' ); ?></label>
			<textarea class="text_about widefat" id="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'textarea' ) ); ?>"><?php echo wp_kses_post( $textarea ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php _e( 'Facebook', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php _e( 'Instagram', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Ppx' ) ); ?>"><?php _e( '500px', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Ppx' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'Ppx' ) ); ?>" type="text" value="<?php echo esc_attr( $Ppx ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php _e( 'Linkedin', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php _e( 'Behance', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>" type="text" value="<?php echo esc_attr( $behance ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php _e( 'YouTube', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
		</p>
	<?php 
	}

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
    $instance['img']    = isset( $new_instance['img'] ) ? wp_strip_all_tags( $new_instance['img'] ) : '';
		$instance['textarea']     = isset( $new_instance['textarea'] ) ? wp_strip_all_tags( $new_instance['textarea'] ) : '';
		$instance['facebook']     = isset( $new_instance['facebook'] ) ? wp_strip_all_tags( $new_instance['facebook'] ) : '';
		$instance['instagram']     = isset( $new_instance['instagram'] ) ? wp_strip_all_tags( $new_instance['instagram'] ) : '';
		$instance['Ppx']     = isset( $new_instance['Ppx'] ) ? wp_strip_all_tags( $new_instance['Ppx'] ) : '';
		$instance['linkedin']     = isset( $new_instance['linkedin'] ) ? wp_strip_all_tags( $new_instance['linkedin'] ) : '';
		$instance['behance']     = isset( $new_instance['behance'] ) ? wp_strip_all_tags( $new_instance['behance'] ) : '';
		$instance['youtube']     = isset( $new_instance['youtube'] ) ? wp_strip_all_tags( $new_instance['youtube'] ) : '';
    return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {
		extract( $args );

	// Check the widget options
	$img    = isset( $instance['img'] ) ? apply_filters( 'widget_title', $instance['img'] ) : '';
	$text     = isset( $instance['textarea'] ) ? $instance['textarea'] : '';
	$facebook     = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
	$instagram     = isset( $instance['instagram'] ) ? $instance['instagram'] : '';
	$Ppx   = isset( $instance['Ppx'] ) ? $instance['Ppx'] : '';
	$linkedin     = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '';
	$behance     = isset( $instance['behance'] ) ? $instance['behance'] : '';
	$youtube    = isset( $instance['youtube'] ) ? $instance['youtube'] : '';
	

	// WordPress core before_widget hook (always include )
	echo $before_widget;

   // Display the widget
	 echo '<div class="widget__about_me--wrapper">

	 				<div class="widget__about_me--image-wrapper">
						<img class="widget__about_me--image" src='. $img .'>
					</div>
					<div class="widget__about_me--text-wrapper">
						<div class="widget__about_me--text">
						' . $text . '
						</div>
					
					<div class="widget__about_me--social-wrapper">';
			if ( $facebook ) {
				echo 	'<a href="' . $facebook . '" target="_blank" class="widget__about_me--social-link">
								<img class="widget__about_me--social-icon" src="'. site_url(). '/wp-content/themes/'.get_template().'/assets/icons/facebook.svg"/></a>';
			}
			if ( $linkedin ) {
				echo 	'<a href="' . $linkedin . '" target="_blank" class="widget__about_me--social-link">
								<img class="widget__about_me--social-icon" src="'. site_url(). '/wp-content/themes/'.get_template().'/assets/icons/linkedin.svg"/></a>';
			}
			if ( $instagram ) {
				echo 	'<a href="' . $instagram . '" target="_blank" class="widget__about_me--social-link">
								<img class="widget__about_me--social-icon" src="'. site_url(). '/wp-content/themes/'.get_template().'/assets/icons/instagram.svg"/></a>';
			}
			if ( $Ppx ) {
				echo 	'<a href="' . $Ppx . '" target="_blank" class="widget__about_me--social-link">
								<img class="widget__about_me--social-icon" src="'. site_url(). '/wp-content/themes/'.get_template().'/assets/icons/500px.svg"/></a>';
			}
			
			if ( $behance ) {
				echo 	'<a href="' . $facebook . '" target="_blank" class="widget__about_me--social-link">
								<img class="widget__about_me--social-icon" src="'. site_url(). '/wp-content/themes/'.get_template().'/assets/icons/behance.svg"/></a>';
			}
			if ( $youtube ) {
				echo 	'<a href="' . $youtube . '" target="_blank" class="widget__about_me--social-link">
								<img class="widget__about_me--social-icon" src="'. site_url(). '/wp-content/themes/'.get_template().'/assets/icons/youtube.svg"/></a>';
			}

		echo'			</div></div>
				</div>' ;
    
	echo $after_widget;

	}

}

// Register the widget
function register_about_author_widget() {
	register_widget( 'About_author' );
}

add_action( 'widgets_init', 'register_about_author_widget' );

?>

