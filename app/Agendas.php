<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendas extends Model
{
    protected $fillable = [
      'agenda_name', 'agenda_time', 'agenda_duration'
    ];

    // protected timestamps = false;

    public  static function form()
      {
        return [
          'agenda_name'=>'',
          'agenda_time'=>'',
          'agenda_duration'=>''
        ];
      }
}
