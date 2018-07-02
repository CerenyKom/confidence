<?php


if (!function_exists('pagetitle')){
    function pagetitle($title){
        $base = "Sublime";
        if ($title === ''){
            return $base;
        }else{
            return $title . '' . $base;
        }

    }
}

if (!function_exists('setactive')){

    /**
     * @param $route
     * @return string
     */
    function setactive($route){
          return Route::is($route) ? 'active' : '';
    }
}

