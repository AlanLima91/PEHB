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
        DB::table('Categorie')->insert([
            [ 'name' => $_POST['name'],'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')] 
        ]);
        return controller::equipe();
    }
    function new_equipe()
    {
        $categorie = controller::selectAllcategorie();
        /*return view('equipe.Addequipe');*/
        return view('equipe.Addequipe',array('resultats' => $categorie));
    }
    function selectAllcategorie() //Permet d'afficher toutes les catégories
    {
        $requete = DB::table('Categorie')->paginate(100);
    }
    function add_equipe()
    {
        DB::table('Equipe')->insert([
            ['name'=> $_POST['name']]
        ]);
    }
    function selectAllequipe()
    {
        $requete = DB::table('Equipe')->paginate(100);
    }
    function new_joueur()
    {
        $equipes = controller::selectAllequipe();
        return view('equipe.Addjoueur',array('resultats' => $equipes));
    }
    function add_joueur()
    {
        DB::table('Joueur')->insert([
            ['Licence'=>$_POST['licence'],'Nom'=>$_POST['name'],'Prenom'=>$_POST['prenom'],'Annee_de_naissance'=>$_POST['year']]
        ]);
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