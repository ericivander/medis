<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ubah Kabupaten/Kota</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url('main/do_ubah_kab_kota'); ?>">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Nama kabupaten/kota</label>
                                <input class="form-control" name="nama_kota" value="<?php echo $kota->nama_kota; ?>">
                                <input name="id_kota" type="hidden" value="<?=$id_kota?>" />
                            </div>
                            <div class="form-group">
                                <label>Bencana yang rawan terjadi</label>
                                <span id="helpBlock" class="help-block">
                                    Tahan tombol Ctrl (Windows) atau Command (Mac) untuk memilih lebih dari satu bencana.
                                </span>
                                <select class="form-control" name="bencana[]" multiple>
                                <?php
                                    foreach($bencana->result() as $row)
                                    {
                                        $opt = FALSE;
                                        foreach($rawan->result() as $raw)
                                        {
                                            if($row->id_bencana == $raw->id_bencana)
                                            {
                                                $opt = TRUE;
                                            }
                                        }
                                        echo '<option value="'.$row->id_bencana.'"';
                                        if($opt) echo ' selected ';
                                        echo '>'.$row->nama_bencana.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Ubah</button>
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