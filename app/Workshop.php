<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Workshop extends Model
{
    protected $fillable = [
      'event_name', 'theme', 'goal', 'audience', 'number', 'location', 'user_id', 'when', 'time'
    ];

      public function user()
      {
        return $this->belongsTo(User::class);
      }


      public function agendas($value='')
      {
        return $this->hasMany(Agendas::class);
      }

      public function lsessions($value='')
      {
        return $this->hasMany(Lsessions::class);
      }

      public function form()
      {
        return [
          'id'=>'',
          'event_name'=>'',
          'theme'=>'',
          'goal'=>'',
          'audience'=>'',
          'number'=>'',
          'location'=>'',
          'user_id'=>'',
          'when'=>'',
          'time'=>'',
          'agendas'=>[
            Agendas::form()
          ],
          'lsessions'=>[
            Lsessions::form()
          ]

        ];
      }
}
