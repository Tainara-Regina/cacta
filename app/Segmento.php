<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Segmento extends Model
{
  public $timestamps = false;
     public $table ="segmento";  


 public function rola(){
     	return $this->hasOne(TituloVaga::class,'id_segmento','id');
     }

}
