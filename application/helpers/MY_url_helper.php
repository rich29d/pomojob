<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('active_anchor'))
{
    function active_anchor($url = NULL, $title = NULL, $key = NULL, $params = array())
    {
        if ($url && $key)
        {
            if($key == $url)
            {
                if (array_key_exists ('class' , $params))
                {
                    $params['class'] .= ' active';
                }
                else
                {
                    $params['class'] = 'active';
                }
            }
        }
        return anchor($url, $title, $params);
    }
}