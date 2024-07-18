
@extends('Admin.Layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Data</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Jenis Pengguna</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th></th>
                                </tr>
                            </thead>
{{--                            @php($a = 0);--}}
                            <tbody>
                                @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->telepon }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->jenis_pengguna }}</td>
                                    <td>{{ $user->jenis_kelamin }}</td>
                                    <td>{{ $user->tanggal_lahir }}</td>
                                    <td>
                                       <a href="{{ route('pengguna.edit', $user->id) }}" class="btn btn-info btn-circle">
                                                <i class="fas fa-info-circle"></i>
                                        </a>
                                        <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                {{ $users->links('pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
