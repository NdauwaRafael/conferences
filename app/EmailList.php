<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    protected $fillable = [
      'email'
    ];

    public timestamps = false;

    public static function form()
    {
      return = [
        'email'=>''
      ];
    }
}
