<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ubah Jenis Bencana</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url('main/do_ubah_bencana'); ?>">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Nama jenis bencana</label>
                                <input class="form-control" name="nama_bencana" value="<?=$bencana->nama_bencana?>" required>
                                <input name="id_bencana" type="hidden" value="<?=$id_bencana?>" />
                            </div>
                            <div class="form-group">
                                <label>Keahlian yang diperlukan</label>
                                <span id="helpBlock" class="help-block">
                                    Tahan tombol Ctrl (Windows) atau Command (Mac) untuk memilih lebih dari satu bencana.
                                </span>
                                <select class="form-control" name="keahlian[]" multiple required>
                                <?php
                                    foreach($keahlian->result() as $row)
                                    {
                                        $opt = FALSE;
                                        foreach($memerlukan->result() as $raw)
                                        {
                                            if($row->id_keahlian == $raw->id_keahlian)
                                            {
                                                $opt = TRUE;
                                            }
                                        }
                                        echo '<option value="'.$row->id_keahlian.'"';
                                        if($opt) echo ' selected ';
                                        echo '>'.$row->nama_keahlian.'</option>';
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