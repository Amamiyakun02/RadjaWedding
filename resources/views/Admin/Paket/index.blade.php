@extends('Admin.Layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Data</h4>

                    <div class="table-responsive">
                        <table class="table">
                                              <thead>
                            <tr>
                                <th>No</th>
                                <th>Name Paket</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Paket 1</td>
                                <td>Paket Mantap</td>
                                <td>2</td>
                                <td>Rp. 2.400.000</td>
                                <td>Tersedia</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
{{--                                {{ $users->links('pagination.custom') }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

