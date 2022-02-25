<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
class ConsultarController extends Controller
{
    function index(){
        return view('Crud.ViewData');
    }
    public function getAll(Request $request)
    {
        if (request()->ajax()) {

            if (!empty($request->start_date) && !empty($request->start_date)) {
                $data = DB::table('users as u')
                ->leftJoin('tiposdocumentos as t', 'u.id_tipodocu', '=', 't.id')
                ->selectRaw('u.id, u.firstname, u.secondname, u.firstlastname, u.secondlastname, u.numeroid, u.email,  t.tipodocumento, u.created_at, u.updated_at')
                ->whereBetween('u.created_at', array($request->start_date, $request->end_date))
                ->orderBy("u.id",'ASC');

           
            return DataTables::of($data)->toJson();
            }else if (empty($request->start_date) && empty($request->start_date)){

                $data = DB::table('users as u')
                    ->leftJoin('tiposdocumentos as t', 'u.id_tipodocu', '=', 't.id')
                    ->selectRaw('u.id, u.firstname, u.secondname, u.firstlastname, u.secondlastname, u.numeroid, u.email,  t.tipodocumento, u.created_at, u.updated_at')
                    ->orderBy("u.id",'ASC');

               
                return DataTables::of($data)->toJson();
            }

            


            }
        

        // return $data;
    }

}
