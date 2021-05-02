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
        // retrieve the data in the database corresponding to the id
        // get an array collection
        $content = Content::find($id);
        $data1 = $content['firstname'];
        $data2= $content['lastname'];
        $data3 = $content['description'];
        $img = $content['file'];
        // result request
        // class mobile display none for  deskop tablette et oridnateur
        // class mobile css display block  deskop mobile,smarphone
        $result='<div class="result"><span id="name'.$id.'" class="mobile">'.$data1.' '.$data2.'</span><br/><img src="upload/'.$img.'" width="120" height="80"><span class="name">'.$data1.' '.$data2.'</span>'.$data3.'</div>';

        return $result;
    }
}
