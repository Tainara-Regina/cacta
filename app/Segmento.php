<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Segmento extends Model
{
  public $timestamps = false;
     public $table ="segmento";  


 public function segmento(){
     	return $this->hasMany(TituloVaga::class,'id_segmento','id');
     }

}
