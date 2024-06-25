<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserModel extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // Nama tabel sesuai dengan skema


    protected $fillable = [
        'name', 'email', 'phone', 'address', 'userType', 'gender', 'dateOfBirth'
    ];

    public function bookings()
    {
        return $this->hasMany(DetailBookingModel::class, 'UserID');
    }

    public function penyewaan()
    {
        return $this->hasMany(PenyewaanModel::class, 'UserID');
    }
    public function payments()
    {
        return $this->hasMany(PembayaranModel::class, 'UserID');
    }
}
