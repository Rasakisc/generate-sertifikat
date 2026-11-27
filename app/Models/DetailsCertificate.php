<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsCertificate extends Model
{
    protected $table = 'details_certificates';
    protected $fillable = ['id_Sertifikat', 'NomorSertifikat', 'NamaPenerima'];

    public function certificate()
    {
        return $this->belongsTo(Certificates::class, 'id_Sertifikat');
    }
}
