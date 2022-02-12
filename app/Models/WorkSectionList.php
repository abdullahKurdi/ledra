<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSectionList extends Model
{
    protected $guarded=[];

    public function list(){
        return $this->belongsTo(WorkSection::class ,'work_section_id');
    }
}
