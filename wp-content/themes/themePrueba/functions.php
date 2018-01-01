<?php 
function incluye_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'prueba-tema-handle', get_template_directory_uri().'/js/functions.js', array('jquery'), true);
}

function incluye_estilos(){
    wp_enqueue_style('prueba-estilos-principal', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'incluye_scripts');
add_action('wp_enqueue_scripts', 'incluye_estilos');

//Calls the function to create the meta boxes
add_action('add_meta_boxes', 'custom_meta_boxes');

//Creates one or more meta boxes to be displayed  on the post screen editor.
function custom_meta_boxes(){
    $screens = array('post', 'page');
    add_meta_box('custom_meta_id_1',        //Unique ID
                'My custom Meta Box',       //Title
                'custom_meta_boxes_render', //Callback function, Displays the meta box fields 
                $screens,                   //Screens where meta box is displayed
                'side',                     //Context, place where meta box is displayed
                'high',                     //Priority, place respect other metaboxes
                '');                        //Optional arguments to Callback
}

//Displays the post meta data fields
function custom_meta_boxes_render($post){
    
    //Function for security porpuses
    wp_nonce_field(basename(__FILE__), 'my_metabox_nonce');
    $val = get_post_meta($post->ID, 'custom_meta_val', true);
?>

    <label for="custom_meta_val">Type Something</label>
    <input type="text" name="custom_meta_val" value="<?php echo $val; ?>" />

    <label for="custom_meta_select"></label>
    <select name="custom_meta_select" id="">
        <option value="uno">Uno</option>
        <option value="dos">Dos</option>
    </select>

<?php

} //end function custom_meta_boxes_render

//Triggers the save custom post meta box
add_action('save_post', 'save_custom_post_meta_box', 10, 2);

//Saves the meta box info
function save_custom_post_meta_box($post_id, $post){
    //Verify the nonce before proceding
    if (!isset($_POST['my_metabox_nonce']) || !wp_verify_nonce($_POST['my_metabox_nonce'], basename(__FILE__)))
        return $post_id;
    
    //Get the post type object
    $post_type = get_post_type_object($post->post_type);

    //Check if the user has permission to edit the post
    if(!current_user_can($post_type->cap->edit_post, $post_id))
        return $post_id;

    //Get the meta key
    $meta_key = 'custom_meta_val';

    //Get the posted data ans sanitized it
    $new_meta_value = (isset($_POST[$meta_key]) ? sanitize_text_field($_POST[$meta_key]) : '');

    //Get the meta value of the custom field key
    $meta_value = get_post_meta($post_id, $meta_key, true);

    //If a new meta value was added and there was no previous value, add it.
    if($new_meta_value && ''== $meta_value)
        add_post_meta($post_id, $meta_key, $new_meta_value, true);
    
    //If the new meta value does not match the old value, update it. 
    elseif( $new_meta_value && $new_meta_value != $meta_value)
        update_post_meta($post_id, $meta_key, $new_meta_value);

    //If there is no new meta value but an old value exists, delete it.
    elseif('' == $new_meta_value && $meta_value)
        delete_post_meta($post_id, $meta_key, $meta_value);

}// end function

?>
