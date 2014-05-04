<?php get_header(); // Inclui o header.php ?>

<?php get_sidebar(); // Inclui o sidebar.php ?>

<!-- Post -->

<div class="span9">

    <?php if(have_posts()) : while(have_posts()) : the_post() ?>
    
    <!-- post -->

    <div class="row-fluid posts">

        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <small>Em <?php  echo get_the_date(); // Data do Post ?>
            
        <p><?php the_content(); // Conteúdo do Post ?></p>

    </div>

    <!--/post -->    
    
    <?php endwhile; endif; ?>
    
    <div class="comentarios">
        <?php comments_template(); ?>
    </div>    

</div><!--/span9-->

<?php get_footer(); // Inclui o footer.php ?>
