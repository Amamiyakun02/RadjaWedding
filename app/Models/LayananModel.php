<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananModel extends Model
{
    use HasFactory;
    protected $column_order = ['id']; // Kolom yang bisa diurutkan
    protected $column_search = [
        'nama',
        'deskripsi',
    ];
    protected $order = ['id' => 'desc']; // Default order
    protected $request;
    protected $db;
    protected $dt;

    protected $table = 'layanan';

    protected $fillable = [
        'nama',
        'deskripsi',
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
