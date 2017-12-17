<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use App\Agendas;

class AddAgendaController extends Controller
{

    public function index()
    {
        //
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
        //
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
