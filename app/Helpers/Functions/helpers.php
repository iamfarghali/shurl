<?php

if ( !function_exists('from_base10_to_base62') ) {
    function from_base10_to_base62 ( int $value )
    {
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $b = 62;

        $r = $value % $b;
        $result = $base[ $r ];
        $q = floor( $value / $b );

        while ( $q ) {
            $r = $q % $b;
            $q = floor( $q / $b );
            $result = $base[ $r ] . $result;
        }

        return $result;
    }
}

if ( !function_exists('from_base62_to_base10') ) {
    function from_base62_to_base10 ( string $value )
    {
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $b = 62;

        $limit = strlen( $value );
        $result = strpos( $base, $value[0] );

        for ( $i = 1; $i < $limit; $i++ ) {
            $result = $b * $result + strpos( $base, $value[ $i ] );
        }

        return $result;
    }
}
