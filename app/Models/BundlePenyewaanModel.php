<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundlePenyewaanModel extends Model
{
    use HasFactory;
    protected $table = 'bundle_penyewaan';
     protected $fillable = [
        'Name', 'Description', 'TotalPrice'
    ];

    public function penyewaan()
    {
        return $this->hasMany(PenyewaanModel::class, 'BundleID');
    }

    public function bundleBarang()
    {
        return $this->hasMany(BundleBarangModel::class, 'bundle_id');
    }
}
