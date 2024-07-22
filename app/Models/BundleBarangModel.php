<?php

namespace App\Models;

use App\Http\Controllers\BarangModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleBarangModel extends Model
{
    use HasFactory;

    protected $table = 'bundle_barang'; // Nama tabel sesuai dengan skema
    protected $fillable = [
        'bundle_id',
        'barang_id',
        'Quantity'
    ];

    public function bundlePenyewaan()
    {
        return $this->belongsTo(BundlePenyewaanModel::class, 'bundle_id');
    }

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }
//    DONE
}
