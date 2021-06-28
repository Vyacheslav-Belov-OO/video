<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage HOTLOCK
 * @since HOTLOCK 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('hotlock_storage_get')) {
	function hotlock_storage_get($var_name, $default='') {
		global $HOTLOCK_STORAGE;
		return isset($HOTLOCK_STORAGE[$var_name]) ? $HOTLOCK_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('hotlock_storage_set')) {
	function hotlock_storage_set($var_name, $value) {
		global $HOTLOCK_STORAGE;
		$HOTLOCK_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('hotlock_storage_empty')) {
	function hotlock_storage_empty($var_name, $key='', $key2='') {
		global $HOTLOCK_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($HOTLOCK_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($HOTLOCK_STORAGE[$var_name][$key]);
		else
			return empty($HOTLOCK_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('hotlock_storage_isset')) {
	function hotlock_storage_isset($var_name, $key='', $key2='') {
		global $HOTLOCK_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($HOTLOCK_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($HOTLOCK_STORAGE[$var_name][$key]);
		else
			return isset($HOTLOCK_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('hotlock_storage_inc')) {
	function hotlock_storage_inc($var_name, $value=1) {
		global $HOTLOCK_STORAGE;
		if (empty($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = 0;
		$HOTLOCK_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('hotlock_storage_concat')) {
	function hotlock_storage_concat($var_name, $value) {
		global $HOTLOCK_STORAGE;
		if (empty($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = '';
		$HOTLOCK_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('hotlock_storage_get_array')) {
	function hotlock_storage_get_array($var_name, $key, $key2='', $default='') {
		global $HOTLOCK_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($HOTLOCK_STORAGE[$var_name][$key]) ? $HOTLOCK_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($HOTLOCK_STORAGE[$var_name][$key][$key2]) ? $HOTLOCK_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('hotlock_storage_set_array')) {
	function hotlock_storage_set_array($var_name, $key, $value) {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if ($key==='')
			$HOTLOCK_STORAGE[$var_name][] = $value;
		else
			$HOTLOCK_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('hotlock_storage_set_array2')) {
	function hotlock_storage_set_array2($var_name, $key, $key2, $value) {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if (!isset($HOTLOCK_STORAGE[$var_name][$key])) $HOTLOCK_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$HOTLOCK_STORAGE[$var_name][$key][] = $value;
		else
			$HOTLOCK_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('hotlock_storage_merge_array')) {
	function hotlock_storage_merge_array($var_name, $key, $value) {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if ($key==='')
			$HOTLOCK_STORAGE[$var_name] = array_merge($HOTLOCK_STORAGE[$var_name], $value);
		else
			$HOTLOCK_STORAGE[$var_name][$key] = array_merge($HOTLOCK_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('hotlock_storage_set_array_after')) {
	function hotlock_storage_set_array_after($var_name, $after, $key, $value='') {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if (is_array($key))
			hotlock_array_insert_after($HOTLOCK_STORAGE[$var_name], $after, $key);
		else
			hotlock_array_insert_after($HOTLOCK_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('hotlock_storage_set_array_before')) {
	function hotlock_storage_set_array_before($var_name, $before, $key, $value='') {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if (is_array($key))
			hotlock_array_insert_before($HOTLOCK_STORAGE[$var_name], $before, $key);
		else
			hotlock_array_insert_before($HOTLOCK_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('hotlock_storage_push_array')) {
	function hotlock_storage_push_array($var_name, $key, $value) {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($HOTLOCK_STORAGE[$var_name], $value);
		else {
			if (!isset($HOTLOCK_STORAGE[$var_name][$key])) $HOTLOCK_STORAGE[$var_name][$key] = array();
			array_push($HOTLOCK_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('hotlock_storage_pop_array')) {
	function hotlock_storage_pop_array($var_name, $key='', $defa='') {
		global $HOTLOCK_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($HOTLOCK_STORAGE[$var_name]) && is_array($HOTLOCK_STORAGE[$var_name]) && count($HOTLOCK_STORAGE[$var_name]) > 0) 
				$rez = array_pop($HOTLOCK_STORAGE[$var_name]);
		} else {
			if (isset($HOTLOCK_STORAGE[$var_name][$key]) && is_array($HOTLOCK_STORAGE[$var_name][$key]) && count($HOTLOCK_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($HOTLOCK_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('hotlock_storage_inc_array')) {
	function hotlock_storage_inc_array($var_name, $key, $value=1) {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if (empty($HOTLOCK_STORAGE[$var_name][$key])) $HOTLOCK_STORAGE[$var_name][$key] = 0;
		$HOTLOCK_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('hotlock_storage_concat_array')) {
	function hotlock_storage_concat_array($var_name, $key, $value) {
		global $HOTLOCK_STORAGE;
		if (!isset($HOTLOCK_STORAGE[$var_name])) $HOTLOCK_STORAGE[$var_name] = array();
		if (empty($HOTLOCK_STORAGE[$var_name][$key])) $HOTLOCK_STORAGE[$var_name][$key] = '';
		$HOTLOCK_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('hotlock_storage_call_obj_method')) {
	function hotlock_storage_call_obj_method($var_name, $method, $param=null) {
		global $HOTLOCK_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($HOTLOCK_STORAGE[$var_name]) ? $HOTLOCK_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($HOTLOCK_STORAGE[$var_name]) ? $HOTLOCK_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('hotlock_storage_get_obj_property')) {
	function hotlock_storage_get_obj_property($var_name, $prop, $default='') {
		global $HOTLOCK_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($HOTLOCK_STORAGE[$var_name]->$prop) ? $HOTLOCK_STORAGE[$var_name]->$prop : $default;
	}
}
?>