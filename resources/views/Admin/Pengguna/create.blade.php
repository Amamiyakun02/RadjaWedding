@extends('Admin.Layout.main')

@section('content')
    <div class="row 8 d-flex justify-content-center">
        <div class="col-8 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Pengguna</h4>
                    <form action="{{ route('pengguna.store) }}">
                        <div class="form-body">
                           <div class="col-md-8">
                                <div class="form-group">
                                    <label>Label</label>
                                    <input type="text" class="form-control" placeholder="1">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
