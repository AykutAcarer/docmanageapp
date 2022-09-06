<?php

namespace App\Models;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upload extends Model
{
    use HasFactory;

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
