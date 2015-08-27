<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Biaya</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url('main/do_tambah_data_biaya'); ?>">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Tenaga medis</label>
                                <select class="form-control" name="id_tenaga_medis" required>
                                <?php
                                    foreach($tenaga_medis->result() as $row)
                                    {
                                        echo '<option value="'.$row->id_tenaga_medis.'">'.$row->nama_tenaga_medis.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <select class="form-control" name="id_kota" required>
                                <?php
                                    foreach($kab_kota->result() as $row)
                                    {
                                        echo '<option value="'.$row->id_kota.'">'.$row->nama_kota.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Banyak biaya yang diperlukan</label>
                                <input class="form-control" name="biaya" required>
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