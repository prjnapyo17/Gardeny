<!-- Modal pengelola -->
<div class="modal fade" id="modalPengelola" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalPengelola">Tambah Data Pengelola</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pengelola/tambah" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="text" name="id_pengelola" id="id_pengelola" hidden>
                    <div class="form-group">
                        <label for="nama_pengelola">Nama Pengelola</label>
                        <input type="input" class="form-control" id="nama_pengelola" name="nama_pengelola"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password" id="label_pass">Password</label>
                        <input type="input" class="form-control" id="password" name="password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="input" class="form-control" id="no_telp" name="no_telp" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Foto</label>
                        <div>
                            <img src="" alt="pict" id="picture" width="50px" class="my-1">
                        </div>
                        <p class="peringatan" id="peringatan">Masukan Foto</p>
                        <input type="hidden" name="fotoLama" id="fotoLama">
                        <input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>