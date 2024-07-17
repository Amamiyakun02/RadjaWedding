<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
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

    public function bookings(): HasMany
    {
        return $this->hasMany(BookingModel::class, 'UserID');
    }

    public function penyewaan(): HasMany
    {
        return $this->hasMany(PenyewaanModel::class, 'UserID');
    }

}
// DONE
