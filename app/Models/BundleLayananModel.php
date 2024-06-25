<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleLayananModel extends Model
{
    use HasFactory;

        protected $table = 'bundle_layanan'; // Nama tabel sesuai dengan skema
     protected $fillable = [
        'BundleID', 'layananID'
    ];

    public function layanan()
    {
        return $this->belongsTo(LayananModel::class, 'layananID');
    }

}
