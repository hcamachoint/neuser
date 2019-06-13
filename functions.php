<?php
require_once('bs4navwalker.php');

register_nav_menu('top', 'Top menu');

if ( function_exists('register_sidebar') ) //Widget Footer Widgets Center
        register_sidebar(array(
            'name' => 'Footer Widgets Center',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));


//add_action( 'init', 'register_my_menus' );	//Registra el menu del navbar (wp_bootstrap_navwalker.php)
add_filter( 'show_admin_bar', '__return_false' ); //Oculta la barra del administrador
add_theme_support( 'custom-header' );		//Permite editar el header
remove_filter ('the_content',  'wpautop');	//Remueve el filtro de los <p></p> automaticos
remove_filter ('comment_text', 'wpautop');	//Remueve el filtro de los <p></p> automaticos

function wpbootstrap_scripts()
{
	wp_enqueue_style('bs_css', get_template_directory_uri(). '/css/bootstrap.min.css');
  wp_enqueue_style('sf_css', get_template_directory_uri(). '/css/sticky-footer-navbar.css');

	wp_enqueue_script( 'wpbootstrap-script', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'wpbootstrap-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true);
  wp_enqueue_script( 'wpbootstrap-fontawesome', get_template_directory_uri() . '/js/fontawesome-all.js', array(), '1.0.0', true);
	wp_enqueue_script('wpbootstrap-parallax',  get_template_directory_uri() . '/js/parallax.min.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts' );

// Customize Appearance Options
function customizable_colors( $wp_customize ) {

  $wp_customize->add_section('lwp_standard_colors', array(
		'title' => __('Tema Colores', 'LearningWordPress'),
		'priority' => 30,
	));

	$wp_customize->add_setting('bg-nav', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

  $wp_customize->add_setting('bg-nav-a', array(
		'default' => '#999',
		'transport' => 'refresh',
	));

  $wp_customize->add_setting('bg-nav-ah', array(
		'default' => '#000',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('bg-footer', array(
		'default' => '#d8d8d8',
		'transport' => 'refresh',
	));

  $wp_customize->add_setting('bg-fa', array(
		'default' => '#cbc5c1',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_nav_color_control', array(
		'label' => __('Navbar Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-nav',
	) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_tab_color_control', array(
		'label' => __('Navbar Tab Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-nav-a',
	) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_tabhover_color_control', array(
		'label' => __('Navbar Tab Hover Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-nav-ah',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_footer_color_control', array(
		'label' => __('Footer Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-footer',
	) ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_bgfa_color_control', array(
		'label' => __('Font Awesome Stack background Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'bg-fa',
	) ) );

  //BLOQUE DE TEXTOS
  $wp_customize->add_panel( 'text_blocks', array(
      'priority'=>500,
      'theme_supports'=>'',
      'title'=> __( 'Tema Textos', 'LearningWordPress' ),
      'description'=> __( 'Set editable text for certain content.', 'LearningWordPress' ),
    )
  );

  $wp_customize->add_section( 'custom_header_text' , array(
      'title'=> __('Change Header Text','LearningWordPress'),
      'panel'=>'text_blocks',
      'priority'=>10
     )
  );

  $wp_customize->add_setting( 'header_text_block', array(
      'default'=> __( '', 'LearningWordPress' ),
    )
  );

  $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      'custom_header_text',
      array(
      'label'=> __( 'Header Text', 'LearningWordPress' ),
      'section'=>'custom_header_text',
      'settings'=>'header_text_block',
      'type'=>'text'
      )
    )
  );

}

add_action('customize_register', 'customizable_colors');

// Output Customize CSS
function learningWordPress_customize_css() { ?>

	<style type="text/css">

		.site-header {
			background: <?php echo get_theme_mod('bg-nav'); ?>!important;
      -webkit-backdrop-filter: saturate(180%) blur(20px);
      backdrop-filter: saturate(180%) blur(20px);
      margin-bottom: 10px!important;
      -webkit-box-shadow: 0 8px 6px -6px #999;
      -moz-box-shadow: 0 8px 6px -6px #999;
      box-shadow: 0 8px 6px -6px #999;
		}



    .site-header a {
      color: <?php echo get_theme_mod('bg-nav-a'); ?>;
      transition: ease-in-out color .15s;
    }
    .site-header a:hover {
      color: <?php echo get_theme_mod('bg-nav-ah'); ?>;
      text-decoration: none;
    }

    .bg-footer {
			background: <?php echo get_theme_mod('bg-footer'); ?>!important;
      height: auto!important;
		}

    .fa-stack{
      color: <?php echo get_theme_mod('bg-fa'); ?>!important;
    }

    /*
     * Custom translucent site header
     */



    .overflow-hidden { overflow: hidden; }

    .parallax-container {
      height: 500px;
      width: 100%;
    }
	</style>

<?php }

add_action('wp_head', 'learningWordPress_customize_css');

?>
