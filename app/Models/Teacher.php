<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['user_id', 'subject', 'designation', 'experience'];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
