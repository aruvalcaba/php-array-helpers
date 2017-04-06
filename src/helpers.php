<?php

namespace BlackLabel;

use RuntimeException;

if( ! function_exists('array_pull') )
{
    /**
     * Return key => value array and remove keys from original array.
     * @param array $array Original array
     * @param array $keys Array of keys to pull from original array.
     * @return array Array of key => value pulled from original array.
     */
    function array_pull(array &$origin, array $keys )
    {
        $pulledArray = [];

        foreach( $keys as $key )
        {
            if( isset( $origin[$key] ) )
            {
                $pulledArray[$key] = $origin[$key];
                unset( $origin[$key] );
            }
        }

        return $pulledArray;
    }
}

if( ! function_exists('str_random') )
{
    /**
     * Return random string of with given length
     * @param int $length
     * @return str
     * @throws \RuntimeException
     */

    function str_random($length)
    {
        if( ! is_int($length) )
        {
            throw new RuntimeException('$length must be an integer.');
        }

        if( ! function_exists('openssl_random_pseudo_bytes') )
        {
            throw new RuntimeException('OpenSSL extension needs to be installed.');
        }

        $bytes = openssl_random_pseudo_bytes($length * 2);

        if( $bytes === false )
        {
            throw new RunetimeException('Random string generation failed.');
        }

        return substr(base64_encode($bytes),0,$length);
    }
}

if( ! function_exists('camel_to_underscore') )
{
    function camel_to_underscore(string $string)
    {
	if( empty($string) )
	    return $string;
	
	$string[0] = strtolower($string[0]);
	$func = create_function('$c', 'return "_" . strtolower($c[1]);');
	return preg_replace_callback('/([A-Z])/', $func, $string);	
    }
}
