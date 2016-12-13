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
    function selectAll($table)
    {
        return $requete = DB::table($table)->paginate(1000);
    }
    function actu()
    {
        return view('actu',array('actus' => controller::selectAll("News")));
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
        $all = array(
          'Categorie' => controller::selectAll("Categorie"),
          'Equipe' => controller::selectAll("Equipe"),
          'Joueur' => controller::selectAll("Joueur")  
        );
        return view('equipe',$all);
    }
#---------------------------------------------------------------
    function new_categorie()
    {
        return view('equipe.Addcategorie');
    }
    function add_categorie()
    {
        DB::table('Categorie')->insert([
            [ 'name' => $_POST['name'],'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')] 
        ]);
        return redirect('equipe');
    }
#---------------------------------------------------------------
    function new_equipe()
    {
        $categorie = controller::selectAll("Categorie");
        /*return view('equipe.Addequipe');*/
        return view('equipe.Addequipe',array('resultats' => $categorie));
    }
    function add_equipe()
    {
        DB::table('Equipe')->insert([
            ['name'=> $_POST['name'],'id_Categorie'=>$_POST['id']]
        ]);
        return redirect('equipe');
    }
#---------------------------------------------------------------
    function new_joueur()
    {
        $equipes = controller::selectAll("Equipe");
        return view('equipe.Addjoueur',array('resultats' => $equipes));
    }
    function add_joueur()
    {
        DB::table('Joueur')->insert([
            ['Licence'=>$_POST['licence'],'Nom'=>$_POST['name'],'Prenom'=>$_POST['prenom'],'Annee_de_naissance'=>$_POST['year'],'id_Equipe'=>$_POST['id']]
        ]);
        return redirect('equipe');
    }
    function show_joueur($id){
        $joueur = DB::table('Joueur')->where('Licence',$id)->first();
        // dd($joueur);
        return view('equipe.AfficheJoueur',array('infos' => $joueur));
    }
/////////////////////////////////////////////////////////

    function resultats()
    {
        return view('resultats',array('Result' => controller::selectAll("VS")));
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