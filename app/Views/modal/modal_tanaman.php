<!-- Modal Tanaman -->
<div class="modal fade" id="modalTanaman" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalTanaman">Tambah Data Tanaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tanaman/tambah" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="text" name="id_tanaman" id="id_tanaman" hidden>
                    <div class="form-group">
                        <label for="spesies">Spesies</label>
                        <select class="form-select" aria-label="Default select example" id="id_spesies"
                            name="id_spesies">
                            <?php foreach ($spesies as $s) : ?>
                            <option value="<?= $s['id_spesies'] ?>"><?= $s['nama_spesies']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" class="form-control" id="nama_spesies" name="nama_spesies" autocomplete="off"
                            hidden readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_tanaman">Nama Tanaman</label>
                        <input type="text" class="form-control" id="nama_tanaman" name="nama_tanaman"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Ciri Tanaman</label>
                        <input type="text" class="form-control" id="ciri_tanaman" name="ciri_tanaman"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama" id="nama_jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Perawatan Khusus</label>
                        <input type="text" class="form-control" id="perawatan_khusus" name="perawatan_khusus"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">QR Code</label>
                        <div>
                            <img src="" alt="qr" id="qr_image" width="50px" class="my-1">
                        </div>
                        <input type="hidden" name="qrLama" id="qrLama">
                        <input type="file" class="form-control" id="qr_code" name="qr_code" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Foto</label>
                        <div>
                            <img src="" alt="pict" id="picture" width="50px" class="my-1">
                        </div>
                        <p class="peringatan" id="peringatan">Tidak Boleh Kosong!</p>
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