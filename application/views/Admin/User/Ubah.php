<?=
$this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/User/" class="btn btn-warning btn-sm pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/User/Ubah/<?= $id ?>" method="POST">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form form-control" name="nameuser" value="<?= set_value('nameuser') ?>">
                        <div class="text-danger"><?= form_error('nameuser') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jeniskelamin" id="jeniskelamin" class="form form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="PRIA">PRIA</option>
                            <option value="WANITA">WANITA</option>
                        </select>
                        <div class="text-danger"><?= form_error('jeniskelamin') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form form-control"><?= set_value('alamat') ?></textarea>
                        <div class="text-danger"><?= form_error('alamat') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" name="notelepon" class="form form-control" value="<?= set_value('notelepon') ?>">
                        <div class="text-danger"><?= form_error('notelepon') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form form-control" value="<?= set_value('username') ?>">
                        <div class="text-danger"><?= form_error('username') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form form-control" value="<?= set_value('password') ?>">
                        <div class="text-danger"><?= form_error('password') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form form-control" value="<?= set_value('confirmpassword') ?>">
                        <div class="text-danger"><?= form_error('confirmpassword') ?></div>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="role" class="form form-control">
                            <option value="">-- Pilih Jenis Role</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="RECEPTIONIST">RECEPCIONIST</option>
                        </select>
                        <div class="text-danger"><?= form_error('role') ?></div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-md" type="submit">PERBAHARUI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var url = '<?= base_url() ?>'
    $.getJSON(url + 'index.php/Admin/User/getJsonUbah/' + '<?= $id ?>', function(res) {
        console.log(res)
        res.map((x) => {
            $('input[name="nameuser"]').val(x.nameuser)
            $('#jeniskelamin').val(x.jeniskelamin)
            $('#alamat').val(x.alamat)
            $('input[name="notelepon"]').val(x.notelepon)
            $('input[name="username"]').val(x.username)
            $('#role').val(x.role)
        })
    })
</script>