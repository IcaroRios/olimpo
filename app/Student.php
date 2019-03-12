<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Model
{
    use LogsActivity;
    
    protected $fillable = [
        'name', 'CPF',
    ];

    protected static $logAttributes = ['name', 'CPF'];
}
