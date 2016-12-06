<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function actu()
    {
        $AllActu = DB::table('News')->paginate(1000);
    	return view('actu',array('actus' => $AllActu));
    }
    function new_actu()
    {
        return view('actu.new');
    }
    function add_actu() // la saisie dans la vue new est enregistré dans la DB
    {
        DB::table('News')->insert([
            [ 'name' => $_POST['titre'], 'article' =>  $_POST['description'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        return redirect('actu');
    }
/////////////////////////////////////////////////////////

    function equipe()
    {
    	return view('equipe');
    }
    function new_categorie()
    {
        return view('equipe.Addcategorie');
    }
    function add_categorie()
    {
        DB::table('Equipe')->insert([
            [ 'categorie' => $_POST['name']] 
        ]);
        return controller::equipe();
    }
    function new_equipe()
    {
        return view('equipe.Addequipe');
    }
    function selectAllcategories() //Permet d'afficher toutes les catégories
    {

    }
    function add_equipe()
    {
        DB::table('Equipe')->insert([
            ['name'=> $_POST['name']]
        ]);
    }
    function selectAllequipe()
    {
        $requete = DB::table('equipe')->paginate(100);
    }
    function new_joueur()
    {
        $equipes = controller::selectAllequipe();
        // dd($equipes);
        return view('equipe.Addjoueur',array('resultats' => $equipes));
    }
    function add_joueur()
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