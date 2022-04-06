<!-- Modal Perawatan -->
<div class="modal fade" id="modalPerawatan" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalPerawatan">Tambah Data Perawatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/perawatan/tambah" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="input" class="form-control" id="id_perawatan" name="id_perawatan" autocomplete="off"
                        hidden>
                    <div class="form-group">
                        <label for="tanaman">Tanaman</label>
                        <input type="input" class="form-control" id="nama_tanaman" name="nama_tanaman"
                            autocomplete="off" hidden>
                        <select class="form-select" aria-label="Default select example" id="id_tanaman"
                            name="id_tanaman">
                            <?php foreach ($tanaman as $t) : ?>
                            <option value="<?= $t['id_tanaman'] ?>">
                                <?= $t['nama_tanaman']; ?>
                                <?php endforeach; ?>
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">User</label>
                        <input type="input" class="form-control" id="nama" name="nama" autocomplete="off" hidden>
                        <select class="form-select" aria-label="Default select example" id="id_user" name="id_user">
                            <?php foreach ($user as $u) : ?>
                            <option value="<?= $u['id_user'] ?>"><?= $u['nama']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_lokasi">Lokasi</label>
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
                        <label for="jenis_perawatan">Jenis Perawatan</label>
                        <input type="input" class="form-control" id="input_jenis_perawatan" name="jenis_perawatan"
                            autocomplete="off" hidden>
                        <select class="form-select" aria-label="Default select example" id="jenis_perawatan"
                            name="jenis_perawatan">
                            <option value="penyiraman">Penyiraman
                            <option value="pemupukan">Pemupukan
                            <option value="pemotongan dahan">Pemotongan Dahan
                            <option value="penggantian pot">Penggantian Pot
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="time" class="form-control" id="waktu" name="waktu" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="status_perawatan">Status Perawatan</label>
                        <input type="input" class="form-control" id="input_status_perawatan" name="status_perawatan"
                            autocomplete="off">
                        <select class="form-select" aria-label="Default select example" id="status_perawatan"
                            name="status_perawatan">
                            <option value="belum dilakukan">Belum Dilakukan
                            <option value="sudah dilakukan">Sudah Dilakukan
                        </select>
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