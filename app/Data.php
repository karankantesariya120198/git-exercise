<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
	protected $table = ['data'];
    protected $fillable = [
        'name', 'email', 'mobile_no','image','gender','city'
    ];
}
