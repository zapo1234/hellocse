<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    // retrieves all the list of file profiles to display them
    // index page of the solution (public page)
    public function index_all(){
        $listes = Content::All();
        return view('welcome', compact('listes'));
    }

    // retour d'affichage requete ajax

    public function datas(){
        return view('star.data');
    }


    // retrieve data dynamically
    // display the data according to the click on the data id
    // affichage des données  à partir de l'id unique
    public function data_call(Request $request){
        // get the current id via the ajax request
        $id = $request->id;
        // recupére les données dans la bdd correspondant àl'id
        $content = Content::find($id);
        $data = $content['firstanme'];
        $data1= $content['lastname'];
        $data2 = $content['description'];
        $img = $content->file;
        $result='<div><img src="upload/'.$img.'" width="120" height="70"><span class="name">'.$data.' '.$data1.'</span><br/>'.$data2.'</div>';

        return $result;
    }
}
