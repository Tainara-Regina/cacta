<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Posts extends Model
{
  public $timestamps = false;
     public $table ="posts";  




protected $fillable = ['visualizacoes'];

}