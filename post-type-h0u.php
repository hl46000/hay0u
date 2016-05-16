<?php   

$new_meta_boxes_h0u =
array(
    "fmimg" => array(
    	"name" => "fmimg",
    	"std" => "",
    	"title" => "Cover Image Address:"
    ),
    "app" => array(
    	"name" => "app",
    	"std" => "Fill APP_ID，More than one ID separated by commas",
    	"title" => "Display APP:"
    )
);

function new_meta_boxes_h0u() {
    global $post, $new_meta_boxes_h0u;

    foreach($new_meta_boxes_h0u as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];

        echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

        
        echo'<h4>'.$meta_box['title'].'</h4>';

        
        echo '<textarea cols="60" rows="1" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />'; 
    }
}

function create_meta_box_h0u() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes_h0u', 'Parameter settings', 'new_meta_boxes_h0u', 'h0u', 'normal', 'high' );
    }
}

function save_postdata_h0u( $post_id ) {
    global $post, $new_meta_boxes_h0u;

    foreach($new_meta_boxes_h0u as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        } 
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }

        $data = $_POST[$meta_box['name'].'_value'];

        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
            update_post_meta($post_id, $meta_box['name'].'_value', $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    }
}

add_action('admin_menu', 'create_meta_box_h0u');
add_action('save_post', 'save_postdata_h0u');
 
add_action('init', 'my_custom_init_h0u');   
function my_custom_init_h0u()    
{   
  $labels = array(   
    'name' => 'Special App',   
    'singular_name' => 'Special App',   
    'add_new' => 'Add to',   
    'add_new_item' => 'New',   
    'edit_item' => 'Edit',   
    'new_item' => 'new_item',   
    'view_item' => 'View',   
    'search_items' => 'Search for',   
    'not_found' =>  'No content',   
    'not_found_in_trash' => 'Nothing in Recycle Bin',    
    'parent_item_colon' => '',   
    'menu_name' => 'Special App'   
  
  );   
  $args = array(   
    'labels' => $labels,   
    'public' => true,   
    'publicly_queryable' => true,   
    'exclude_from_search' => true,
    'show_ui' => true,    
    'show_in_menu' => true,    
    'query_var' => true,   
    'rewrite' => true,   
    'capability_type' => 'post',   
    'has_archive' => true,    
    'hierarchical' => false,   
    'menu_position' => null,  
    'supports' => array('title','editor','author','custom-fields','excerpt','comments','thumbnail')   
  );    
  register_post_type('h0u',$args);   
}

 
add_filter('manage_h0u_posts_columns', 'add_new_posts_columns_h0u');   
function add_new_posts_columns_h0u($h0u_columns) {   
       
    $new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['title'] = _x( 'Title', 'column name' );
    $new_columns['date'] = _x('Date', 'column name');   
    return $new_columns;   
}   
add_action('manage_h0u_posts_custom_column', 'manage_h0u_columns', 10, 2);   
    
function manage_h0u_columns($column_name, $id) {   
    global $wpdb;   
    switch ($column_name) {   
    case 'cat':   
        $terms = get_terms('h0uc');
        foreach ($terms as $term) {
        echo $term->name; 
        }  
        break;   
    default:   
        break; 
    }   
}

?>