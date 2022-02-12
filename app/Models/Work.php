<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded=[];

    public function sections(){
        return $this->hasMany(WorkSection::class ,'work_id');
    }
}
