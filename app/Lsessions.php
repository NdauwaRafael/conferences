<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lsessions extends Model
{

  protected $fillable = [
    'session_name', 'session_time','workshop_id'
  ];

   public function form()
    {
      return [
        'session_name'=>'',
        'session_time'=>'',
        'workshop_id' => ''
      ];
    }
}
