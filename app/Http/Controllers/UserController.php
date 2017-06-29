<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\User;
use Image;
use File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!is_null( $request->tipo ))
        {
            switch ($request->tipo) {
                case 'empleados':
                    $users = User::where('tipo',2)->paginate(15);
                    return view('usuarios.empleado', compact('users'));
                
                case 'administradores':
                    $users = User::where('tipo',3)->paginate(15);
                    return view('usuarios.administrador', compact('users'));
                default:
                    abort(404, "La página a la que está intentando ingresar no existe.");
            }
        }
        else {
            $users = User:: paginate(15);
            return view('usuarios');
        }        
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
        if (request()->isJson()) {
            if (User::where('email', '=', $request->email)->exists()) {
                return response()->json(['mensaje' => 'El usuario ya existe.'], 403);
            }
        }
        else {
            $this->validate($request , array( 
                'nombre' => 'required|max:255', 
                'apellido' => 'required|max:255', 
                'email' => 'required|email|unique', 
                'password' => 'required|string|min:6', 
                'tipo' => 'numeric|min:1|max:3', 
                'dni' => 'size:8', 
                'estado' => 'required|boolean', 
                'imagen' => 'image',
                'direccion' => 'max:255', 
                'distrito' => 'max:255',
                'nacimiento' => 'date',
            )); 
        }

        // Guardando data
        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if(!is_null( $request->tipo )){ $user->tipo = $request->tipo; } else { $user->tipo = 1; };
        $user->dni = $request->dni;
        $user->estado = 1;
        $user->puntos = 0;
        $user->api_token = str_random(60);
        $user->imagen = "default.png";
        $user->direccion = $request->direccion;
        $user->nacimiento = $request->nacimiento;

        $user->save();

        if(request()->isJson()) {
            return response()->json(['mensaje' => 'El usuario se añadió exisotamente'], 201);
        }

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
        if(response()->expectsJson()) {
            return $user;
        }
        return view('usuarios.show','user');
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
        return view('usuarios.edit', compact('user'));
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

        $this->validate($request , array( 
                'nombre' => 'max:255', 
                'apellido' => 'max:255',
                'password' => 'string|min:6', 
                'tipo' => 'numeric|min:1|max:3', 
                'dni' => 'size:8', 
                'estado' => 'boolean', 
                'direccion' => 'max:255', 
                'distrito' => 'max:255', 
                'nacimiento' => 'date', 
            )); 


        // Guardando data
        $user = Auth::user();

        if(!is_null( $request->nombre )){ $user->nombre = $request->nombre; }
        if(!is_null( $request->apellido )){ $user->apellido = $request->apellido; }
        if(!is_null( $request->password )){$user->password = bcrypt($request->password);}
        if(!is_null( $request->dni )){ $user->dni = $request->dni; }
        if(!is_null( $request->estado )){ $user->estado = $request->estado; }
              

        if($request->hasFile('imagen')) {

                $imagen = $request->file('imagen');
                $filename = time() . '.' . $imagen->getClientOriginalExtension();
                Image::make($imagen)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename ) );
                if ($user->imagen != "default.png") {
                    $path = '/uploads/avatars/';
                    $lastpath= $user->imagen;
                    File::Delete(public_path( $path . $lastpath) );
                }
                $user->imagen = $filename;
        }
        if(!is_null( $request->direccion )){ $user->direccion = $request->direccion; }
        if(!is_null( $request->nacimiento )){ $user->nacimiento = $request->nacimiento; }

        $user->save();

        if(request()->expectsJson()){
            return response()->json(['mensaje' => 'El usuario ha sido actualizado.', 'data' => $user], 202);
        }

        return $user;
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
        if ($user->estado == 1){ $user->estado = 0; }
        else { $user->estado = 1; }

        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function subir_imagen(Request $request)
    {
        echo $request->nombre;
        return dd($request->hasFile('imagen'));
    }

}
