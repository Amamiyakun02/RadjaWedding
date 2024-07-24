@extends('Admin.Layout.main')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="w-25">
                        <button id="tambah-paket" class="btn btn-success w-50 my-2"> <i
                                class="fas fa-plus mr-2"></i>Tambah</button>
                    </div>

                    <div class="card-header">
                        Paket
                    </div>
                    <div id="success" class="d-none alert alert-success my-2" role="alert">
                        Data paket berhasil diperbarui !
                    </div>
                    <div id="success-add" class="d-none alert alert-success my-2" role="alert">
                        Data paket berhasil ditambahkan !
                    </div>
                    <div id="success-hapus" class="d-none alert alert-success my-2" role="alert">
                        Data paket berhasil dihapus !
                    </div>
                    <div class="card-body">
                        <table id="user-table"
                            class="table overflow-scroll table-striped table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Deskripsi</td>
                                    <td>Total Harga</td>
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
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Edit Paket</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <div id="err-nm" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="text" class="form-control" id="nama" name="nama" require>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <div id="err-dks" class="alert alert-danger d-none" role="alert">
                        </div>
                        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" require></textarea>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="btn-save-edit" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Tambah Paket</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama-add" class="form-label">Nama</label>
                        <div id="err-nm-add" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="text" class="form-control" id="nama-add" name="nama-add" require>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi-add" class="form-label">Deskripsi</label>
                        <div id="err-dks-add" class="alert alert-danger d-none" role="alert">
                        </div>
                        <textarea type="text" class="form-control" id="deskripsi-add" name="deskripsi-add"
                            require></textarea>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="tambah-paket-btn" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="hapus-paket" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Hapus Paket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0">Hapus Paket</h5>
                <p>Anda yakin ingin menghapus data ini, data paket akan di hapus permanen !</p>
                <input type="hidden" id="id-hapus">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" id="hapus-paket-btn" class="btn btn-danger">Confirm</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
$(document).ready(function() {
    // Inisialisasi DataTable
    var table = $('#user-table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "{{ url('api/paket/index')}}",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }],
    });

    window.editPaket = function(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/paket/' + id,
            type: 'GET',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#deskripsi').val(data.deskripsi);
                $('#modal-edit').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    };

    $('#btn-save-edit').click(async function() {
        var id = $('#id').val();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/paket/' + id,
            type: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify({
                nama: $('#nama').val(),
                deskripsi: $('#deskripsi').val(),

            }),
            success: function(response) {
                console.log('Berhasil:', response);
                table.ajax.reload(null, false); // Memuat ulang DataTable
                $('#success').removeClass(
                    'd-none'); // Menampilkan elemen dengan ID success
                setTimeout(() => {
                    $('#success').addClass(
                        'd-none'
                    ); // Menyembunyikan elemen dengan ID success setelah 3 detik
                }, 3000); // 3000 milidetik = 3 detik
                $('#modal-edit').modal('hide');
                $('#err-nm').addClass('d-none');
                $('#err-dks').addClass('d-none');
            },
            error: function(xhr, status, error) {
                var msg = JSON.parse(xhr.responseText);

                if (msg.nama != undefined) {
                    $('#err-nm').removeClass('d-none');
                    $('#err-nm').text(msg.nama);
                }
                if (msg.deskripsi != undefined) {
                    $('#err-dks').removeClass('d-none');
                    $('#err-dks').text(msg.deskripsi);
                }
            }
        });
    });
    $('#tambah-paket-btn').click(async function() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/paket',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                nama: $('#nama-add').val(),
                deskripsi: $('#deskripsi-add').val(),
            }),
            success: function(response) {
                table.ajax.reload(null, false); // Memuat ulang DataTable
                $('#success-add').removeClass(
                    'd-none'); // Menampilkan elemen dengan ID success
                setTimeout(() => {
                    $('#success-add').addClass(
                        'd-none'
                    ); // Menyembunyikan elemen dengan ID success setelah 3 detik
                }, 3000); // 3000 milidetik = 3 detik
                $('#modal-tambah').modal('hide');

            },
            error: function(xhr, status, error) {
                var msg = JSON.parse(xhr.responseText);
                console.log(msg);
                if (msg.nama != undefined) {
                    $('#err-nm-add').removeClass('d-none');
                    $('#err-nm-add').text(msg.nama);

                }
                if (msg.deskripsi != undefined) {
                    $('#err-dks-add').removeClass('d-none');
                    $('#err-dks-add').text(msg.deskripsi);
                }
            }
        });
    });

    $('#tambah-paket').click(() => {
        $('#err-nm-add').addClass('d-none');
        $('#err-dks-add').addClass('d-none');
        $('#modal-tambah').modal('show');
    })

    window.hapusPaket = (id) => {
        $('#hapus-paket').modal('show');
        $('#id-hapus').val(id);
    }

    $('#hapus-paket-btn').click(() => {
        console.log($('#id-hapus').val());
        var id = $('#id-hapus').val();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/paket/' + id,
            type: 'DELETE',
            contentType: 'application/json',
            success: function(response) {
                table.ajax.reload(null, false); // Memuat ulang DataTable
                $('#success-hapus').removeClass(
                    'd-none'); // Menampilkan elemen dengan ID success
                setTimeout(() => {
                    $('#success-hapus').addClass(
                        'd-none'
                    ); // Menyembunyikan elemen dengan ID success setelah 3 detik
                }, 3000); // 3000 milidetik = 3 detik
                $('#hapus-paket').modal('hide');
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    })
});
</script>
@endsection
