<!-- Modal Laporan -->
<div class="modal fade" id="modalLaporan" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalLaporan">Tambah Data Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/laporan/tambah" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="text" name="id_laporan" id="id_laporan" hidden>
                    <div class="form-group">
                        <label for="user">User</label>
                        <select class="form-select" aria-label="Default select example" id="id_user" name="id_user">
                            <?php foreach ($user as $u) : ?>
                            <option value="<?= $u['id_user'] ?>"><?= $u['nama']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" class="form-control" id="nama_user" name="nama_user" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <select class="form-select" aria-label="Default select example" id="id_lokasi" name="id_lokasi">
                            <?php foreach ($lokasi as $l) : ?>
                            <option value="<?= $l['id_lokasi'] ?>"><?= $l['nama_lokasi']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="sublokasi">Sub Lokasi</label>
                        <select class="form-select" aria-label="Default select example" id="id_sublokasi_tanaman"
                            name="id_sublokasi_tanaman">
                            <?php foreach ($slokasi as $sl) : ?>
                            <option value="<?= $sl['id_sublokasi_tanaman'] ?>">
                                <?= $sl['id_sublokasi_tanaman']; ?> <?= $sl['detail_sublokasi']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" class="form-control" id="nama_sublokasi_tanaman"
                            name="nama_sublokasi_tanaman" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="user">Jenis Laporan</label>
                        <select class="form-select" aria-label="Default select example" id="jenis_laporan"
                            name="jenis_laporan">
                            <option value="kerusakan">Kerusakan</option>
                            <option value="kehilangan">Kehilangan</option>
                        </select>

                        <input type="text" class="form-control" id="isi_jenis" name="isi_jenis" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="nama">Isi Laporan</label>
                        <input type="text" class="form-control" id="isi_laporan" name="isi_laporan" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="nama">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" autocomplete="off">
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