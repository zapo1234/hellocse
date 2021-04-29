<?php

namespace App\Http\Controllers;
use App\Content;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    //
    public function add() {

        return view('star.add');
    }

    public function create(Request $request){

        $messages = [
            'lastname.max' => 'Votre prénom ne peut avoir plus de :max caractères.',
            'lastname.min' => 'Votre nom ne peut avoir moins de :min caractères.',
            'firstname.required' => 'Vous devez saisir un prénom.',
            'description.min' => 'vous devez saisir au moins 5 caractères',
            'description.max' => 'vous devez au plus 300 caractères',

        ];

        $rules = [
            'lastname' => 'required|string|min:5|max:55',
            'firstanme' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:300',
            'file' => 'required|mimes:jpeg,png,jpg|max:2048',

        ];



        $validator = Validator::make($request->all(),$rules,$messages);
        if (!$validator->fails()) {
            return redirect('star/add')
                ->withInput()
                ->withErrors($validator);
        }
        else {

            // récupération des données via les input
            $data = $request->input();
            $lastname = trim($data['lastname']);
            $lastname = strip_tags($lastname);
            $firstname = trim($data['firstname']);
            $firstname = stripslashes(strip_tags($firstname));

            $description = trim($data['description']);
            $description = strip_tags($description);
            $description = stripslashes($description);

            // retrieve the name of the file and path of the file picture upload
            // upload image
            if ($request->hasfile('file')) {

                $file = $request->file('file');

                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $file->move(public_path('upload'), $filename);

                $file_name = $filename;
            }

            else{

                $file_name="";
            }

                try {
                    $content = new Content();
                    $content->lastname = $lastname;
                    $content->firstname = $firstname;
                    $content->description = $description;
                    $content->file = $file_name;
                    // insert bdd in content
                    $content->save();
                    return redirect('star.list')->with('status', "le profil à eté bien ajouté");
                } catch (Exception $e) {
                    return redirect('star.add')->with('failed', "echec");
                }
            }
        }



    public function update(){


    }

    public function delete() {


    }

}
