<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['id_User', 'id_Organisasi', 'role'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_User');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'id_Organisasi');
    }
}
