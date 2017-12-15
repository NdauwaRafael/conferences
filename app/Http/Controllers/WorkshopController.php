<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use App\Agendas;
class WorkshopController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')
      ->except('index', 'show');
    }

    public function index(){
      $workshop = Workshop::orderBy('created_at', 'desc')
        ->get(['event_name', 'theme', 'goal', 'audience', 'number', 'location', 'user_id', 'when', 'time']);

        return response()
        ->json([
          'workshop' => $workshop
        ]);
    }

    public function create(){
      $form = Workshop::form();

      return response()
      ->json(['form'=>$form]);
    }

    public function store(Request $request){
      $this->validate($request, [
        'event_name'=> 'required | max:120',
        'theme'=> 'required | max:120',
        'goal'=> 'required | max:120',
        'audience' => 'required | max:120',
        'number'=> 'required | max:12',
        'location' => 'required | max:120',
        'user_id' => 'required | max:12',
        'when' => 'required',
        'time' => 'required',

        'agendas.*.agenda_name' => 'required',
        'agendas.*.agenda_time' => 'required',
        'agendas.*.agenda_duration' => 'required'
      ]);

      $agendas = [];

      foreach ($request->agendas as $agenda) {
          $agendas[] = new WorkshopAgenda($request)
      }

      $workshop -> new Workshop($request->all());
      $request->user()
      ->workshop()->save($workshop);

      $workshop->agendas()
      ->saveMany($agendas);

      return response()
       ->json([
         'saved'=>true,
         'id'=>$workshop->id,
         'message'=> 'You have successfully created a Workshop!!'
       ])
    }


    public function show($id)
    {
      $workshop::Workshop::with(['user', 'agendas'])
      ->findOrFail($id);

      return response()
      ->json([
        'workshop'=>$workshop
      ])
    }

    public function edit($id, Request, $request)
    {
      $form = $request->user()->workshop()
      ->with(['agendas'=>function($query){
        $query ->get(['id', 'agenda_name', 'agenda_time', 'agenda_duration'])
      }]);

      return response()
       ->json([
         'form'=>$form
       ]);
    }


    public function update($id, Request, $request)
    {
      $this->validate($request, [
        'event_name'=> 'required | max:120',
        'theme'=> 'required | max:120',
        'goal'=> 'required | max:120',
        'audience' => 'required | max:120',
        'number'=> 'required | max:12',
        'location' => 'required | max:120',
        'user_id' => 'required | max:12',
        'when' => 'required',
        'time' => 'required',
        'agendas.*.id'=>'integer|exists:workshop_agendas',
        'agendas.*.agenda_name' => 'required'
        'agendas.*.agenda_time' => 'required'
        'agendas.*.agenda_duration' => 'required'
      ]);

      $workshop = $request->user()->woekshop()
        ->findOrFail($id);

        $agendas = [];
        $agendasUpdated = [];

        foreach ($request->agendas as $agenda) {
          if (isset($agenda['id'])) {
            WorkshopAgenda::where('workshop_id', $workshop->id)
            ->where('id', $agenda['id'])
            ->update($agenda);

            $agendasUpdated[] = $agenda['id'];
          }else{
            $agendas[]= new WorkshopAgenda($agenda);
          }
        }

        $workshop->event_name = $request->event_name;
        $workshop->theme = $request->theme;
        $workshop->goal = $request->goal;
        $workshop->audience = $request->audience;
        $workshop->number = $request->number;
        $workshop->location = $request->location;
        $workshop->when= $request->when;

        $workshop->save();
        WorkshopAgenda::whereNotIn('id', $agendasUpdated)
          -where('workshop_id', $workshop->id)
          ->delete();

          if (count($agendas)) {
            $workshop->agendas()->saveMany($agendas);
          }

          return response()
           ->json([
             'saved'=>true,
             'id'=>$workshop->id,
             'message'=>'You have successfully the workshop!!'
           ])

    }


    public function destroy($id, Request, $request)
    {
      $workshop = $request->user()->workshop()
        ->findsOrFails($id);

        WorkshopAgenda::where('workshop_id', $workshops->id)->delete();
        $result->delete();

        return response()
        ->json([
          'delete'=>true
        ]);
    }
}