<?php get_header(); // Inclui o header.php ?>

<?php get_sidebar(); // Inclui o sidebar.php ?>

<!-- Posts -->

<div class="span9">

    <?php if(have_posts()) : while(have_posts()) : the_post() ?>
    
    <!-- Breadcrumb para voltar para a home do blog -->

    <ul class="breadcrumb">
        <li><a href="<?php bloginfo('url'); // URL do Blog ?>">Home</a> <span class="divider">/</span></li>
        <li class="active"><?php the_title(); // Título ?></li>
    </ul>
    
    <!-- post -->

    <div class="row-fluid posts">

        <h2><a href="<?php the_permalink(); // Link do post ?>"><?php the_title(); // Título ?></a></h2>

        <p><?php the_content(); // Conteúdo da página ?></p>

    </div>

    <!--/post -->    
    
    <?php endwhile;endif; ?>

</div><!--/span9-->

<?php get_footer(); // Inclui o footer.php ?>
