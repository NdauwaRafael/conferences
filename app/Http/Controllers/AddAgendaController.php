<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use App\Agendas;
use App\Lsessions;
class AddAgendaController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')
      ->except('index', 'show');
    }

    public function index()
    {
      $agendas = Agendas::orderBy('created_at', 'desc')
        ->get(['id','agenda_name', 'agenda_duration']);

        return response()
        ->json([
          'agenda' => $agendas
        ]);
    }


    public function create()
    {
      $form = Agendas::form();

      return response()
      ->json(['form'=>$form]);
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'workshop_id'=>'required',
        'agenda_name'=>'required|min:3',
        'agenda_duration'=>'required'
      ]);
      $agendas= new Agendas($request->all());
      $agendas->save();
      return response()
          ->json([
            'added'=>true
          ]);
    }


    public function show($id)
    {
      $agendas=Agendas::where('workshop_id', $id)->get();

      return response()
      ->json([
        'agendas'=>$agendas
      ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
