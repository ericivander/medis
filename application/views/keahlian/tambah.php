<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Keahlian</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url('main/do_tambah_keahlian'); ?>">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>Nama keahlian</label>
                                <input class="form-control" name="nama_keahlian">
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