<section class="content">

    <div class="row">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/uploads/' . $this->session->userdata('foto') . ''); ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Silahkan Pilih Akses Brangkas</h5>
                        <p class="card-text">Akses saat ini : <?= $akses[0]["akses"]; ?></p> <br>
                        <button type="button" class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-edit"></i> Edit Akses</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('Dashboard/editAkses'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="custom-select" id="inputGroupSelect02" name="akses">
                        <option value="">-- Akses --</option>
                        <option value="Daftar" <?php if ($akses[0]['akses'] == "Daftar") echo 'selected="selected"'; ?>>Daftar</option>
                        <option value="Masuk" <?php if ($akses[0]['akses'] == "Masuk") echo 'selected="selected"'; ?>>Masuk</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="add" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>