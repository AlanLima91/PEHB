<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function actu()
    {
        $AllActu = DB::table('news')->paginate(1000);
    	return view('actu',array('actus' => $AllActu));
    }
    function new_actu()
    {
        return view('actu.new');
    }
    function add_actu()
    {
        DB::table('news')->insert([
            [ 'name' => $_POST['titre'], 'contenu' =>  $_POST['description'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        return controller::actu();
    }

/////////////////////////////////////////////////////////

    function equipe()
    {
    	return view('equipe');
    }
    function new_categorie()
    {
        DB::table('categories')->insert([
            [ 'name' => $_POST['name'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        return controller::equipe();
    }
    function new_equipe()
    {

    }

/////////////////////////////////////////////////////////

    function resultats()
    {
    	return view('resultats');
    }

/////////////////////////////////////////////////////////

    function calendrier()
    {
        return view('calendrier');
    }

/////////////////////////////////////////////////////////

    function information()
    {
        return view('information');
    }
}