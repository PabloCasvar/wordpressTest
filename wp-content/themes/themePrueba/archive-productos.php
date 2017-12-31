<?php get_header();?>

<h1>Este es el template para los productos !!!!</h1>

<?php
//Loop test
if ( have_posts() ):
    while(have_posts()):
        the_post();
        the_title('<h1>', '</h1>');
?>
        <p> <?php ucfirst(the_field('presentacion_producto')); ?></p>
        <p> Precio: $ <?php the_field('precio_producto');?> M.N.</p>
        <?php $url_imagen = get_field('imagen_producto'); ?>
        <img style="max-width:100px;" src="<?= $url_imagen?>" alt="Sin imagen"/>
<?php
    endwhile;
endif;
?>

<?php get_footer();?>