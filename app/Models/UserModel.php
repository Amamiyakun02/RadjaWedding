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
        'username',
        'nama',
        'email',
        'password',
        'telepon',
        'alamat',
        'jenis_pengguna',
        'jenis_kelamin',
        'tanggal_lahir',

    ];

    public function bookings()
    {
        return $this->hasMany(BookingModel::class, 'UserID');
    }

    public function penyewaan()
    {
        return $this->hasMany(PenyewaanModel::class, 'UserID');
    }

}
// DONE 