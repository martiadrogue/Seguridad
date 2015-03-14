<?php 

namespace Mpwarfwk\Component;

abstract class Request{

    public static function returnRequest(){

       return $_SERVER['REQUEST_URI'];
    }
           

}