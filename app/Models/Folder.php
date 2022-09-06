<?php

namespace App\Models;

use App\Models\Upload;

use App\Models\Unterlage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;

    //Relationship With Unterlagen
    public function unterlagen()
    {
        return $this->hasMany(Unterlage::class, 'unterlagen_folders_id_fk');
    }

    //Relationship With Unterlagen
    public function upload()
    {
        return $this->hasMany(Upload::class, 'unterlagen_folders_id_fk');
    }

    //Relationship to Mainfolder
    public function mainfolder()
    {
        return $this->belongsTo(Mainfolder::class, 'main_folder_id_fk');
    }
}
