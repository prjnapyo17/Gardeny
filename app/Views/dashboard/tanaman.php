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
            <button type="button" class="tambah shadow tambahTanaman" data-bs-toggle="modal"
                data-bs-target="#modalTanaman">
                <img src="/icon/tambah.svg" alt="tambah" class="m-auto d-block">
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table mt-3 w-100 shadow fs-6">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Tanaman</th>
                        <th scope="col">Nama Tanaman</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">QR Code</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php 
                        $i = 1 + (5 * ($currentPage - 1));
                        foreach ($tanaman as $t) : 
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $t['id_tanaman']; ?></td>
                        <td><?= $t['nama_tanaman']; ?></td>
                        <td><?= $t['jumlah']; ?></td>
                        <td><img src="/upload/<?= $t['qr_code']; ?>" alt="qr-code" style="width: 40px;"></td>
                        <td><img src="/upload/<?= $t['foto']; ?>" alt="foto" style="width: 40px;"></td>
                        <td class="bg-light">
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalTanaman" class="detailTanaman mx-2 my-2"
                                    href="/tanaman/detail/<?= $t['id_tanaman'];?>" data-id="<?=$t['id_tanaman'];?>">
                                    <img src="/icon/detail.svg" alt="detail">
                                </a>
                            </button>
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalTanaman" class="editTanaman mx-2 my-2"
                                    href="/tanaman/getedit/<?= $t['id_tanaman'];?>" data-id="<?=$t['id_tanaman'];?>">
                                    <img src="/icon/edit.svg" alt="edit">
                                </a>
                            </button>
                            <button class="aksi">
                                <a href="/tanaman/hapus/<?= $t['id_tanaman'];?>" onclick="return confirm('Yakin?')"><img
                                        src="/icon/delete.svg" alt="hapus" class="mx-2 my-2"></a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('tanaman', 'bootstrap_page'); ?>
        </div>
    </div>
</div>

<?= $this->include('modal/modal_tanaman'); ?>


<?= $this->endSection(); ?>