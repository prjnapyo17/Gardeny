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
            <button type="button" class="tambah shadow tambahGenus" data-bs-toggle="modal" data-bs-target="#modalGenus">
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
                        <th scope="col">Nama Genus</th>
                        <th scope="col">Nama Famili</th>
                        <th scope="col">Nama Genus</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php 
                        $i = 1 + (5 * ($currentPage - 1));
                        foreach ($lgenus as $g) : 
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $g['id_genus']; ?></td>
                        <td><?= $g['nama_famili']; ?></td>
                        <td><?= $g['nama_genus']; ?></td>
                        <td><?= $g['keterangan']; ?></td>
                        <td class="bg-light">
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalGenus" class="editGenus mx-2 my-2"
                                    href="/klasifikasi/getEditGenus/<?= $g['id_genus'];?>"
                                    data-id="<?=$g['id_genus'];?>">
                                    <img src="/icon/edit.svg" alt="edit">
                                </a>
                            </button>
                            <button class="aksi">
                                <a href="/klasifikasi/hapusGenus/<?= $g['id_genus'];?>"
                                    onclick="return confirm('Yakin?')"><img src="/icon/delete.svg" alt="hapus"
                                        class="mx-2 my-2"></a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links('genus', 'bootstrap_page'); ?>
        </div>
    </div>
</div>

<?= $this->include('modal/modal_genus'); ?>

<?= $this->endSection(); ?>