<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //
    protected $fillable = ['name','gender','birth_year','hair_color'];
}
