<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\tiposdocumento;
class pruebaTecnicaController extends Controller
{
    function index(){
        return view('Crud.create');
    }

    //enviar datos 
    public function getData()
    {
        return response (["tipodocs" =>tiposdocumento::orderBy("id",'ASC')->get()], Response::HTTP_OK); 
    }

    
    //crear usuario desde panel
    function crearUser(Request $request){
        $request['firstname'] = strtoupper($request['firstname']);
        $request['firstname'] = trim(preg_replace('/\s+/',' ', $request['firstname']));
        $request['secondname'] = strtoupper($request['secondname']);
        $request['secondname'] = trim(preg_replace('/\s+/',' ', $request['secondname']));
        $request['firstlastname'] = strtoupper($request['firstlastname']);
        $request['firstlastname'] = trim(preg_replace('/\s+/',' ', $request['firstlastname']));
        $request['secondlastname'] = strtoupper($request['secondlastname']);
        $request['secondlastname'] = trim(preg_replace('/\s+/',' ', $request['secondlastname']));

        $validated = $this->validate($request, [
            'numeroid' =>  'required|min:4|max:17|regex:/(^[a-zA-Z0-9]+$)+/',
            'firstname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'secondname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'firstlastname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'secondlastname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|alpha_num|min:6',
            'tipodocumento' => 'required|numeric|exists:tiposdocumentos,id|unique:users,numeroid',
        ],[
            'firstname.required' => 'Se requiere ingresar el primer nombre ',
            'firstname.string' => 'El primer nombre debe contener solo texto',
            'firstname.regex' => 'El primer nombre solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'secondname.required' => 'Se requiere ingresar el segundo nombre ',
            'secondname.string' => 'El segundo nombre debe contener solo texto',
            'secondname.regex' => 'El segundo nombre solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'firstlastname.required' => 'Se requiere ingresar el primer apellido ',
            'firstlastname.string' => 'El primer apellido debe contener solo texto',
            'firstlastname.regex' => 'El primer apellido debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'secondlastname.required' => 'Se requiere ingresar el segundo apellido ',
            'secondlastname.string' => 'El segundo apellido debe contener solo texto',
            'secondlastname.regex' => 'El segundo apellido debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'numeroid.required' => 'Se requiere digitar el numero de identificacion',
            'numeroid.min' => 'Debe ingresar minimo 4 caracteres',
            'numeroid.max' => 'Debe ingresar maximo 17 caracteres',
            'numeroid.regex' => 'El numero de identificacion solo debe contener letras y/o numeros(No se permiten números o caracteres especiales como tildes, comas, etc).',
            'email.required' => 'Se requiere el email',
            'email.email' => 'Debe ingresar un email valido',
            'email.unique' => 'Ya existe un registro con el mismo correo electronico',
            'password.required' => 'Se requiere ingresar una contraseña',
            'password.alpha_num' => 'la contraseña debe contener caracteres alpha numericos',
            'password.min' => 'Como minimo la contraseña debe tener 6 Digitos',
            'tipodocumento.required' => 'Se requiere seleccionar el Tipo de documento',
            'tipodocumento.numeric' => 'Debe seleccionar una Tipo de documento valido',
            'tipodocumento.exists' => 'Debe seleccionar una Tipo de documento valido',
            'tipodocumento.unique' => 'el tipo de documento debe ser diferente '
        ]);
        if ($validated) {
            // consultar usuario con mismos datos de tipo de documento y numero de documento
            $consulta = User::where('id_tipodocu','=',$request->input('tipodocumento'))->where('numeroid','=',$request->input('numeroid'))->first();
            //si tiene datos la consulta, significa que encontro un registro con el mismo numero de documento y numero de identificacion
            if($consulta){
                return response([
                    'message' => 'Ya existe un usuario registrad@ con este tipo de documento y numero de documento, por favor verifica la informacion digitada!'
                 ],500);
            }
            else{
                        $user = User::create([
                            'firstname' => $request->input('firstname'), 
                            'secondname' => $request->input('secondname'), 
                            'firstlastname' => $request->input('firstlastname'), 
                            'secondlastname' => $request->input('secondlastname'), 
                            'numeroid' => $request->input('numeroid'), 
                            'email' => $request->input('email'),
                            'password' => bcrypt($request->input('password')),
                            'id_tipodocu' => $request->input('tipodocumento')
                        ]);
                return response([
                    'message' => 'Registro guardado exitosamente!'
                ], Response::HTTP_OK);
            }
           
        }else{
            return response([
                'message' => 'Registro fallido!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
