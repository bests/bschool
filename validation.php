<?php

namespace madewithlove;

// Include required files
require_once('essentials.php');
require_once('filter.php');

/**
 * Validation class 
 *
 * @author Created by Jonas Van Schoote (jonas@madewithlove.be) on 2009-01-13.
 * @package Validation
 * @copyright Copyright (c) 2009 madewithlove. All rights reserved
 */

class Validation {

	/**
	 * To keep track of the validation_defintion easier
	 *
	 * @var array
	 **/
	static $validation_definition = array();

	/**
	 * Main validation function
	 * 
	 * @example
	 * array(
	 * 		'field_in_post' => array(
	 * 			'required' => array(true, 'Error message if not provided.'),
	 * 			'filter' => array(
	 * 				'country' => 'Error if not met',
	 * 				'regex' => 'Error if not met',
	 * 				...
	 * 			),
	 * 			'match' => array(
	 * 				'other_field_in_post' => 'Error if values do not match'
	 * 			),
	 * 			'group' => array(
	 * 				'other_field_in_post' => 'Error if the value of "other_field_in_post" is empty and this one is not'
	 * 			),
	 * 			'list' => true|false, // Whether the value should be checked as a list of values and not a single entry
	 * 			'groupwithvalue' => array(
	 *				'other_field_in_post' => array(
	 *					'value' => 'value for other_field_in_post that makes field_in_post required', 
	 *					'error' => 'error message shown if field_in_post is empty, but other_field_in_post has value'
	 *				)
	 *			)
	 * 		),
	 * 		...
	 * )
	 *
	 * @param string $objects Defines the validation, stored in self::$validation_definition
	 * @param string $post Items to validate
	 * @param string $options Extra, none for now
	 * @return array An array containing the errors
	 * @author Jonas Van Schoote <jonas@madewithlove.be>
	 */
	public static function go($objects, $post = null, $options = array()) {
		// Store options locally
		self::$validation_definition = $objects;

		// Standardize the input
		$options = standardize_input($options, array(
			'test' => false
		));

		// Fallback to te $_POST array when the post attribute is empty
		if($post == null) {
			$post = $_POST;
		}

		// Start with an empty array of errors
		$errors = array();

		foreach(self::$validation_definition as $key => $object) {
			$object = standardize_input($object, array(
				'required' => array(false), 
				'filter' => false,
				'list' => false,
				'match' => false,
				'group' => false,
				'groupwithvalue' => false
			));

			// This allows to return false for everything, useful to test error display
			if($options['test']) {
				if(!empty($object['filter'])) {
					// Just show the first filter error
					foreach($object['filter'] as $filter => $errorm) {
						$errors[$key] = $errorm;
						continue 2;
					}
				}
				else {
					throw new \Exception(sprintf(__('If you want to test the error displaying, please do provide an error message in the "filter" key for %s.'), $key), 1);
				}
			}

			// Check if it is a single item or a list (of users for instance)
			if($object['list'] && $object['list'][0]) {
				// Check if it is in the post
				$listing = self::get_value($key, $post);
				if(empty($listing)) {
					// Check required
					if($object['required'][0]) {
						// Put the error message, do not overwrite any older message
						if(empty($errors[$key])) {
							if(!isset($object['required'][1])) {
								throw new \Exception(sprintf(__('Please add an error message to the validation array for %s in the definition of "required".'), $key));
							}
							$errors[$key] = $object['required'][1];
						}
						// Nothing else needs checking, so don't bother, go to next object
						continue;
					}
				}
				else {
					if(is_array($listing)) {
						foreach($listing as $index => $value) {
							$item_errors = self::validate_item($index, $listing, $object);
							if(!empty($item_errors)) {
								$total_errorm = '';
								foreach($item_errors as $error_key => $errorm) {
									$total_errorm .= $errorm.' ';
								}
								$errors[$key] = $total_errorm;
								return $errors;
							}
						}
					}
					else {
						if(!isset($object['list'][1])) {
							throw new \Exception(sprintf(__('Please add an error message to the validation array for %s in the definition of "list".'), $key));
						}
						$errors[$key] = $object['list'][1];
					}
				}

			}
			else {
				$item_errors = self::validate_item($key, $post, $object);
				if(!empty($item_errors)) {
					$errors = array_merge($errors, $item_errors);
				}
			}
		}

		return $errors;
	}

