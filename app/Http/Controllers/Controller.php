<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function actu()
    {
    	return view('actu');
    }
    function equipe()
    {
    	return view('equipe');
    }
    function resultats()
    {
    	return view('resultats');
    }
    function calendrier()
    {
        return view('calendrier');
    }
    function information()
    {
        return view('information');
    }
}