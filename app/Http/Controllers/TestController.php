<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Cryptocap\Facades\Cryptocap;


class TestController extends Controller
{
    /*
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
    public function __invoke(Request $request)
    {
        
    }
    */
    public function welcome()
    {      
      
        dd(Cryptocap::getAssetsWithLimit(10));  
        return view('welcome');   
    
    }

}




     