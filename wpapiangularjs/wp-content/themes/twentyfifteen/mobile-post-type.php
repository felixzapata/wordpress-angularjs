<?php


add_filter( 'json_prepare_post', 'post_additions', 10, 3 );


function post_additions( $data, $post, $context ) {
    if( $post['post_type'] === 'movil' ){
        $data['mobile_meta'] = get_post_meta( $post['ID'] );
        // $data['_mobile_availability'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_availability'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_type'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_time'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_talk'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_ram'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_network'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_wifi'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_bluetooth'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_infrared'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_gps'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_os'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_ui'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_dimensions'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_weight'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_screen'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_screenr'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_touch'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_cpu'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_usb'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_audio'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_cpu'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_fm'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_accelerometer'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_primary'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_features'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_others'] = get_post_meta( $post['ID'], '_mobile_time', true );
        // $data['_mobile_internal'] = get_post_meta( $post['ID'], '_mobile_time', true );
    }
    return $data;
}

add_filter( 'query_vars', function( $vars ){
    $vars[] = 'post_parent';
    return $vars;
});


add_action( 'init', 'register_post_types_mobile' );

add_action( 'add_meta_boxes', 'post_options_mobile' );
add_action( 'save_post', 'post_options_savemobile' );


function register_post_types_mobile() {

	$labelsmobiles = array(
    'name' => _x('Móvil', 'post type general name'),
    'singular_name' => _x('móvil', 'post type singular name'),
    'add_new' => _x('Añadir un móvil', 'post type singular name'),
    'add_new_item' => __('Añadir un móvil'),
    'edit_item' => __('Editar móvil'),
    'new_item' => __('Nuevo móvil'),
    'all_items' => __('Todas los móviles'),
    'view_item' => __('Ver móvil'),
    'search_items' => __('Buscar móviles'),
    'not_found' =>  __('No se han encontrado móviles'),
    'not_found_in_trash' => __('No se han encontrado móviles en la papelera'), 
    'parent_item_colon' => '',
    'menu_name' => 'Móviles'

  );

  $argsmoviles = array(
    'labels' => $labelsmobiles,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes')
  ); 


  register_post_type('movil', $argsmoviles);

}


function post_options_mobile(){
	add_meta_box('post_meta_box_mobile', 'Availability and Networks', 'post_meta_box_mobile1', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile2', 'Battery', 'post_meta_box_mobile2', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile3', 'Storage and Memory', 'post_meta_box_mobile3', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile4', 'Connectivity', 'post_meta_box_mobile4', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile5', 'Android', 'post_meta_box_mobile5', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile6', 'Size and Weight', 'post_meta_box_mobile6', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile7', 'Display', 'post_meta_box_mobile7', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile8', 'Hardware', 'post_meta_box_mobile8', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile9', 'Camera', 'post_meta_box_mobile9', 'movil', 'normal', 'high');
	add_meta_box('post_meta_box_mobile10', 'Additional Features', 'post_meta_box_mobile10', 'movil', 'normal', 'high');
}

