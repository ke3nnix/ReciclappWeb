<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\User;
use Unlu\Laravel\Api\QueryBuilder;
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

        $users = User:: paginate(15);
        return $users->load('benefits');
        return view('usuarios.index', compact($users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validando la data 
        $this->validate($request , array( 
                'nombre' => 'required|max:255', 
                'apellido' => 'required|max:255', 
                'email' => 'required|email', 
                // en la vista debe haber otro campo 'password_confirmation' para validar password
                'password' => 'required|string|min:6|confirmed', 
                'tipo' => 'required|numeric|min:1|max:3', 
                'dni' => 'required|size:8', 
                'status' => 'required|boolean', 
                'puntos' => 'required|numeric|min:0', 
                // <-- validación de imagen (?)
                'direccion' => 'required|max:255', 
                'distrito' => 'required|max:255', 
                'nacimiento' => 'date', 
            )); 

        // Guardando data
        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;
        $user->dni = $request->dni;
        if (!$request->status) { $user->status = $request->status; }
        if($request->tipo == 1) { $user->puntos = $request->puntos; }
        if($request->hasFile('imagen')) {
                $user->imagen = Storage::putFile('pictures', $request->file('imagen'));
        }
        $user->direccion = $request->direccion;
        $user->nacimiento = $request->date;

        $user->save();

        // Retornar vista
        return view('usuarios.show', $user->usuario_id);                
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
        return $user;
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
        return view('usuarios.edit', compact($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // Validando la data 
        $this->validate($request , array( 
                'nombre' => 'required|max:255', 
                'apellido' => 'required|max:255', 
                'email' => 'required|email', 
                // en la vista debe haber otro campo 'password_confirmation' para validar password
                'password' => 'required|string|min:6|confirmed', 
                'tipo' => 'required|numeric|min:1|max:3', 
                'dni' => 'required|size:8', 
                'status' => 'required|boolean', 
                'puntos' => 'required|numeric|min:0', 
                // <-- validación de imagen (?)
                'direccion' => 'required|max:255', 
                'distrito' => 'required|max:255', 
                'nacimiento' => 'date', 
            )); 

        // Guardando data
        $user = User::find($id);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;
        $user->dni = $request->dni;
        if (!$request->status) { $user->status = $request->status; }
        if($request->tipo == 1) { $user->puntos = $request->puntos; }
        $user->imagen = 'imagen.jpg';
        $user->direccion = $request->direcion;
        $user->nacimiento = $request->date;

        $user->save();

        // Retornar vista
        return view('usuarios.show', $user->usuario_id); 
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

        return redirect()->route('usuarios.index');
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        if ($user->status == 1){ $user->status = 0; }
        else { $user->status = 1; }

        $user->save();

        return redirect()->route('usuarios.index');
    }
}
