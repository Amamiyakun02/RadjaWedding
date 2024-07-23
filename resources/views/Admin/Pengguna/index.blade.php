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
                    <div id="success" class="d-none alert alert-success my-2" role="alert">
                        Data pelanggan berhasil diperbarui !
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
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Edit Pengguna</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div id="err-usr" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="text" class="form-control" id="username" name="username" require>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <div id="err-nm" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="text" class="form-control" id="nama" name="nama" require>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div id="err-eml" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="email" class="form-control" id="email" name="email" require>
                    </div>
                    <div class="input-group mb-3">
                        <label for="alamat" class="form-label">Telepon</label>
                        <div id="err-tlp" class="alert alert-danger d-none" role="alert">
                        </div>
                        <span for="telepon" class="input-group-text">+62</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" id="telepon"
                            name="telepon" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <div id="err-alm" class="alert alert-danger d-none" role="alert">
                        </div>
                        <textarea type="text" class="form-control" id="alamat" name="alamat" require></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label class="mr-sm-2" for="tipe">Tipe</label>
                        <div id="err-tp" class="alert alert-danger d-none" role="alert">
                        </div>
                        <select class="custom-select mr-sm-2" id="tipe">
                            <option selected>Pilih...</option>
                            <option value="vip">Pelanggan istimewa</option>
                            <option value="pelanggan">Pelanggan biasa</option>

                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mr-sm-2" for="jk">Jenis Kelamin</label>
                        <div id="err-jk" class="alert alert-danger d-none" role="alert">
                        </div>
                        <select class="custom-select mr-sm-2" id="jk">
                            <option selected>Pilih...</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Lahir</label>
                        <div id="err-tgl" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="date" class="form-control" id="date" name="date" require>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="btn-save" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
            "url": "{{ url('api/users/index')}}",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ],
    });
});

function editPengguna(id) {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/users/' + id,
        type: 'GET', // Bisa juga 'POST', 'PUT', 'DELETE', dll.
        success: function(data) {
            $('#id').val(data.id);
            $('#username').val(data.username);
            $('#nama').val(data.nama);
            $('#email').val(data.email);
            $('#telepon').val(data.telepon);
            $('#alamat').val(data.alamat);
            $('#jk').val(data.jenis_kelamin);
            $('#tipe').val(data.jenis_pengguna);
            $('#date').val(data.tanggal_lahir);
            $('#scrollable-modal').modal('show');
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + error);
        }
    });

}

$('#btn-save').click(function() {
    var id = $('#id').val();
    $.ajax({
        url: 'http://127.0.0.1:8000/api/users/' + id, // Ganti dengan URL endpoint PUT yang sesuai
        type: 'PUT',
        contentType: 'application/json', // Tipe konten, misalnya JSON
        data: JSON.stringify({
            username: $('#username').val(),
            nama: $('#nama').val(),
            email: $('#email').val(),
            telepon: $('#telepon').val(),
            alamat: $('#alamat').val(),
            jenis_kelamin: $('#jk').val(),
            jenis_pengguna: $('#tipe').val(),
            tanggal_lahir: $('#date').val(),
        }),
        success: function(response) {
            $('#success').removeClass('d-none'); // Menampilkan elemen dengan ID success
            setTimeout(() => {
                $('#success').addClass(
                    'd-none'); // Menyembunyikan elemen dengan ID success setelah 3 detik
            }, 3000); // 3000 milidetik = 3 detik
            console.log('Berhasil:', response);
            $('#scrollable-modal').modal('hide');
            table.ajax.reload();
        },
        error: function(xhr, status, error) {
            console.log(JSON.parse(xhr.responseText));

        }
    });
});
</script>
@endsection
