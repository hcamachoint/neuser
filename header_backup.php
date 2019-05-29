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
        <div class="container d-flex flex-column flex-md-row justify-content-between">
          <a class="py-2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
          </a>
          <a class="py-2 d-none d-md-inline-block" href="#">Tour</a>
          <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
          <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
          <a class="py-2 d-none d-md-inline-block" href="#">Enterprise</a>
          <a class="py-2 d-none d-md-inline-block" href="#">Support</a>
          <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
          <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
        </div>
      </nav>
    </header>


    <header>
      <nav class="navbar navbar-dark bg-nav navbar-expand-md static-top">
        <div class="container-fluid" align="center">
           <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <?php
             wp_nav_menu([
               'menu'            => 'top',
               'theme_location'  => 'top',
               'container'       => 'div',
               'container_id'    => 'bs4navbar',
               'container_class' => 'collapse navbar-collapse navbar-right',
               'menu_id'         => false,
               'menu_class'      => 'navbar-nav ml-auto', //mr-auto to left
               'depth'           => 2,
               'fallback_cb'     => 'bs4navwalker::fallback',
               'walker'          => new bs4navwalker()
             ]);
           ?>
       </div>
     </nav>
    </header>
