<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-2">
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
    <div class="row">
        <div class="col">
            <form action="" method="post" class="d-flex w-75">
                <input class="form-control me-2" type="text" placeholder="Search" name="search" autocomplete="off">
                <button class="btn search" type="submit">
                    <img src="/icon/search.svg" alt="search">
                </button>
            </form>
        </div>
        <div class="col float-end">
            <button type="button" class="tambah shadow tambahLaporan" data-bs-toggle="modal"
                data-bs-target="#modalLaporan">
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
                        <th scope="col">Id Laporan</th>
                        <th scope="col">Id User</th>
                        <th scope="col">Id Lokasi</th>
                        <th scope="col">Jenis Laporan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php 
                        $i = 1 + (5 * ($currentPage - 1));
                        foreach ($llaporan as $ll) : 
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $ll['id_laporan']; ?></td>
                        <td><?= $ll['nama']; ?></td>
                        <td><?= $ll['nama_lokasi']; ?></td>
                        <td><?= $ll['jenis_laporan']; ?></td>
                        <td><?= $ll['tanggal']; ?></td>
                        <td><img src="/upload/<?= $ll['foto']; ?>" alt="qr-code" style="width: 40px;"></td>
                        <td class="bg-light">
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalLaporan" class="detailLaporan mx-2 my-2"
                                    href="/laporan/getdetail/<?= $ll['id_laporan'];?>"
                                    data-id="<?=$ll['id_laporan'];?>">
                                    <img src="/icon/detail.svg" alt="detail">
                                </a>
                            </button>
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalLaporan" class="editLaporan mx-2 my-2"
                                    href="/laporan/getedit/<?= $ll['id_laporan'];?>" data-id="<?=$ll['id_laporan'];?>">
                                    <img src="/icon/edit.svg" alt="edit">
                                </a>
                            </button>
                            <button class="aksi">
                                <a href="/laporan/hapus/<?= $ll['id_laporan'];?>"
                                    onclick="return confirm('Yakin?')"><img src="/icon/delete.svg" alt="hapus"
                                        class="mx-2 my-2"></a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('laporan', 'bootstrap_page'); ?>
        </div>
    </div>
</div>

<?= $this->include('modal/modal_laporan'); ?>

<?= $this->endSection(); ?>