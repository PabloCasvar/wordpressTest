( function( $ ) {
    $(document).ready(function(){
        //alert('Hola');

        $('#select_category').change(function(){
            product_category = $(this).val();
            if(product_category != 'todos'){
                $('div.container-producto').hide(0);
                $('div.container-producto.'+product_category).show(500);
            } else {
                $('div.container-producto').show(400);
            }
        });

    });

})( jQuery );

function muestra_alerta(){
    //alert('Esta es una alerta de javascript');
}
