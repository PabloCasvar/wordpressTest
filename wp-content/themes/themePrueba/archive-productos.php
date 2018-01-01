<?php get_header();?>

<h1 onload='muestra_alerta();'>Este es el template para los productos !!!!</h1>

<!--p>list of categories: <?php //print_r(get_categories(array('order_by'=>'name')));?></p-->

<?php
//Loop test
if ( have_posts() ):
    while(have_posts()):
        the_post();
        $info_category = get_the_category();
        //$category_slug = $info_category=>slug;
?>

        <div class="<?= get_the_category()[0]->slug ?>">
            <?php the_title('<h2>', '</h2>');?>
            <p> Presentación: <?= ucfirst(get_field('presentacion_producto')); ?>   </p>
            <p> Precio: $ <?php the_field('precio_producto');?> M.N.    </p>
            <?php $url_imagen = get_field('imagen_producto'); ?>
            <img style="max-width:100px;" src="<?= $url_imagen?>" alt="Sin imagen"/>

            <p> Categoría: <?php the_category(); ?>                     </p>
            <p><?php print_r(get_the_category()[0]->slug);?></p>
            </div>
<?php
    endwhile;
endif;
?>

<?php get_footer();?>