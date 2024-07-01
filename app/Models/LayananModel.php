<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananModel extends Model
{
    use HasFactory;
    protected $table = 'layanan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'url_gambar',
     ];

    public function detailBookings()
    {
        return $this->hasMany(DetailBookingModel::class, 'layananID');
    }

    public function bundleLayanan()
    {
        return $this->hasOne(BundleLayananModel::class, 'layananID');
    }

}
