<?=
$this->session->flashdata('pesan');
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/User/Add" class="btn btn-primary btn-sm pull-right">Tambah User</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Akses</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($datauser as $tampilkan) {
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>$tampilkan->nameuser</td>";
                        echo "<td>$tampilkan->jeniskelamin</td>";
                        echo "<td>$tampilkan->notelepon</td>";
                        echo "<td>$tampilkan->role</td>";
                        echo "<td><a href=" . base_url('index.php/Admin/User/Ubah/') . $tampilkan->idusers . "><button class='btn btn-primary btn-xs'><li class='fa fa-edit'></li></button></a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>