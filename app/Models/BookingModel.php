<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'UserID',
        'tanggal_pemesanan',
        'tanggal_layanan',
        'total_harga',
        'status',
        'BundleID',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'UserID');
    }

    public function detailBookings()
    {
        return $this->hasMany(DetailBookingModel::class, 'BookingID');
    }

    public function bundlePenyewaan()
    {
        return $this->belongsTo(BundlePenyewaanModel::class, 'BundleID');
    }
}
