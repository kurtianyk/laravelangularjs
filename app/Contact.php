<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = [
        'id', 'name', 'surname', 'phone_number', 'birth_day', 'info',
    ];
}
