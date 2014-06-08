<?php

namespace madewithlove;

/**
 * Filter class 
 *
 * @author Created by Andreas Creten (andreas@madewithlove.be) on 2008-08-19.
 * @package Validation
 * @copyright Copyright (c) 2008 madewithlove. All rights reserved
 */

class Filter {
	/**
 	* Allowed types in general, used to compose sets of allowed types with just a string
 	*
 	* @var array
 	*/
	static $filetypes = array(
		'images' => array(
			'jpg' => array('image/jpg', 'image/jpeg', 'image/pjpg'), 
			'gif' => 'image/gif',
			'png' => 'image/png'), 
		'pdf' => 'application/pdf'
	);

	/**
	 * All filter types for isPredefined Filter, to distinguish with regex ones, needed in some rare cases
	 *
	 * @var string
	 **/
	static $filter_types = array(
		'email', 
		'isemail', 
		'phone', 
		'telephone', 
		'isphone', 
		'ip', 
		'isip',
		'int', 
		'integer',
		'number', 
		'numeric', 
		'isnumeric', 
		'float', 
		'isfloat', 
		'string', 
		'isstring', 
		'url', 
		'isurl', 
		'country', 
		'iscountry', 
		'boolean', 
		'isboolean', 
		'nospaces'
	);
	
	public static function isValid($filter, $value) {
		$value = trim($value);

		switch(strtolower($filter)) {
			case 'email':
			case 'isemail':
				return self::isEmail($value);
			break;

			case 'phone':
			case 'telephone':
			case 'isphone':
				return self::isPhone($value);
			break;

			case 'ip':
			case 'isip':
				return self::isIp($value);
			break;

			case 'int':
			case 'integer';
			case 'number':
			case 'numeric':
			case 'isnumeric':
				return self::isNumeric($value);
			break;

			case 'float':
			case 'isfloat':
				return self::isFloat($value);
			break;

			case 'string':
			case 'isstring':
				return self::isString($value);
			break;

			case 'url':
			case 'isurl':
				return self::isURL($value);
			break;

			case 'country':
			case 'iscountry':
				return self::isCountry($value);
			break;

			case 'boolean':
			case 'isboolean':
				return self::isBoolean($value);
			break;

			case 'nospaces':
				return self::noSpaces($value);
			break;

			default:
				return self::checkRegEx($filter, $value);
		}
	} 

	/**
	 * Check if it is one of the predefined filters or a regex
	 *
	 * @return boolean
	 * @author Jonas Van Schoote
	 **/
	public function isPredefined($filter) {
		return in_array($filter, self::$filter_types);
	}
	
	/**
	* Checks the value for a valid e-mail address
	*
	* @return bool
	* @param string $value
	*/
	public static function isCountry($value) {
		// Include the countries class
		require_once('countries.php');

		return array_key_exists($value, Countries::$short);
	}

	/**
	* Checks the value for a valid e-mail address
	*
	* @return bool
	* @param string $value
	*/
	public static function isEmail($value) {
		$value = trim($value);
		$special_chars = '!#$%&\'\*\+\/\=\?\^_\`\{\|\}\.~-'; // All allowed chars: !#$%&'*+/=?^_`{|}~-  
		$regex = "/^([a-z0-9$special_chars]{1,63})+@([a-z0-9]+(\.)?([a-z0-9_-]+))+(\.[a-z]{2,7})+$/i";
		return preg_match($regex, $value);
	}

	/**
	* Checks the value for a proper ip address  (v4 or v6)
	*
	* @return bool
	* @param string $value
	*/
	public static function isIp($value) {
		return self::isIpV4($value) || self::isIpV6($value);
	}
	
