<?php
get_header();
?>

<?php
//Loop test
if ( have_posts() ):
    while(have_posts()):
        the_post();
        the_title('<h1>', '</h1>');
        the_content();
        the_category();
        the_time();

    endwhile;
endif;
?>

<?php
get_footer();
?>