<?php

namespace App\Http\Controllers;
use App\Content;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    // retrieves all the list of file profiles to display them
    // index page of the solution (public page)
    public function index_all(){
        $listes = Content::All();
        return view('welcome', compact('listes'));
    }

    // display the page of the form to add a profile
      public function add() {

        return view('star.add');
      }

      // get the list of file profiles
      // list in alphabetical order the name of the profiles for display
      // insert paginate for list
       public function list(){

        $result = DB::table('content')->paginate(3);
        return view('star.list', compact('result'));
    }

      // Add a new profile to the files
       public function create(Request $request){

        $messages = [
            'lastname.max' => 'Votre prénom ne peut avoir plus de :max caractères.',
            'lastname.min' => 'Votre nom ne peut avoir moins de :min caractères.',
            'firstname.required' => 'Vous devez saisir un prénom.',
            'description.min' => 'vous devez saisir au moins 5 caractères',
            'description.max' => 'vous devez siaisir au plus 300 caractères',

        ];

        $rules = [
            'lastname' => 'required|string|min:5|max:55',
            'firstanme' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:300',
            'file' => 'required|mimes:jpeg,png,jpg|max:2048'

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
            if($request->hasfile('file')) {

                $file = $request->file('file');

                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $file->move(public_path('upload'), $filename);

                $file_name = $filename;
            }

            else{
                $file_name="no";
            }

                // insert to data in db

                try {
                    $content = new Content();
                    $content->lastname = $lastname;
                    $content->firstname = $firstname;
                    $content->description = $description;
                    $content->file = $file_name;
                    // insert bdd in content
                    $content->save();
                    // redirect vers la page des actions crud
                    return redirect('home');
                } catch (Exception $e) {
                    return redirect('star.add')->with('failed', "echec");
                }
            }
        }


     // display the modification form of an existing profile
     public function edit($id){
        $data = Content::find($id);
        return view('star/edit', compact('data'));

    }

     // action post sur edit user

     public function creates(Request $request, $id){

        $messages = [
            'lastname.max' => 'Votre prénom ne peut avoir plus de :max caractères.',
            'lastname.min' => 'Votre nom ne peut avoir moins de :min caractères.',
            'firstname.required' => 'Vous devez saisir un prénom.',
            'description.min' => 'vous devez saisir au moins 5 caractères',
            'description.max' => 'vous devez siaisir au plus 300 caractères',

        ];

        $rules = [
            'lastname' => 'required|string|min:5|max:55',
            'firstanme' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:300',
            'file' => 'required|mimes:jpeg,png,jpg|max:2048'

        ];



        $validator = Validator::make($request->all(),$rules,$messages);
        if (!$validator->fails()) {
            return redirect('star/add')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            // récupération des données via les input
            // retrieve the name of the file and path of the file picture upload
            // upload image
            // retrieve the data of the current profile
            $content = Content::find($id);

            if ($request->hasfile('file')) {

                $file = $request->file('file');

                if($content->file =!$file){
                    // we delete the image in the upload folder
                    unlink(public_path('upload').'/'.$content->file);
                }

                $extension = $file->getClientOriginalExtension();

                $filename = time() . '.' . $extension;

                $file->move(public_path('upload'), $filename);

                $file_name = $filename;
              }

            else{
                $file_name= $content->file;
            }

            // insert to data in db
            // retrieve the data of the current profile
              $content = Content::find($id);

                // update of the profile modification
                $content->lastname = $request->input('lastname');
                $content->firstname = $request->input('firstname');
                $content->description = $request->input('description');
                $content->file = $file_name;
                // insert bdd in content
                $content->save();
                // redirect vers la page des actions crud
                return redirect('home');

        }
    }



    // delete the profile from the user file
    public function  delete($id){
        $content = Content::find($id);

        // we delete the image in the upload folder
        unlink(public_path('upload').'/'.$content->file);

        // we delete the data in the database
        $content->delete();
        // on redirige sur la page
        return redirect()->route('list')->with('succes_delete','votre profil est bien suprimé');

    }



}
