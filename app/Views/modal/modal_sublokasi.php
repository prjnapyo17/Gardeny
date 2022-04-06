<!-- Modal Sub Lokasi -->
<div class="modal fade" id="modalSublokasi" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalSublokasi">Tambah Data Sublokasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/lokasi/tambahSublokasi" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="input" class="form-control" id="id_sublokasi_tanaman" name="id_sublokasi_tanaman"
                        autocomplete="off" hidden>
                    <div class="form-group">
                        <label for="nama">Tanaman</label>
                        <input type="input" class="form-control" id="nama_tanaman" name="nama_tanaman"
                            autocomplete="off" hidden>
                        <select class="form-select" aria-label="Default select example" id="id_tanaman"
                            name="id_tanaman">
                            <?php foreach ($tanaman as $t) : ?>
                            <option value="<?= $t['id_tanaman'] ?>"><?= $t['nama_tanaman']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Lokasi</label>
                        <input type="input" class="form-control" id="nama_lokasi" name="nama_lokasi" autocomplete="off"
                            hidden>
                        <select class="form-select" aria-label="Default select example" id="id_lokasi" name="id_lokasi">
                            <?php foreach ($lokasi as $l) : ?>
                            <option value="<?= $l['id_lokasi'] ?>"><?= $l['nama_lokasi']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_lokasi">Detail Sublokasi</label>
                        <input type="input" class="form-control" id="detail_sublokasi" name="detail_sublokasi"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Media Tanam</label>
                        <input type="input" class="form-control" id="pilih_media_tanam" name="pilih_media_tanam"
                            autocomplete="off" hidden>
                        <select class="form-select" aria-label="Default select example" id="media_tanam"
                            name="media_tanam">
                            <option value="dengan pot">Dengan Pot</option>
                            <option value="tanpa pot">Tanpa Pot</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Foto</label>
                        <div>
                            <img src="" alt="pict" id="picture" width="50px" class="my-1" hidden>
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