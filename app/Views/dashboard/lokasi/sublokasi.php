<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-2 w-100">
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('gagal')) : ?>
    <div class="alert alert-danger mt-2" role="alert">
        <?= session()->getFlashdata('gagal'); ?>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <h3 class="color-1 fw-bold">Data <?= $title1; ?></h3>
        </div>
    </div>
    <div class="row top-table">
        <div class="col">
            <form class="d-flex w-75">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"
                    autocomplete="off">
                <button class="btn search" type="submit">
                    <img src="/icon/search.svg" alt="search">
                </button>
            </form>
        </div>
        <div class="col float-end">
            <button type="button" class="tambah shadow tambahSublokasi" data-bs-toggle="modal"
                data-bs-target="#modalSublokasi">
                <img src="/icon/tambah.svg" alt="tambah" class="m-auto d-block">
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table mt-3 w-100 shadow">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Sublokasi</th>
                        <th scope="col">Nama Tanaman</th>
                        <th scope="col">Nama Lokasi</th>
                        <th scope="col">Detail Sublokasi</th>
                        <th scope="col">Media Tanam</th>
                        <th scope="col">Foto</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php 
                        $i = 1 + (5 * ($currentPage - 1));
                        foreach ($lsublokasi as $ls) : 
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $ls['id_sublokasi_tanaman']; ?></td>
                        <td><?= $ls['nama_tanaman']; ?></td>
                        <td><?= $ls['nama_lokasi']; ?></td>
                        <td><?= $ls['detail_sublokasi']; ?></td>
                        <td><?= $ls['media_tanam']; ?></td>
                        <td>
                            <img src="/upload/<?= $ls['foto_satuan']; ?>" alt="foto" style="width: 40px;">
                        <td class="bg-light">
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalSublokasi"
                                    class="detailSublokasi mx-2 my-2"
                                    href="/lokasi/getDetailSublokasi/<?= $ls['id_sublokasi_tanaman'];?>"
                                    data-id="<?=$ls['id_sublokasi_tanaman'];?>">
                                    <img src="/icon/detail.svg" alt="detail">
                                </a>
                            </button>
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalSublokasi"
                                    class="editSublokasi mx-2 my-2"
                                    href="/lokasi/getEditSublokasi/<?= $ls['id_sublokasi_tanaman'];?>"
                                    data-id="<?=$ls['id_sublokasi_tanaman'];?>">
                                    <img src="/icon/edit.svg" alt="edit">
                                </a>
                            </button>
                            <button class="aksi">
                                <a href="/lokasi/hapusSublokasi/<?= $ls['id_sublokasi_tanaman'];?>"
                                    onclick="return confirm('Yakin?')"><img src="/icon/delete.svg" alt="hapus"
                                        class="mx-2 my-2"></a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('sublokasi', 'bootstrap_page'); ?>
        </div>
    </div>
</div>

<?= $this->include('modal/modal_sublokasi'); ?>


<?= $this->endSection(); ?>