	private function validate_item($key, $post, $object) {
		$errors = array();
		$value = self::get_value($key, $post);

		if($object['required'][0]) {
			// The value, as determined by self::get_value() can only be checked for empty if it's not a number, 
			//  because else the value 0 could not be passed
			if(!array_key_exists($key, $post) || (!is_numeric($value) && empty($value))) {
				// Put the error message, do not overwrite any older message
				if(empty($errors[$key])) {
					if(!isset($object['required'][1])) {
						throw new \Exception(sprintf(__('Please add an error message to the validation array for %s in the definition of "required".'), $key));
					}
					$errors[$key] = $object['required'][1];
				}
				// Nothing else needs checking, so don't bother, go to next object
				return $errors;
			}
		}

		// Filter if there is a value
		if(!empty($value)) {
			if(!empty($object['filter'])) { 
				foreach($object['filter'] as $filter => $errorm) {
					// Fixes an issue where an id listing check returns false positives
					// ex.: 100|22|25 matches 10002 with 100, not anymore now.
					if(!Filter::isPredefined($filter)) {
						// If it is a '|' split string, it needs to match strictly so add some stuff
						// It's still a bit vague, improve later on...
						// Improved slightly.
						if(strpos($filter, '|') !== false && strpos($filter, '[') === false && strpos($filter, '(?:') !== 0) {
							$filter = '(?:'.$filter.')';
						}
						if(!Filter::isValid($filter, $value)) {
							$errors[$key] = $errorm;
							return $errors;
						}
					}
				}
			}
			elseif(!empty($object['groupwithvalue'])) {
				// Config:
				/*
				$validation = array(
					'field A' => array(
						'groupwithvalue' => array(
							'field B' => array(
								'value' => 'value for field B that makes this field A required', 
								'error' => 'error message shown if A is empty, but B has value'
							)
						)
					)
				);
				*/
				// The value is empty, see if this is allowed
				// This value is only allowed to be empty when $name != $config['value'];
				foreach($object['groupwithvalue'] as $name => $config) {
					// The value that triggers the empty-check
					$required_value = $config['value'];
					$other_value = self::get_value($name, $post);

					if($other_value == $required_value) {
						// The value is empty, but shouldn't, set error
						$errors[$key] = $config['error'];
					}
				}
			}
		}

		return $errors;
	}

	/**
	 * Checks several things: 
	 * first gets the post value, regardless if it's empty or not
	 * then checks if an object w/ this key exists in objects
	 * if so, 
	 *
	 * @param string $key The key in the post we're looking at
	 * @param array $post The post value in which the value exists
	 * @return mixed
	 * @author Jonas Van Schoote <jonas@madewithlove.be>
	 **/
	private static function get_value($key, $post) {
		// Init
		$value = null;

		// Check if the value exists in the post
		if(array_key_exists($key, $post)) {
			$value = $post[$key];
		}

		// Check if the value is empty
		$evalue = (!is_numeric($value) && empty($value));

		// If there is more info about it
		if(array_key_exists($key, self::$validation_definition)) {
			// There is more info, is a empty value defined?
			if(isset(self::$validation_definition[$key]['empty']) && is_array(self::$validation_definition[$key]['empty']) && !$evalue) {
				// It is, check if actual value, which is certainly not empty, is in there
				if(in_array($value, self::$validation_definition[$key]['empty'])) {
					 // It is the "empty" value, return null
					 $evalue = true;
				 }
			}
		}

		// If it is the empty value, return null, else the value
		return ($evalue) ? null : $value;
	}
}