@extends('Admin.Layout.main')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pengguna
                    </div>
                    <div class="card-body">
                        <table id="user-table" class="table table-striped table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Telepon</td>
                                    <td>Alamat</td>
                                    <td>Tipe</td>
                                    <td>Jenis Kelamin</td>
                                    <td>Tanggal Lahir</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#user-table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "{{ url('api/users')}}",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ],
    });
});
</script>
@endsection
