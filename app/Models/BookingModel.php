<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = 'boooking';
    protected $fillable = [
        'UserID', 'BookingDate', 'ServiceDate', 'TotalPrice', 'Status', 'BundleID'
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
