<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenyewaanModel extends Model
{
    use HasFactory;
    protected $table = 'detail_penyewaan';
    protected $fillable = [
        'rentalID',
        'barangID',
        'quantity',
        'harga',
    ];

    public function penyewaan()
    {
        return $this->belongsTo(PenyewaanModel::class);
    }

    public function barang()
    {
        return $this->belongsTo(BarangModel::class);
    }
}
