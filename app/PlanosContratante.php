<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PlanosContratante extends Model
{
	public $timestamps = false;
	public $table ="planos_contratante"; 


	public function roles(){
          
          return $this->belongsTo(\App\CactaCandidatos::class);
	}


 public function roles_contratante(){
          
          return $this->belongsTo(\App\CactaUsers::class,'id','id_plano');
    }





}
