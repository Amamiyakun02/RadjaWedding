@extends('Admin.Layout.main')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Barang
            </h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#"> {{ $breadcrumb }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <div id="dateSelect"
                    class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    {{--                                <option selected>Aug 19</option>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Data</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produk as $barang)
                                <tr>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->deskripsi }}</td>
                                    <td>{{ $barang->harga }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>{{ $barang->kategori }}</td>
                                    <td>
                                        <img style="width: 100px; height: 100px;" src="{{ asset($barang->url_gambar) }}"
                                            alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('barang.edit', $barang->id) }}"
                                            class="btn btn-info btn-circle">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle"
                                                onclick="return confirm('Are you sure?')">
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
                                {{ $produk->links('pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
