<?php

namespace Irish\Ecom\Controllers;

use Illuminate\Http\Request;
use Irish\Ecom\Ecommerce;


class EcomContoller 
{
    //

    public function firstOne() {
       
        $quote ="Just Done";

        
        return view('ecom::index',compact('quote'));
    }
}
