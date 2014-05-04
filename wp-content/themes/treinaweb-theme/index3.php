<?php get_header(); // Inclui o header.php ?>

<?php get_sidebar(); // Inclui o sidebar.php ?>

<!-- Posts -->

<div class="span9">

    <?php if(have_posts()) : while(have_posts()) : the_post() ?>
    
    <!-- post -->

    <div class="row-fluid posts">

        <h2><a href="<?php the_permalink(); // Link do post ?>"><?php the_title(); // Título ?></a></h2>

        <p class="muted">
            <span>Publicado em</span>
            <a rel="bookmark" href="<?php the_permalink(); // Link do post ?>">
                <span><?php  echo get_the_date(); // Data do Post ?></span>
            </a>
        </p>

        <p><?php the_excerpt(); // Resumo do Post ?></p>

        <p class="muted">
            <span>Categoria</span>
            <?php the_category(', '); ?>
            |
            <a rel="category" href="<?php comments_link(); ?>">
                <?php comments_number('Sem comentários', '1 Comentário', '%s Comentários'); ?>
            </a>
        </p>

    </div>

    <!--/post -->    
    
    <?php endwhile;endif; ?>

</div><!--/span9-->

<?php get_footer(); // Inclui o footer.php ?>
