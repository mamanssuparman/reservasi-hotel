<div class="row">
    <div class="col-md-12">
        <div class="card mb-4 mt-4 box-shadow">
            <div class="card-body">
                <h3 class="text-center">Form Pemesanan Kamar</h3>
                <?= $this->session->flashdata('pesan'); ?>
                <form action="<?= base_url() ?>index.php/Kamar/PesanKamar" method="POST">
                    <div class="form-group">
                        <label>Nama Kamar</label>
                        <input type="hidden" name="idkamar">
                        <input type="text" name="namakamar" class="form form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="hidden" name="idtamu">
                        <input type="text" name="namatamu" class="form form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Checkin</label>
                        <input type="date" name="tanggalcheckin" class="form form-control">
                    </div>
                    <div class="form-group">
                        <label>Lama Mengingap</label>
                        <input type="text" name="lamainap" class="form form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary btn-md" type="submit">PESAN KAMAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var url = '<?= base_url() ?>'
    $.getJSON(url + 'index.php/Kamar/getDataReservasi/' + '<?= $this->session->userdata('id_user'); ?>' + '/' + '<?= $this->uri->segment(3); ?>', function(res) {
        console.log(res)
        res.datakamar.map((x) => {
            $('input[name="namakamar"]').val(x.namakamar)
            $('input[name="idkamar"]').val(x.idkamar)
        })
        res.datauser.map((x) => {
            $('input[name="idtamu"]').val(x.idtamu)
            $('input[name="namatamu"]').val(x.nama)
        })
    })
</script>