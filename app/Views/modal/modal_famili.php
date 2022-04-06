<!-- Modal Tanaman -->
<div class="modal fade" id="modalFamili" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalFamili">Tambah Data Famili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/klasifikasi/tambahFamili" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="text" class="form-control" id="id_famili" name="id_famili" autocomplete="off" hidden>
                    <div class="form-group">
                        <label for="nama">Nama Famili</label>
                        <input type="text" class="form-control" id="nama_famili" name="nama_famili" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>