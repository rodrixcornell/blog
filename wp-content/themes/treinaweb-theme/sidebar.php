<!-- sidebar -->

<div class="span3">
    <div class="well sidebar-nav">

    <ul class="nav nav-list">

        <!-- Posts Recentes -->
        
        <li class="nav-header">Posts recentes</li>
        <?php 
            // Executando uma Query para trazer um conteúdo específico
        
            $args = array(
                    'posts_per_page' => 4//,
                    //'category_name' => 'Assuntos Gerais'
            );
            
            $postsRecentes = new WP_Query($args);

            // Executando uma Query para trazer um conteúdo específico

            //$postsRecentes = new WP_Query( 'posts_per_page=4&category_name=Assuntos Gerais' );
        ?>

        
        <?php if($postsRecentes->have_posts()) : while($postsRecentes->have_posts()) : $postsRecentes->the_post() ?>
        
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        
        <?php endwhile;else: ?>
            
            <h3>Não tem posts</h3>
            
        <?php endif; ?>
        <!-- Arquivos -->
        
        <li class="nav-header">Arquivos</li>
        <?php wp_get_archives(array('type' => 'monthly','format' => 'html')); ?>
        
        <!-- Categorias -->        

        <li class="nav-header">Categorias</li>
        <?php wp_list_categories('title_li=&number=8'); // Lista as categorias ?>

    </ul>
    </div><!--/.well -->
</div><!--/span-->

<!--/sidebar -->
