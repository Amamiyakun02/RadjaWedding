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
        'rental_date',
        'return_date',
        'actual_return_date',
        'total_price',
        'status',
        'bundle_id',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

    public function rentalDetails()
    {
        return $this->hasMany(DetailPenyewaanModel::class);
    }

    public function bundleRental()
    {
        return $this->belongsTo(BundlePenyewaanModel::class, 'bundle_id');
    }

}
