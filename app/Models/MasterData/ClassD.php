<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class ClassD extends Model
{


    public function grade(){
        return $this->belongsTo('App\Models\MasterData\Grade');
    }
    public function classSessions(){
        return $this->hasMany('App\Models\MasterData\ClassSession');
    }

}
