<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
    <meta name="generator" content="WordPress <?php bloginfo( 'version' ); ?>" />
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">


    <link rel="alternate" type="application/rss+xml" title="RSS2.0" href="<?php bloginfo( 'rss2_url' ); ?>" />

    <?php wp_head(); ?>

    <!-- Estilos ->

    <link href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_url' ); ?>/style.css" rel="stylesheet">

    <!-- scripts ->

    <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.min.js"></script-->
  </head>


  <body>

    <!-- Container -->

    <div class="container">

      <!-- Barra de navegação -->


      <div class="navbar">
          <div class="navbar-inner">
            <div style="width: auto;" class="container">

              <!-- Opções de Menu -->

              <a href="<?php bloginfo('url'); ?>" class="brand">Blog TreinaWeb</a>
              <div class="nav-collapse">
                <ul class="nav">

                <li <?php if(is_home()): ?> class="active" <?php endif; ?>>
                  <a href="<?php bloginfo('url'); ?>" title="Home">Home</a>
                </li>
                
                <?php wp_list_pages('title_li='); ?>
                
              </ul>


                <!-- Formulário de pesquisa -->

                <form action="" class="navbar-search pull-left">
                  <input type="text" placeholder="Pesquisar" class="search-query span2">
                </form>

                <!-- Opções de menu -->

                <ul class="nav pull-right">
                  <li class="divider-vertical"></li>
                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Opções <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Ação 1</a></li>
                      <li><a href="#">Ação 2</a></li>
                      <li><a href="#">Ação 3</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Logout</a></li>
                    </ul>
                  </li>
                </ul>

              </div><!-- /.nav-collapse -->
            </div>
          </div><!-- /navbar-inner -->
        </div>

      <!-- Topo -->

      <div class="row-fluid">
          <div class="hero-unit">
            <h1>
              Nome do Blog
              <img style="float:right;" src="<?php bloginfo( 'template_directory' ); ?>/img/logo-treinaweb.png" alt="TreinaWeb Cursos" />
            </h1>
            <p>Boas vindas</p>
          </div>
      </div>

      <div class="row-fluid">