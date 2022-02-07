<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Mutasi Jabatan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table_id" width="100%" cellspacing="0">
                    <div class="col-6">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control cari" placeholder="Masukkan Nama" name="keyword">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Mulai</th>
                            <th>Berakhir</th>
                            <th>Pembuat</th>
                            <th>Pengupdate</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($logHistori as $histo) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $histo['NIK']; ?></td>
                                <td><?= $histo['nama']; ?></td>
                                <td><?= $histo['jabatan']; ?></td>
                                <td><?= $histo['tgl_mulai']; ?></td>
                                <td><?= $histo['tgl_berakhir']; ?></td>
                                <td><?= $histo['creator']; ?></td>
                                <td><?= $histo['updator']; ?></td>
                                <td>
                                    <a href="/admin/editJabatan/<?= $histo['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/admin/mutasi/<?= $histo['id']; ?>" class="btn btn-primary"><i class="fas fa-sync"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('histori', 'data_paginate') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>