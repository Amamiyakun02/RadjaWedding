@extends('Admin.Layout.main')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="w-25">
                        <button id="tambah-barang" class="btn btn-success w-50 my-2"> <i
                                class="fas fa-plus mr-2"></i>Tambah</button>
                    </div>

                    <div class="card-header">
                        Barang
                    </div>
                    <div id="success" class="d-none alert alert-success my-2" role="alert">
                        Data pelanggan berhasil diperbarui !
                    </div>
                    <div class="card-body">
                        <table id="user-table"
                            class="table overflow-scroll table-striped table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Jenis</td>
                                    <td>Deskripsi</td>
                                    <td>Harga</td>
                                    <td>Foto</td>
                                    <td>Stok</td>
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
                    <div class="form-group mb-4">
                        <label class="mr-sm-2" for="tipe">Kategori</label>
                        <div id="err-ktg" class="alert alert-danger d-none" role="alert">
                        </div>
                        <select class="custom-select mr-sm-2" id="kategori">
                            <option selected>Pilih...</option>
                            <option value="dekorasi">Dekorasi</option>
                            <option value="gaun">Gaun</option>
                            <option value="aksesoris">Aksesoris</option>
                            <option value="lainnya">Lainnya</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <div id="err-dks" class="alert alert-danger d-none" role="alert">
                        </div>
                        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" require></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <div id="err-hg" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="number" class="form-control" id="harga" name="harga" require>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <div id="err-stk" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="number" class="form-control" id="stok" name="stok" require>
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
                        <label for="nama" class="form-label">Nama</label>
                        <div id="err-nm" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="text" class="form-control" id="nama" name="nama" require>
                    </div>
                    <div class="form-group mb-4">
                        <label class="mr-sm-2" for="tipe">Kategori</label>
                        <div id="err-ktg" class="alert alert-danger d-none" role="alert">
                        </div>
                        <select class="custom-select mr-sm-2" id="kategori">
                            <option selected>Pilih...</option>
                            <option value="dekorasi">Dekorasi</option>
                            <option value="gaun">Gaun</option>
                            <option value="aksesoris">Aksesoris</option>
                            <option value="lainnya">Lainnya</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <div id="err-dks" class="alert alert-danger d-none" role="alert">
                        </div>
                        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" require></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <div id="err-hg" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="number" class="form-control" id="harga" name="harga" require>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <div id="err-stk" class="alert alert-danger d-none" role="alert">
                        </div>
                        <input type="number" class="form-control" id="stok" name="stok" require>
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
                                    <label class="custom-file-label" id="label-foto" for="foto">ayam</label>
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


<script type="text/javascript">
$(document).ready(function() {
    // Inisialisasi DataTable
    var table = $('#user-table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "{{ url('api/barang/index')}}",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }],
    });

    window.editBarang = function(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/barang/' + id,
            type: 'GET',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#deskripsi').val(data.deskripsi);
                $('#harga').val(data.harga);
                $('#stok').val(data.stok);
                $('#kategori').val(data.kategori);
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
        const fileName = file.name;
        var imageEncoded = ''
        if (file) {
            try {
                const base64String = await readFileAsDataURL(file);
                imageEncoded = base64String;

            } catch (error) {
                console.error('Error reading file:', error);
            }
        } else {
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
                table.ajax.reload(null, false); // Memuat ulang DataTable
                $('#success').removeClass(
                    'd-none'); // Menampilkan elemen dengan ID success
                setTimeout(() => {
                    $('#success').addClass(
                        'd-none'
                    ); // Menyembunyikan elemen dengan ID success setelah 3 detik
                }, 3000); // 3000 milidetik = 3 detik
                console.log('Berhasil:', response);
                $('#scrollable-modal').modal('hide');

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

    $('#tambah-barang').click(() => {
        $('#modal-tambah').modal('show');

    })
});
</script>
@endsection
