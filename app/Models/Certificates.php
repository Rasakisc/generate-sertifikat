<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $table = 'certificates';
    protected $fillable = ['id_Organisasi', 'Judul', 'is_Premium'];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'id_Organisasi');
    }

    public function details()
    {
        return $this->hasMany(DetailsCertificate::class, 'id_Sertifikat');
    }
}
