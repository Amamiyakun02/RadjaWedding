<?php

namespace App\Http\Controllers;

use App\Models\BundleBarangModel;
use App\Models\DetailPenyewaanModel;
use App\Models\PengembalianBarangModel;
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
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kategori',
        'url_gambar',
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
        return $this->hasOne(BundleBarangModel::class, 'barang_id');
    }
}

// DONE
