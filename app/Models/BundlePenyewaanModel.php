<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BundlePenyewaanModel extends Model
{
    use HasFactory;

    protected $table = 'bundle_penyewaan';
    protected $fillable = [
        'nama',
        'deskripsi',
        'total_harga',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(BookingModel::class);
    }

    // Relationship with penyewaan table
    public function penyewaan(): HasMany
    {
        return $this->hasMany(PenyewaanModel::class);
    }

    // Relationship with bundle_barang table
    public function bundleBarang(): HasMany
    {
        return $this->hasMany(BundleBarangModel::class);
    }

    // Relationship with bundle_layanan table
    public function bundleLayanan(): HasMany
    {
        return $this->hasMany(BundleLayananModel::class);
    }

//    public function penyewaan()
//    {
//        return $this->hasMany(PenyewaanModel::class, 'BundleID');
//    }
//
//    public function bundleBarang()
//    {
//        return $this->hasMany(BundleBarangModel::class, 'bundle_id');
//    }
}
