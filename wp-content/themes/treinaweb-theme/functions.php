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

?>
