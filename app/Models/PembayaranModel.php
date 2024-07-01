<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';protected $fillable = [
        'rentalID',
        'detailbookingID',
        'tanggal_pembayaran',
        'jumlah',
        'metode_pembayaran',
        'status',
    ];

    public function detail_booking()
    {
        return $this->belongsTo(DetailBookingModel::class, 'detailbookingID');
    }
    public function penyewaan()
    {
        return $this->belongsTo(PenyewaanModel::class, 'rentalID');
    }

//DONE
}
