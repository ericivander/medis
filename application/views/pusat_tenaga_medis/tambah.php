<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pusat SDM Medis</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url('main/do_tambah_pusat_sdm_medis'); ?>">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Nama pusat SDM medis</label>
                                <input class="form-control" name="nama_psm">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jumlah SDM</label>
                                <input class="form-control" name="jumlah_sdm" type="number">
                            </div>
                            <button type="submit" class="btn btn-default">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->