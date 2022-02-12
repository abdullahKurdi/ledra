<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $guarded=[];

    public function about(){
        return $this->belongsTo(About::class ,'about_id');
    }
}
