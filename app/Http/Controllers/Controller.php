<?php

namespace App\Http\Controllers;
use DebugBar\DebugBar;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function setLanguaje($languaje){
      // dd('TEST'.$languaje);
        if(array_key_exists($languaje,config('languajes'))){
           // dd('TEST2'.$languaje);
            session()->put('applocale',$languaje);
        }   
       // dd('TEST3'.$languaje);     # code...
        return back();
    }
}
