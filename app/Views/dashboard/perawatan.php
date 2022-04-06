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
            <button type="button" class="tambah shadow tambahPerawatan" data-bs-toggle="modal"
                data-bs-target="#modalPerawatan">
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
                        <th scope="col">Nama Tanaman</th>
                        <th scope="col">User</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Jenis Perawatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status Perawatan</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php 
                        $i = 1 + (5 * ($currentPage - 1));
                        foreach ($detail_perawatan as $dp) : 
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $dp['nama_tanaman']; ?></td>
                        <td><?= $dp['nama']; ?></td>
                        <td><?= $dp['nama_lokasi']; ?></td>
                        <td><?= $dp['jenis_perawatan']; ?></td>
                        <td><?= $dp['tanggal']; ?></td>
                        <td><?= $dp['status_perawatan']; ?></td>
                        <td class="bg-light">
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalPerawatan"
                                    class="detailPerawatan mx-2 my-2"
                                    href="/perawatan/detail/<?= $dp['id_perawatan'];?>"
                                    data-id="<?=$dp['id_perawatan'];?>">
                                    <img src="/icon/detail.svg" alt="detail">
                                </a>
                            </button>
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalPerawatan"
                                    class="editPerawatan mx-2 my-2" href="/perawatan/getedit/<?= $dp['id_perawatan'];?>"
                                    data-id="<?=$dp['id_perawatan'];?>">
                                    <img src="/icon/edit.svg" alt="edit">
                                </a>
                            </button>
                            <button class="aksi">
                                <a href="/perawatan/hapus/<?= $dp['id_perawatan'];?>"
                                    onclick="return confirm('Yakin?')"><img src="/icon/delete.svg" alt="hapus"
                                        class="mx-2 my-2"></a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('perawatan', 'bootstrap_page'); ?>
        </div>
    </div>
</div>

<?= $this->include('modal/modal_perawatan'); ?>

<?= $this->endSection(); ?>