<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request){
            $type = $request->get('type');
            $data = $request->get('data');
    
            $users = User::searchBy($type, $data)->paginate(5);
            

            return view('user.admin.index', compact('users') );
        }else{
            $cryptos = User::paginate(10);

            return view('user.admin.index', compact('users'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'account_type' => 'required|string',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:1',
        ]);

        
        //Subir la imagen
        $image= $request->file('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        if($image){
            // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
            $image_name =  time() . $image->getClientOriginalName();
            // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
            // donde se almacenó y guardamos la imagen recibida con el nombre generado
            Storage::disk('users')->put($image_name, File::get($image));
            
        }   
        User::create([
            'name'=> $request->name,
            'surname'=> $request->surname,
            'account_type'=> $request->account_type,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)

        ]);
    
        

        return redirect()->route('user.admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::find($id);
        return view('user.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.admin.edit',[
            'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
      
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'account_type' => 'required|string',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:1',
        ]);

        
        //Subir la imagen
        $image= $request->file('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        if($image){
            // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
            $image_name =  time() . $image->getClientOriginalName();
            // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
            // donde se almacenó y guardamos la imagen recibida con el nombre generado
            Storage::disk('users')->put($image_name, File::get($image));
            $user->image = $image_name;   
        }   
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->account_type = $request->account_type;
        $user->password = Hash::make($request->password);
    
        $user->save();

        return redirect()->route('user.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        
        return redirect()->route('user.admin.index');
        
    }

    /**
    * Devuelve la imagen avatar del usuario
    *
    * @param [type] $filename
    * @return void
    */
   public function getImage($filename){     
    $file = Storage::disk('users')->get($filename);
    return new Response($file, 200);
 }

 public function profile(){
    $user = Auth::user();
    return view('user.profile',[
       'user' => $user
    ]);

 }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
      
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'account_type' => 'required|string',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:1',
        ]);

        
        //Subir la imagen
        $image= $request->file('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        if($image){
            // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
            $image_name =  time() . $image->getClientOriginalName();
            // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
            // donde se almacenó y guardamos la imagen recibida con el nombre generado
            Storage::disk('users')->put($image_name, File::get($image));
            $user->image = $image_name;   
        }   
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
        $user->save();

        return redirect()->route('user.profile');
    }
}