<section class="content">

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <ul class="text-right">
                <a class="text-right btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah</a>
            </ul>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>No Kartu</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>TMT</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($user as $hasil) : ?>
                                    <tr>
                                        <td><?= $i++ ?></th>
                                        <td><?= $hasil['no_kartu']; ?></td>
                                        <td><?= $hasil['nama']; ?></td>
                                        <td><?= $hasil['status']; ?></td>
                                        <td><?= date('d F Y - H:i:s', $hasil['created']); ?></td>
                                        <td>
                                            <a href="#" class="badge badge-warning delete-people" data-toggle="modal" data-target="#modalEdit<?= $hasil['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?= base_url() ?>Dashboard/hapusUser/<?= $hasil['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Modal Add-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('Dashboard/addUser'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kartu">No Kartu</label>
                        <input type="text" class="form-control" id="kartu" name="kartu" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kartu">Status</label>
                        <select class="custom-select" id="inputGroupSelect02" name="status">
                            <option value="">-- Status --</option>
                            <option value="ACC">ACC</option>
                            <option value="Belum ACC">Belum ACC</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="add" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($user as $dt) : ?>
    <div class="modal fade" id="modalEdit<?= $dt['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('Dashboard/editUser'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $dt['id']; ?>" name="id">
                        <div class="form-group">
                            <label for="nama">Nama User</label>
                            <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $dt['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kartu">No Kartu</label>
                            <input type="text" class="form-control" id="kartu" name="kartu" required autocomplete="off" value="<?= $dt['no_kartu']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kartu">Status</label>
                            <select class="custom-select" id="inputGroupSelect02" name="status">
                                <option value="">-- Status --</option>
                                <option value="ACC" <?php if ($dt['status'] == "ACC") echo 'selected="selected"'; ?>>ACC</option>
                                <option value="Belum ACC" <?php if ($dt['status'] == "Belum ACC") echo 'selected="selected"'; ?>>Belum ACC</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>