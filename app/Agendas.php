<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendas extends Model
{
    protected $fillable = [
      'agenda_name', 'agenda_duration','workshop_id'
    ];

    // protected timestamps = false;

    public  static function form()
      {
        return [
          'agenda_name'=>'',
          'agenda_duration'=>'',
          'workshop_id' => ''
        ];
      }
}
