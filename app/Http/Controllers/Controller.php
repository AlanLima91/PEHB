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
        $AllActu = DB::table('news')->paginate(1000);
    	return view('actu',array('actus' => $AllActu));
    }
    function new_actu()
    {
        return view('actu.new');
    }
    function add_actu() // la saisie dans la vue new est enregistré dans la DB
    {
        DB::table('news')->insert([
            [ 'name' => $_POST['titre'], 'contenu' =>  $_POST['description'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
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
        DB::table('categories')->insert([
            [ 'name' => $_POST['name'], 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
        return controller::equipe();
    }
    function new_equipe()
    {
        return view('equipe.Addequipe');
    }
    function selectAllcategories() //Permet d'afficher toutes les catégories
    {
        $requete = "select * from Categories ;"; //Connexion a la table Catégories
        $pdo = connexion (); //On Se connecte
        if ($pdo != null)
        {
            $select = $pdo->prepare($requete);
            $select->execute ();
            $resultats = $select->fetchAll();
            return $resultats;
        }
        else 
        {
            return null;
        }
    }
    function add_equipe()
    {

    }
    function selectAllequipe()
    {
        $requete = "select * from equipe ;";
        $pdo = connexion ();
        if ($pdo != null)
        {
            $select = $pdo->prepare($requete);
            $select->execute ();
            $resultats = $select->fetchAll();
            return $resultats;
        }
        else 
        {
            return null;
        }
    }
    function new_joueur()
    {
        return view('equipe.Addjoueur');
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