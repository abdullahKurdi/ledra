<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded=[];

    public function sections(){
        return $this->hasMany(AboutSection::class ,'about_id');
    }
}
