<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBookingModel extends Model
{
    use HasFactory;
    protected $table = 'detail_booking';
    protected $fillable = [
        'BookingID', 'layananID', 'harga'
    ];

    public function booking()
    {
        return $this->belongsTo(BookingModel::class, 'BookingID');
    }

    public function layanan()
    {
        return $this->belongsTo(LayananModel::class, 'layananID');
    }
}