	/**
	* Checks the value for a proper ip4 address
	*
	* @return bool
	* @param string $value
	*/
	public static function isIpV4($value) {
		return preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}.\d{1,3}:?\d*$/', $value);
	}

	/**
	* Checks the value for a proper ip6 address
	*
	* @return bool
	* @param string $value
	*/
	public static function isIpV6($value) {
		return preg_match('/^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/', $value);
	}
	
	/**
	* Alias for isDigital.
	*
	* @return bool
	* @param string $value
	*/
	public static function isNumeric($value) {
		return preg_match("/^[0-9]+$/", $value);
	}

	/**
	* check for float.
	*
	* @return bool
	* @param string $value
	*/
	public static function isFloat($value) {
		return preg_match("/^[0-9\.\,]+$/", $value);
	}

	/**
	* Variation on isNumeric, allows spaces, used for telephone numbers
	*
	* @return bool
	* @param string $value
	*/
	public static function isPhone($value) {
		return preg_match("/^(\+)?[0-9 ]{6,}$/", $value);
	}

	/**
	* Checks the value for a string without control characters (ASCII 0 - 31), spaces are allowed
	*
	* @return bool
	* @param string $value
	*/
	public static function isString($value) {
		// '/^[^\x01-\x08\x0B\x0E-\x1F]+$/''/^[^\x01-\x1F]+$/'
		return preg_match('/^[^\x01-\x08\x0B\x0E-\x1F]+$/', $value);
	}

	/**
	* Checks the value for a valid url
	*
	* @return bool
	* @param string $value
	*/
	public static function isURL($value) {
		$regexp = '/^((http|ftp|https):\/{2})?(([0-9a-zA-Z_-]+\.)+[a-zA-Z]+)((:[0-9]+)?)((\/([0-9a-zA-Z\#%@\.\/_-]+)?(\?[0-9a-zA-Z%\/&=_-]+)?)?)$/';
		return preg_match($regexp, $value);
	}

	/**
	* Checks the value for NOT having spaces
	* returns FALSE if there are spaces
	* returns TRUE if there aren't spaces
	* 
	* useful for usernames and other inputs that cannot contain spaces
	*
	* @return bool
	* @param string $value
	*/
	public static function noSpaces($value) {
		$res = strpos($value, ' ');
		return ($res === false);
	}

	/**
	 * checks if the given value is (bool), (int) 0, 1, (string) '0', '1',
	 * returns FALSE if not
	 * returns TRUE if value is one of those
	 *
	 * @return void
	 * @author Jonas Van Schoote
	 **/
	public static function isBoolean($var) {
		if(is_bool($var)){
			return true;
		}
		elseif(is_numeric($var) && ($var === 1 || $var === 0)){
			// it's 0 or 1, not 2, 3.1254654 ...
			return true; 
		}
		elseif(is_string($var)){
			$var = trim($var);
			switch($var) {
				case 'false':
				case 'true':
				case 'no':
				case 'yes':
				case 'off':
				case 'on':
				case '0':
				case '1':
					return true;
				break;
				default:
					return false;
				break;
			}
		}
		// anything else is not a boolean-like thing
		return false;
	}

	/**
	* Checks if the value's length is greater than or equal to a given minimum of characters
	*
	* @return bool
	* @param int $minimum
	* @param string $value
	*/
	public static function hasMinLength($minimum, $value){
		return (strlen($value) >= $minimum);
	}

	/**
	* Checks if the value's length is less than or equal to a given maximum of characters
	*
	* @return bool
	* @param int $maximum
	* @param string $value
	*/
	public static function hasMaxLength($maximum, $value){
		return (strlen($value) <= $maximum);
	}

	/**
	* Checks if the value's length is between a given minimum and maximum of characters
	*
	* @return bool
	* @param int $minimum
	* @param int $maximum
	* @param string $value
	*/
	public static function hasLengthBetween($minimum, $maximum, $value){
		return (self::hasMinLength($minimum, $value) && self::hasMaxLength($maximum, $value));
	}

	/**
	* Checks if the file's type is in the given filetypes array
	*
	* @return bool
	* @param mixed $filetypes array or string
	* @param string $value
	*/
	public static function hasFileType($filetype, $value) {
		return is_array($filetype) ? (in_array(mime_content_type($value), $filetype)) : (mime_content_type($value) == $filetype);
	}

	/**
	* Matches the value with the given regular expression
	*
	* @return bool
	* @param string $regex 
	* @param string $value
	*/
	public static function checkRegEx($regex, $value) {
		// This way a full regex can be sent too
		if(strpos($regex, '/') !== 0) {
			$regex = "/^$regex$/m";
		}
		
		return preg_match($regex, $value);
	}
}