function post_meta_box_mobile1($post){

    $id = $post->ID;
    $availability = get_post_meta($id,"_mobile_availability",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="availability">Availability</label></th>
             <td><input type="text" id="availability" name="availability" value="<?php echo $availability; ?>" /></td>
            </tr>
    	</tbody> 
</table>

<?php
}


function post_meta_box_mobile2($post){

    $id = $post->ID;
    $type = get_post_meta($id,"_mobile_type",true); 
    $time = get_post_meta($id,"_mobile_time",true); 
    $talk = get_post_meta($id,"_mobile_talk",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="type">Type</label></th>
             <td><input type="text" id="type" name="type" value="<?php echo $type; ?>" /></td>
            </tr>
            <tr>
             <th><label for="time">Standby time (max)</label></th>
             <td><input type="text" id="time" name="time" value="<?php echo $time; ?>" /></td>
            </tr>
            <tr>
             <th><label for="talk">Talk time</label></th>
             <td><input type="text" id="talk" name="talk" value="<?php echo $talk; ?>" /></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile3($post){

    $id = $post->ID;
    $ram = get_post_meta($id,"_mobile_ram",true); 
    $internal = get_post_meta($id,"_mobile_internal",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="ram">RAM</label></th>
             <td><input type="text" id="ram" name="ram" value="<?php echo $ram; ?>" /></td>
            </tr>
            <tr>
             <th><label for="internal">Internal storage</label></th>
             <td><input type="text" id="internal" name="internal" value="<?php echo $internal; ?>" /></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile4($post){

    $id = $post->ID;
    $network = get_post_meta($id,"_mobile_network",true); 
    $wifi = get_post_meta($id,"_mobile_wifi",true); 
    $bluetooth = get_post_meta($id,"_mobile_bluetooth",true); 
    $infrared = get_post_meta($id,"_mobile_infrared",true); 
    $gps = get_post_meta($id,"_mobile_gps",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="network">Network Support</label></th>
             <td><input type="text" id="network" name="network" value="<?php echo $network; ?>" /></td>
            </tr>
            <tr>
             <th><label for="wifi">WIFI</label></th>
             <td><input type="text" id="wifi" name="wifi" value="<?php echo $wifi; ?>" /></td>
            </tr>
            <tr>
             <th><label for="bluetooth">Bluetooth</label></th>
             <td><input type="text" id="bluetooth" name="bluetooth" value="<?php echo $bluetooth; ?>" /></td>
            </tr>
            <tr>
             <th><label for="infrared">Infrared</label></th>
             <td><select id="infrared" name="infrared">
                <option <?php if( $infrared == 'si' ){ ?> selected="selected" <?php } ?> value="si">Sí</option>
                <option <?php if( $infrared == 'no' || $infrared == ''){ ?> selected="selected" <?php } ?> value="no">No</option>
            </select></td>
            </tr>
            <tr>
             <th><label for="gps">GPS</label></th>
             <td><select id="gps" name="gps">
                <option <?php if( $gps == 'si' ){ ?> selected="selected" <?php } ?> value="si">Sí</option>
                <option <?php if( $gps == 'no' || $gps == ''){ ?> selected="selected" <?php } ?> value="no">No</option>
            </select></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile5($post){

    $id = $post->ID;
    $os = get_post_meta($id,"_mobile_os",true); 
    $ui = get_post_meta($id,"_mobile_ui",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="os">OS Version</label></th>
             <td><input type="text" id="os" name="os" value="<?php echo $os; ?>" /></td>
            </tr>
            <tr>
             <th><label for="ui">UI</label></th>
             <td><input type="text" id="ui" name="ui" value="<?php echo $ui; ?>" /></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile6($post){

    $id = $post->ID;
    $dimensions = get_post_meta($id,"_mobile_dimensions",true); 
    $weight = get_post_meta($id,"_mobile_weight",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="dimensions">Dimensions</label></th>
             <td><input type="text" id="dimensions" name="dimensions" value="<?php echo $dimensions; ?>" /></td>
            </tr>
            <tr>
             <th><label for="weight">Weight</label></th>
             <td><input type="text" id="weight" name="weight" value="<?php echo $weight; ?>" /></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile7($post){

    $id = $post->ID;
    $screen = get_post_meta($id,"_mobile_screen",true); 
    $screenr = get_post_meta($id,"_mobile_screenr",true); 
    $touch = get_post_meta($id,"_mobile_touch",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="screen">Screen size</label></th>
             <td><input type="text" id="screen" name="screen" value="<?php echo $screen; ?>" /></td>
            </tr>
            <tr>
             <th><label for="screenr">Screen resolution</label></th>
             <td><input type="text" id="screenr" name="screenr" value="<?php echo $screenr; ?>" /></td>
            </tr>
            <tr>
             <th><label for="touch">Touch screen</label></th>
              <td><select id="touch" name="touch">
                <option <?php if( $touch == 'si' ){ ?> selected="selected" <?php } ?> value="si">Sí</option>
                <option <?php if( $touch == 'no' || $touch == ''){ ?> selected="selected" <?php } ?> value="no">No</option>
            </select></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile8($post){

    $id = $post->ID;
    $cpu = get_post_meta($id,"_mobile_cpu",true); 
    $usb = get_post_meta($id,"_mobile_usb",true); 
    $audio = get_post_meta($id,"_mobile_audio",true); 
    $fm = get_post_meta($id,"_mobile_fm",true); 
    $accelerometer = get_post_meta($id,"_mobile_accelerometer",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="cpu">CPU</label></th>
             <td><input type="text" id="cpu" name="cpu" value="<?php echo $cpu; ?>" /></td>
            </tr>
            <tr>
             <th><label for="usb">USB</label></th>
             <td><input type="text" id="usb" name="usb" value="<?php echo $usb; ?>" /></td>
            </tr>
            <tr>
             <th><label for="audio">Audio / headphone jack</label></th>
             <td><input type="text" id="audio" name="audio" value="<?php echo $audio; ?>" /></td>
            </tr>
            <tr>
             <th><label for="fm">FM Radio</label></th>
              <td><select id="fm" name="fm">
                <option <?php if( $fm == 'si' ){ ?> selected="selected" <?php } ?> value="si">Sí</option>
                <option <?php if( $fm == 'no' || $fm == ''){ ?> selected="selected" <?php } ?> value="no">No</option>
            </select></td>
            </tr>
            <tr>
             <th><label for="accelerometer">Accelerometer</label></th>
              <td><select id="accelerometer" name="accelerometer">
                <option <?php if( $accelerometer == 'si' ){ ?> selected="selected" <?php } ?> value="si">Sí</option>
                <option <?php if( $accelerometer == 'no' || $accelerometer == ''){ ?> selected="selected" <?php } ?> value="no">No</option>
            </select></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile9($post){

    $id = $post->ID;
    $primary = get_post_meta($id,"_mobile_primary",true); 
    $features = get_post_meta($id,"_mobile_features",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="primary">Primary</label></th>
             <td><input type="text" id="primary" name="primary" value="<?php echo $primary; ?>" /></td>
            </tr>
            <tr>
             <th><label for="features">Features</label></th>
             <td><input type="text" id="features" name="features" value="<?php echo $features; ?>" /></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_meta_box_mobile10($post){

    $id = $post->ID;
    $others = get_post_meta($id,"_mobile_others",true); 

?>
    <table class="form-table">
    	<tbody>
            <tr>
             <th><label for="others">Others features</label></th>
             <td><textarea id="others" name="others" rows="5" cols="50"><?php echo $others; ?></textarea></td>
            </tr>
    	</tbody> 
</table>

<?php
}

function post_options_savemobile($post_id){

    if(isset($_POST['availability'])){
        update_post_meta($post_id, '_mobile_availability', $_POST['availability']);
    }
    if(isset($_POST['type'])){
        update_post_meta($post_id, '_mobile_type', $_POST['type']);
    }
    if(isset($_POST['time'])){
        update_post_meta($post_id, '_mobile_time', $_POST['time']);
    }
    if(isset($_POST['talk'])){
        update_post_meta($post_id, '_mobile_talk', $_POST['talk']);
    }
    if(isset($_POST['ram'])){
        update_post_meta($post_id, '_mobile_ram', $_POST['ram']);
    }
    if(isset($_POST['internal'])){
        update_post_meta($post_id, '_mobile_internal', $_POST['internal']);
    }
    if(isset($_POST['network'])){
        update_post_meta($post_id, '_mobile_network', $_POST['network']);
    }
    if(isset($_POST['wifi'])){
        update_post_meta($post_id, '_mobile_wifi', $_POST['wifi']);
    }
    if(isset($_POST['bluetooth'])){
        update_post_meta($post_id, '_mobile_bluetooth', $_POST['bluetooth']);
    }
    if(isset($_POST['infrared'])){
        update_post_meta($post_id, '_mobile_infrared', $_POST['infrared']);
    }
    if(isset($_POST['gps'])){
        update_post_meta($post_id, '_mobile_gps', $_POST['gps']);
    }
    if(isset($_POST['os'])){
        update_post_meta($post_id, '_mobile_os', $_POST['os']);
    }
    if(isset($_POST['ui'])){
        update_post_meta($post_id, '_mobile_ui', $_POST['ui']);
    }
    if(isset($_POST['dimensions'])){
        update_post_meta($post_id, '_mobile_dimensions', $_POST['dimensions']);
    }
    if(isset($_POST['weight'])){
        update_post_meta($post_id, '_mobile_weight', $_POST['weight']);
    }
    if(isset($_POST['screen'])){
        update_post_meta($post_id, '_mobile_screen', $_POST['screen']);
    }
    if(isset($_POST['screenr'])){
        update_post_meta($post_id, '_mobile_screenr', $_POST['screenr']);
    }
    if(isset($_POST['touch'])){
        update_post_meta($post_id, '_mobile_touch', $_POST['touch']);
    }
    if(isset($_POST['cpu'])){
        update_post_meta($post_id, '_mobile_cpu', $_POST['cpu']);
    }
    if(isset($_POST['usb'])){
        update_post_meta($post_id, '_mobile_usb', $_POST['usb']);
    }
    if(isset($_POST['audio'])){
        update_post_meta($post_id, '_mobile_audio', $_POST['audio']);
    }
    if(isset($_POST['fm'])){
        update_post_meta($post_id, '_mobile_fm', $_POST['fm']);
    }
    if(isset($_POST['accelerometer'])){
        update_post_meta($post_id, '_mobile_accelerometer', $_POST['accelerometer']);
    }
    if(isset($_POST['primary'])){
        update_post_meta($post_id, '_mobile_primary', $_POST['primary']);
    }
    if(isset($_POST['features'])){
        update_post_meta($post_id, '_mobile_features', $_POST['features']);
    }
    if(isset($_POST['others'])){
        update_post_meta($post_id, '_mobile_others', $_POST['others']);
    }

}

?>
