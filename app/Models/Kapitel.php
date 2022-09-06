<?php

namespace App\Models;

use App\Models\Unterlage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kapitel extends Model
{
    use HasFactory;

    //Default olarak tanimlanan primary key $id 
    // ancak biz bunu kendi veri tabanimizdaki gibi degistirmek istiyorsak bu sekilde yazmaliyiz
    protected $primaryKey = 'k_id';

    //Relationship to Unterlage
    public function unterlagen()
    {
        return $this->belongsTo(Unterlage::class, 'unterlagen_id_fk');
    }
}
