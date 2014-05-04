<?php

    /*
    * Registrando os Scripts e Estilos
    */

    // Registrando os Scripts que serão usados pelo Blog

    wp_register_script( 'modernizr', get_bloginfo('template_url') . '/js/modernizr.js', array('jquery'));
    wp_register_script( 'bootstrap', get_bloginfo('template_url') . '/js/bootstrap.min.js');

    // Adicionando dinamicamente os scripts que serão usados no Blog

    function add_scripts(){
        if (is_admin()) // Adiciona apenas se estiver no Blog e não no Painel Administrativo
            return;
        wp_enqueue_script('modernizr');
        wp_enqueue_script('bootstrap');    
    }

    // Registrando os estilos que serão usados pelo Blog

    wp_register_style('bootstrap', get_bloginfo('template_url') . '/css/bootstrap.min.css');
    wp_register_style('style', get_bloginfo('template_url') . '/style.css');

    function add_estilos(){
        if (is_admin()) // Adiciona apenas se estiver no Blog e não no Painel Administrativo
            return;
        wp_enqueue_style('bootstrap');  
        wp_enqueue_style('style');      
    }

    // Adicionando as ações

    add_action('wp_print_scripts','add_scripts');
    add_action('wp_print_styles','add_estilos');

    /*  
     * Adicionando funcionalidades ao tema
     */

    add_theme_support( 'menus' );

    register_nav_menu( 'menu_principal', 'Menu Principal - Topo');

    //register_sidebar(array('name' => 'Widget Lateral'));

    register_sidebar(array(
      'name'            => 'Widget Lateral',
      'before_widget'    => '<div class="widget-lateral">',
      'after_widget'    => '</div>',
      'before_title'    => '<h2>',
      'after_title'    => '</h2>',
    ));

    /*  
     * Paginação
     */

    function pagination() {
      
      global $wp_query;
      
      $baseURL = get_bloginfo( 'url' ); // Url base do blog
      
      $page = ( !$wp_query->query_vars["paged"] ) ? 1 : $wp_query->query_vars["paged"]; // Página atual

      if ( $wp_query->found_posts > $wp_query->query_vars["posts_per_page"] ) {
        echo '<div class="pagination"><ul>';

        if ( $page > 1 ) {
          echo '<li><a href="'.$baseURL.'/page/'.($page-1).'">« Anterior</a></li>';
        }

        for ( $i=1; $i <= $wp_query->max_num_pages; $i++ ) {
          if ( $i == $page ) {
              echo '<li class="active"><a href="">'.$i.'</a></li>';
          } else {
              echo '<li><a href="'.$baseURL.'/page/'.$i.'">'.$i.'</a></li>';
          }
        }

        if ( $page < $wp_query->max_num_pages ) {
          echo '<li><a href="'.$baseURL.'/page/'.($page+1).'">Próxima »</a></li>';
        }

        echo '</ul></div>';
      }
      
    }

    add_theme_support( 'post-thumbnails' ); // Ativa o suporte de miniaturas
    set_post_thumbnail_size( 100, 100 ); // Define o tamanho da miniatura

?>
