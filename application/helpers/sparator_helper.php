<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sparator'))
{
    function sparator($var = '')
    {
    return   number_format($var,4)." Kg";
    }   
}