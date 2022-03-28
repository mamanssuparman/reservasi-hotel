<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 mt-4 box-shadow">
            <div class="card-body">
                <h4 class="text-center">Data Reservasiku</h4>
                <table class="table table-bordered">
                    <tr>
                        <td>NO</td>
                        <td>Nama Kamar</td>
                        <td>Jumlah Kamar</td>
                        <td>Status</td>
                        <td>Option</td>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($datareservasiku as $tampilkan) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $tampilkan->namakamar ?></td>
                            <td><?= $tampilkan->qtykamar ?></td>
                            <td><?= $tampilkan->status ?></td>
                            <td><button class="btn btn-outline-primary btn-sm">
                                    <li class="fa fa-list"></li>
                                </button></td>
                        </tr>
                    <?php $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>