<?php get_header();?>

<h1>Este es el template para los productos !!!!</h1>

<!--p>list of categories: <?php //print_r(get_categories(array('order_by'=>'name')));?></p-->
<div class="form-filter">
    <label for="select_category">Filtar por categoría:</label>
    <select name="select_category" id="select_category">
        <option value="todos">Todos</option>
        <?php foreach(get_categories() as $category_obj){ ?>
            <option value="<?= $category_obj->slug ?>">
                <?php if($category_obj->slug != 'uncategorized')
                    echo $category_obj->name;
                else echo 'Sin categoría';   
                ?>
            </option>
        <?php } //foreach; ?>
    </select>
</div>

<?php
//Loop test
if ( have_posts() ):
    while(have_posts()):
        the_post();
?>
        <div class="container-producto <?= get_the_category()[0]->slug ?>">
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