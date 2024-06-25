<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianBarangModel extends Model
{
    use HasFactory;
    protected $table = 'pengembalian_barang';protected $fillable = [
        'penyewaanID', 'barangID', 'ReturnDate', 'Condition', 'Notes'
    ];

    public function penyewaan()
    {
        return $this->belongsTo(PenyewaanModel::class, 'penyewaanID');
    }

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barangID');
    }

}
