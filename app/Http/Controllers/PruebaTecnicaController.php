<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class pruebaTecnicaController extends Controller
{
    function index(){
        return view('Crud.create');
    }

    function crearUser(Request $request){
        $request['firstname'] = strtoupper($request['firstname']);
        $request['firstname'] = trim(preg_replace('/\s+/',' ', $request['firstname']));
        $request['secondname'] = strtoupper($request['secondname']);
        $request['secondname'] = trim(preg_replace('/\s+/',' ', $request['secondname']));
        $request['firstlastname'] = strtoupper($request['firstlastname']);
        $request['firstlastname'] = trim(preg_replace('/\s+/',' ', $request['firstlastname']));
        $request['secondlastname'] = strtoupper($request['secondlastname']);
        $request['secondlastname'] = trim(preg_replace('/\s+/',' ', $request['secondlastname']));
        $this->validate($request, [
            'firstname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'secondname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'firstlastname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'secondlastname' => 'required|string|max:60|regex:/^[ña-zA-Z ]+$/',
            'numeroid' =>  'required|min:4|max:17|regex:/(^[a-zA-Z0-9]+$)+/',
            'email' => 'required|email',
            'password' => '',
            'tipodocumento'
        ],[
            'firstname.required' => 'Se requiere el primer nombre ',
            'firstname.string' => 'El priimer nombre debe ser solo texto',
            'firstname.regex' => 'El primer nombre solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'secondname.required' => 'Se requiere el primer nombre ',
            'secondname.string' => 'El priimer nombre debe ser solo texto',
            'secondname.regex' => 'El primer nombre solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'firstlastname.required' => 'Se requiere el primer nombre ',
            'firstlastname.string' => 'El priimer nombre debe ser solo texto',
            'firstlastname.regex' => 'El primer nombre solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'secondlastname.required' => 'Se requiere el primer nombre ',
            'secondlastname.string' => 'El priimer nombre debe ser solo texto',
            'secondlastname.regex' => 'El primer nombre solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'numeroid.min' => 'Debe ingresar minimo 4 caracteres',
            'numeroid.max' => 'Debe ingresar maximo 17 caracteres',
            'numeroid.regex' => 'El numero de identificacion solo debe contener letras y/o numeros(No se permiten números o caracteres especiales como tildes, comas, etc).',
            'email.required' => 'Se requiere el email',
            'email.email' => 'Debe ingresar un email valido',
        ]);

        $user = User::create([
        	'firstname' => 'Admin', 
            'secondname' => 'Admin', 
            'firstlastname' => 'Admin', 
            'secondlastname' => 'Admin', 
            'numeroid' => 1151968044, 
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456'),
            'id_tipodocu' => 1

        ]);
    }
}
