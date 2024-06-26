<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianBarangModel extends Model
{
    use HasFactory;
    protected $table = 'pengembalian_barang';protected $fillable = [
        'penyewaanID',
        'barangID',
        'tanggal_pengembalian',
        'kondisi',
        'catatan',
    ];

    public function penyewaan()
    {
        return $this->belongsTo(PenyewaanModel::class, 'penyewaanID');
    }

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barangID');
    }
//DONE
}
