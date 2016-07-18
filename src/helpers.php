<?php

namespace BlackLabel;

if( ! function_exists('array_pull') )
{
    /**
     * Return key => value array and remove keys from original array.
     * @param array $array Original array
     * @param array $keys Array of keys to pull from original array.
     * @return array Array of key => value pulled from original array.
     */
    function array_pull( &$origin, $keys )
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
