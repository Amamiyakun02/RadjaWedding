<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';protected $fillable = [
        'UserID', 'PaymentDate', 'Amount', 'PaymentMethod', 'Status'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'UserID');
    }


}
