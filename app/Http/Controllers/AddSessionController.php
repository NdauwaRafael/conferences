<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;
use App\Agendas;
use App\Lsessions;
class AddSessionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api')
    ->except('index', 'show');
  }

  public function index()
  {
    $sessionList = Lsessions::orderBy('created_at', 'desc')
      ->get(['id','session_name', 'session_time','workshop_id']);

      return response()
      ->json([
        'Lsessions' => $sessionList
      ]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $form = Lsessions::form();

      return response()
      ->json(['form'=>$form]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
          'workshop_id'=>'required',
          'session_name'=>'required|min:5',
          'session_time'=>'required'
        ]);
        $lsession= new Lsessions($request->all());
        $lsession->save();
        return response()
            ->json([
              'added'=>true
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
       $Lsessions=Lsessions::where('workshop_id', $id)->get();

       return response()
       ->json([
         'Lsessions'=>$Lsessions
       ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
