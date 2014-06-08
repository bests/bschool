<?php

namespace madewithlove;

if(!function_exists('standardize_input')) {
	/**
	 * compares the input with the default values, if a key from the default values does not exist in the input, it adds it with the value as set in the defaults
	 *
	 * @param array $input
	 * @param array $default
	 * @param array|boolean $allow_empty Wether items can be empty($item) === true, can be set for all items as a boolean or for each item individually to false (items not set will use default (true))
	 * @return array the input after it's checked
	 * @author Jonas Van Schoote
	 **/
	function standardize_input($input, $default, $allow_empty = true) {
		if(!is_array($input)) {
			$input = array();
		}
	
		foreach($default as $d_key => $d_value) {
			if(!array_key_exists($d_key, $input)) {
				$input[$d_key] = $d_value;
			}
			elseif(empty($input[$d_key])) {
				if(is_array($allow_empty)) {
					if(isset($allow_empty[$d_key]) && !$allow_empty[$d_key] && empty($input[$d_key])) {
						$input[$d_key] = $d_value;
					}
				}
				elseif(!$allow_empty) {
					$input[$d_key] = $d_value;
				}
			}
		}
	
		// Sort the options by key (usefull to compare things – added to make sure cache keys always have the same structure)
		ksort($input);
	
		return $input;
	}
}