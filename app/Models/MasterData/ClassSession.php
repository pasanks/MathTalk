<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{
    public function MainClasses(){
        return $this->belongsTo('App\Models\MasterData\ClassD');
    }
}
