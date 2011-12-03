<?php 

function profile_cct_department_field_shell( $action, $options ) {
	
	if( is_object($action) ):
		$post = $action;
		$action = "display";
		$data = $options['args']['data'];
		$options = $options['args']['options'];
	endif;
	
	$field = Profile_CCT::get_object(); // prints "Creating new instance."
	
	$default_options = array(
		'type' => 'department',
		'label'=>'department',
		'description'=>'',
		'multiple'=>true,
		'show_multiple'=>true
		);
	$options = (is_array($options) ? array_merge( $default_options, $options ): $default_options );
	
	
	
	$field->start_field($action,$options);
	if( $field->is_data_array( $data ) ):
		$count = 0;
		foreach($data as $item_data):
			profile_cct_department_field($item_data,$options,$count);
			$count++;
		endforeach;
		
	else:
		profile_cct_department_field($item_data,$options);
	endif;
	$field->end_field( $action, $options );
	
	
}
function profile_cct_department_field( $data, $options, $count = 0 ){
	
	extract( $options );
	$field = Profile_CCT::get_object();
	echo "<div data-count='".$count."'>";
	
	$field->input_field( array( 'field_type'=>$type, 'multiple'=>$multiple,'field_id'=>'department', 'label'=>'', 'size'=>35, 'value'=>$data['department'], 'type'=>'text','count'=>$count) );
	if($count)
	 			echo ' <a class="remove-fields button" href="#">Remove</a>';
	echo "</div>";
}




function profile_cct_department_display_shell(  $action, $options, $data=null ) {
	
	if( is_object($action) ):
		$post = $action;
		$action = "display";
		$data = $options['args']['data'];
		$options = $options['args']['options'];
	endif;
	
	$field = Profile_CCT::get_object(); // prints "Creating new instance."
	
	$default_options = array(
		'type' => 'department',
		'width' => 'full',
		'before'=>'',
		'after' =>'',
		'hide_label'=>true
		);
	$options = (is_array($options) ? array_merge( $default_options, $options ): $default_options );
	
	$field->start_field($action,$options);
	if( $field->is_data_array( $data ) ):
		
		foreach($data as $item_data):
			profile_cct_department_display($item_data,$options);
		endforeach;
		
	else:
		profile_cct_department_display($item_data,$options);
	endif;
	
	$field->end_field( $action, $options );
	
}
function profile_cct_department_display( $data, $options ){
	
	extract( $options );
	$show = (is_array($show) ? $show : array());
	$field = Profile_CCT::get_object();
	

	$field->display_text( array( 'field_type'=>$type, 'class'=>'department', 'type'=>'shell', 'tag'=>'div') );
	$field->display_text( array( 'field_type'=>$type, 'default_text'=>'Finance and Technology', 'value'=>$data['department'], 'type'=>'text') );
	$field->display_text( array( 'field_type'=>$type, 'type'=>'end_shell', 'tag'=>'div') );
	
}