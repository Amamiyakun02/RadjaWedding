@extends('Layouts.layout')

@section('content')

  <h1>Form Input Pengguna</h1>

  <form action="#" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
    </div>

    <div class="form-group">
      <label for="nama">Nama Lengkap:</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
    </div>

    <div class="form-group">
      <label for="telepon">Nomor Telepon:</label>
      <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon">
    </div>

    <div class="form-group">
      <label for="alamat">Alamat:</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
    </div>

    <div class="form-group">
      <label for="jenis_pengguna">Jenis Pengguna:</label>
      <select class="form-control" id="jenis_pengguna" name="jenis_pengguna">
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
    </div>

    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin:</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" checked>
        <label class="form-check-label" for="laki-laki">Laki-laki</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="perempuan">
        <label class="form-check-label" for="perempuan">Perempuan</label>
      </div>
    </div>

    <div class="form-group">
      <label for="tanggal_lahir">Tanggal Lahir:</label>
      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
