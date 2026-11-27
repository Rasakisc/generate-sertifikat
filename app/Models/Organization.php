<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';
    protected $fillable = ['Nama', 'Kode', 'Logo'];

    public function members()
    {
        return $this->hasMany(Member::class, 'id_Organisasi');
    }

    public function certificates()
    {
        return $this->hasMany(Certificates::class, 'id_Organisasi');
    }
}
