<!-- Modal Tanaman -->
<div class="modal fade" id="modalGenus" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalGenus">Tambah Data Famili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/klasifikasi/tambahGenus" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="text" class="form-control" id="id_genus" name="id_genus" autocomplete="off" hidden>
                    <div class="form-group">
                        <label for="nama">Famili</label>
                        <select class="form-select" aria-label="Default select example" id="id_famili" name="id_famili">
                            <?php foreach ($famili as $f) : ?>
                            <option value="<?= $f['id_famili'] ?>"><?= $f['nama_famili']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Genus</label>
                        <input type="text" class="form-control" id="nama_genus" name="nama_genus" autocomplete="off">
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