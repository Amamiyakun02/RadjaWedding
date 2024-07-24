@extends('Admin.Layout.main')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="w-25">
                        <button id="tambah-layanan" class="btn btn-success w-50 my-2"> <i
                                class="fas fa-plus mr-2"></i>Tambah</button>
                    </div>

                    <div class="card-header">
                        Barang
                    </div>
                    <div id="success" class="d-none alert alert-success my-2" role="alert">
                        Data layanan berhasil diperbarui !
                    </div>
                    <div id="success-add" class="d-none alert alert-success my-2" role="alert">
                        Data layanan berhasil ditambahkan !
                    </div>
                    <div id="success-hapus" class="d-none alert alert-success my-2" role="alert">
                        Data layanan berhasil dihapus !
                    </div>
                    <div class="card-body">
                        <table id="user-table"
                            class="table overflow-scroll table-striped table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Deskripsi</td>
                                    <td>Foto</td>
                                    <td style="width:140px;text-align:center;">Aksi</td>
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
                <h5 class="modal-title" id="scrollableModalTitle">Edit Barang</h5>
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
                    <div class="mb-3">
                        <label for="stok" class="form-label">Foto</label>
                        <div id="err-foto" class="alert alert-danger d-none" role="alert">
                        </div>
                        <div class="input-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="foto">
                                    <label class="custom-file-label" id="foto-label-edit" for="foto"></label>
                                </div>
                            </div>
                        </div>
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
                <h5 class="modal-title" id="scrollableModalTitle">Tambah Barang</h5>
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
                    <div class="mb-3">
                        <label for="foto-add" class="form-label">Foto</label>
                        <div id="err-foto-add" class="alert alert-danger d-none" role="alert">
                        </div>
                        <div class="input-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto-add" id="foto-add">
                                    <label class="custom-file-label" id="label-foto" for="foto"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="tambah-layanan-btn" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="hapus-layanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="danger-header-modalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="mt-0">Hapus Barang</h5>
                <p>Anda yakin ingin menghapus data ini, data barang akan di hapus permanen !</p>
                <input type="hidden" id="id-hapus">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" id="hapus-barang-btn" class="btn btn-danger">Confirm</button>
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
            "url": "{{ url('api/layanan/index')}}",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }],
    });

    window.editLayanan = function(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/layanan/' + id,
            type: 'GET',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#deskripsi').val(data.deskripsi);
                $('#foto-label-edit').html(data.url_gambar);
                $('#modal-edit').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    };

    function readFileAsDataURL(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
            reader.readAsDataURL(file);
        });
    }

    $('#btn-save-edit').click(async function() {
        var id = $('#id').val();
        const file = $('#foto')[0].files[0];
        var fileName
        var imageEncoded
        if (file !== undefined) {
            try {
                const base64String = await readFileAsDataURL(file);
                imageEncoded = base64String;
                fileName = file.name

            } catch (error) {
                console.error('Error reading file:', error);
            }
        } else {
            fileName = '';
            imageEncoded = '';
        }
        console.log(imageEncoded);
        $.ajax({
            url: 'http://127.0.0.1:8000/api/barang/' + id,
            type: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify({
                nama: $('#nama').val(),
                deskripsi: $('#deskripsi').val(),
                harga: $('#harga').val(),
                stok: $('#stok').val(),
                kategori: $('#kategori').val(),
                base64_image: imageEncoded,

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
                console.log('Berhasil:', response);
                $('#modal-edit').modal('hide');

                $('#err-nm').addClass('d-none');
                $('#err-ktg').addClass('d-none');
                $('#err-dks').addClass('d-none');
                $('#err-hg').addClass('d-none');
                $('#err-stk').addClass('d-none');
                $('#err-ft').addClass('d-none');

            },
            error: function(xhr, status, error) {
                var msg = JSON.parse(xhr.responseText);

                if (msg.nama != undefined) {
                    $('#err-nm').removeClass('d-none');
                    $('#err-nm').text(msg.nama);

                }
                if (msg.kategori != undefined) {
                    $('#err-ktg').removeClass('d-none');
                    $('#err-ktg').text(msg.kategori);

                }
                if (msg.deskripsi != undefined) {
                    $('#err-dks').removeClass('d-none');
                    $('#err-dks').text(msg.deskripsi);

                }
                if (msg.harga != undefined) {
                    $('#err-hg').removeClass('d-none');
                    $('#err-hg').text(msg.harga);
                }
                if (msg.stok != undefined) {
                    $('#err-stk').removeClass('d-none');
                    $('#err-stk').text(msg.stok);

                }
                if (msg.base64_image != undefined) {
                    $('#err-ft').removeClass('d-none');
                    $('#err-ft').text(msg.base64_image);
                }
            }
        });
    });
    $('#tambah-layanan-btn').click(async function() {
        const file = $('#foto-add')[0].files[0];
        var fileName
        var imageEncoded
        if (file !== undefined) {
            try {
                const base64String = await readFileAsDataURL(file);
                imageEncoded = base64String;
                fileName = file.name

            } catch (error) {
                console.error('Error reading file:', error);
            }
        } else {
            fileName = '';
            imageEncoded = '';
        }

        $.ajax({
            url: 'http://127.0.0.1:8000/api/layanan',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                nama: $('#nama-add').val(),
                deskripsi: $('#deskripsi-add').val(),
                base64_image: imageEncoded,

            }),
            success: function(response) {
                console.log('Berhasil:', response);
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
                if (msg.base64_image != undefined) {
                    $('#err-foto-add').removeClass('d-none');
                    $('#err-foto-add').text(msg.base64_image);
                }
            }
        });
    });

    $('#tambah-layanan').click(() => {
        $('#err-nm-add').addClass('d-none');
        $('#err-dks-add').addClass('d-none');
        $('#err-foto-add').addClass('d-none');
        $('#modal-tambah').modal('show');
    })

    window.hapusBarang = (id) => {
        $('#hapus-barang').modal('show');
        $('#id-hapus').val(id);
    }

    $('#hapus-barang-btn').click(() => {
        console.log($('#id-hapus').val());
        var id = $('#id-hapus').val();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/barang/' + id,
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
                $('#hapus-layanan').modal('hide');
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    })
});
</script>
@endsection