<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
   use HasFactory;

       protected $table = 'barang'; // Nama tabel sesuai dengan skema

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Name', 'Description', 'Price', 'Stock', 'Category'
    ];

    public function detailPenyewaan()
    {
        return $this->hasMany(DetailPenyewaanModel::class, 'barangID');
    }

    public function pengembalianBarang()
    {
        return $this->hasMany(PengembalianBarangModel::class, 'barangID');
    }

    public function bundleBarang()
    {
        return $this->hasMany(BundleBarangModel::class, 'barang_id');
    }
}
