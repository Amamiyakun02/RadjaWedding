<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyewaanModel extends Model
{
    use HasFactory;
    protected $table = 'penyewaan';

    protected $fillable = [
        'userID',
        'tanggal_sewa',
        'tanggal_kembali',
        'tanggal_kembali_aktual',
        'total_harga',
        'status',
        'bundleID',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'UserID');
    }

    public function detailPenyewaan()
    {
        return $this->hasOne(DetailPenyewaanModel::class, 'RentalID');
    }

    public function bundlePenyewaan()
    {
        return $this->belongsTo(BundlePenyewaanModel::class, 'BundleID');
    }

    public function pembayaran()
    {
        return $this->hasOne(PembayaranModel::class, 'rentalID');
    }
//DONE
}
