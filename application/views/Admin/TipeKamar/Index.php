<?=
$this->session->flashdata('pesan');
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/TipeKamar/Add" class="btn btn-primary btn-sm pull-right">Tambah Tipe Kamar</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipe Kamar</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <?php
                    $no =1;
                    foreach ($datatipekamar as $tampilkan) {
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>$tampilkan->tipekamar</td>";
                        echo "<td><a href=".base_url().'index.php/Admin/TipeKamar/Ubah/'.$tampilkan->idtipekamar."><button class='btn btn-primary btn-xs'>Ubah</button></a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>