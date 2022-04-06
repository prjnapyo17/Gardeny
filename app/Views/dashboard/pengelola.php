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
            <button type="button" class="tambah shadow tambahPengelola" data-bs-toggle="modal"
                data-bs-target="#modalPengelola">
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
                        <th scope="col">Id User</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-secondary">
                    <?php 
                        $i = 1 + (5 * ($currentPage - 1));
                        foreach ($pengelola as $p) : 
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $p['id_user']; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['email']; ?></td>
                        <td><?= $p['no_telp']; ?></td>
                        <td><img src="/upload/<?= $p['foto']; ?>" alt="foto" style="width: 40px;"></td>
                        <td class="bg-light">
                            <button class="aksi">
                                <a data-bs-toggle="modal" data-bs-target="#modalPengelola"
                                    class="editPengelola mx-2 my-2" href="/pengelola/getEdit/<?= $p['id_user'];?>"
                                    data-id="<?=$p['id_user'];?>">
                                    <img src="/icon/edit.svg" alt="edit">
                                </a>
                            </button>
                            <button class="aksi">
                                <a href="/pengelola/hapus/<?= $p['id_user'];?>" onclick="return confirm('Yakin?')"><img
                                        src="/icon/delete.svg" alt="hapus" class="mx-2 my-2"></a>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('pengelola', 'bootstrap_page'); ?>
        </div>
    </div>
</div>

<?= $this->include('modal/modal_pengelola'); ?>

<?= $this->endSection(); ?>