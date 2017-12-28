<?php 

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
    $new_meta_value = (isset($_POST[$meta_key]) ? sanitize_html_class($_POST[$meta_key]) : '');

    //Get the meta value of the custom field key
    $meta_value = get_post_meta($post_id, $meta_key, true);


}// end function

?>
