<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head();?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <nav class="site-header sticky-top py-1">
        <div class="container-fluid d-flex flex-column flex-md-row justify-content-between">
          <div class="col-md-4 d-none d-md-block">
            <div style="margin-top:80px">
              <a href="https://www.facebook.com/mmconstructionllc1/" target="_blank"><span class="fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse" style="color: #000"></i>
              </span></a>
              <a href="https://www.instagram.com/mmconstructionllc/" target="_blank"><span class="fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-instagram fa-stack-1x fa-inverse" style="color: #000"></i>
              </span></a>
            </div>

          </div>
          <div class="col-md-4" align="center" style="margin-top:20px">
            <h2 style="color:#fff"><img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" height="160px"/></h2>
          </div>
          <div class="col-md-4 d-none d-md-block" style="margin-top:80px;" align="right" >
            <a href="tel:(786)3606481" style="color:#2E64FE"><p>Call Today For </br><small>Free stimated</small></br>(786)360-6481</p></a>
            <?php if( get_theme_mod( 'header_text_block') != "" ): ?>
            <p class="footer-text">
                <?php echo get_theme_mod( 'header_text_block'); ?>
            </p>
            <?php endif; ?>
          </div>
        </div>
        <div class="container d-flex flex-column flex-md-row justify-content-between" align="center" style="margin-top:-20px">
          <?php
            wp_nav_menu([
              'menu'            => 'top',
              'theme_location'  => 'top',
              'container_id'    => 'bs4navbar',
              'container_class' => 'navbar-collapse',
              'menu_id'         => false,
              'container'       => false,
              'items_wrap'      => '%3$s',
              'depth'           => 0,
              'fallback_cb'     => 'bs4navwalker::fallback',
              'walker'          => new bs4navwalker()
            ]);
          ?>
        </div>
        <div class="d-block d-sm-none" align="center">
          <a href="tel:(786)3606481" style="color:#2E64FE"><p>Call Today For </br><small>Free stimated</small></br>(786)360-6481</p></a>
        </div>
      </nav>
    </header>
