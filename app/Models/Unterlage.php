<?php

namespace App\Models;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unterlage extends Model
{
    use HasFactory;

    // protected $fillable = ['unterlagen_bereich_id_fk', 'unterlagen_typ_id_fk', 'unterlagen_name'];
    // Bunun yerine "AppServiceProvider" class inda "boot" methodunda " Model::unguard();" ekleyebiliiriz.

    //Relationship With Kapitels
    public function kapitels()
    {
        return $this->hasMany(Kapitel::class, 'unterlagen_id_fk');
    }

    //Relationship to Folder
    public function folder()
    {
        return $this->belongsTo(Folder::class, 'unterlagen_folders_id_fk');
    }

    //Relationship to Folder
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_fk');
    }
}
