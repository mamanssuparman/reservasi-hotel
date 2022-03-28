<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 mt-4 box-shadow">
            <div class="card-body">
                <h3 class="text-center">REGISTER</h3>
                <?= $this->session->flashdata('pesan'); ?>
                <form action="<?= base_url() ?>index.php/Auth/Register" method="POST">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form form-control" value="<?= set_value('nik') ?>">
                        <div class="text-danger"> <?= form_error('nik') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form form-control" value="<?= set_value('nama') ?>">
                        <div class="text-danger"> <?= form_error('nama') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jeniskelamin" id="jeniskelamin" class="form form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="PRIA">PRIA</option>
                            <option value="WANITA">WANITA</option>
                        </select>
                        <div class="text-danger"> <?= form_error('jeniskelamin') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form form-control"><?= set_value('alamat') ?></textarea>
                        <div class="text-danger"> <?= form_error('alamat') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nomor telepon</label>
                        <input type="number" class="form form-control" name="nomortelepon" value="<?= set_value('nomortelepon') ?>">
                        <div class="text-danger"> <?= form_error('nomortelepon') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="username" class="form form-control" name="username" value="<?= set_value('username') ?>">
                        <div class="text-danger"> <?= form_error('username') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form form-control" name="password" value="<?= set_value('password') ?>">
                        <div class="text-danger"> <?= form_error('password') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form form-control" name="confpassword" value="<?= set_value('confpassword') ?>">
                        <div class="text-danger"> <?= form_error('confpassword') ?></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary btn-md">REGISTER</button>
                    </div>
                    Jika sudah mempunyai Account silahkan untuk login <a href="<?= base_url() ?>index.php/Auth/"> disini.!</a>
                </form>
            </div>
        </div>
    </div>
</div>