<?php 

/**
 * profile_cct_research_shell function.
 * 
 * @access public
 * @param array $options (default: array())
 * @param mixed $data (default: null)
 * @return void
 */
function profile_cct_secondary_address_shell( $options = array(), $data = null ) {
	$type = 'secondary_address';

	Profile_CCT_Address::shell( $options, $data );
}

