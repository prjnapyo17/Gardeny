<!-- Modal Tanaman -->
<div class="modal fade" id="modalSpesies" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalSpesies">Tambah Data Spesies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/klasifikasi/tambahSpesies" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="text" class="form-control" id="id_spesies" name="id_spesies" autocomplete="off" hidden>
                    <div class="form-group">
                        <label for="nama">Genus</label>
                        <select class="form-select" aria-label="Default select example" id="id_genus" name="id_genus">
                            <?php foreach ($genus as $g) : ?>
                            <option value="<?= $g['id_genus'] ?>"><?= $g['nama_genus']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Spesies</label>
                        <input type="text" class="form-control" id="nama_spesies" name="nama_spesies"
                            autocomplete="off">
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