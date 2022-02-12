<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSection extends Model
{
    protected $guarded=[];

    public function work(){
        return $this->belongsTo(Work::class ,'work_id');
    }

    public function lists(){
        return $this->hasMany(WorkSectionList::class ,'work_section_id');
    }
}
