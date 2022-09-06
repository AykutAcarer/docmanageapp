<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Mainfolder extends Model
{
    use HasFactory;

    public function folder()
    {
        return $this->hasMany(Folder::class, 'main_folder_id_fk');
    }

    //Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_fk');
    }
}
