<?=
$this->session->flashdata('pesan');
?>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                Laporan Data Rerservasi Per Periode
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/Lapreservasi/Periode" method="POST">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form form-control" required name="tanggalawal">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form form-control" required name="tanggalakhir">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg">
                            <li class="fa fa-print"></li>LIHAT DATA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                Laporan Reservasi Berdasarkan Status
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/Lapreservasi/Perstatus" method="POST">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form form-control" required name="tanggal">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="CHECKIN">CHECKIN</option>
                            <option value="CHECKOUT">CHECKOUT</option>
                            <option value="CANCEL">CANCEL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg" type="submit">
                            <li class="fa fa-print"></li>LIHAT DATA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>