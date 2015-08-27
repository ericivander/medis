<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Pusat SDM Medis</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">No.</th>
                                    <th class="col-sm-4">Pusat SDM Medis</th>
                                    <th class="col-sm-4">Alamat</th>
                                    <th class="col-sm-2">Jumlah SDM</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                foreach($psm->result() as $row)
                                {
                                    echo '<tr>';
                                        echo '<td class="text-center">'.$i.'</td>';
                                        echo '<td>'.$row->nama_psm.'</td>';
                                        echo '<td>'.$row->alamat_psm.'</td>';
                                        echo '<td>'.$row->jumlah_sdm.'</td>';
                                        echo '<td class="text-center">
                                            <a href="#" class="modal-anchor" data-toggle="modal" data-target="#pageModal" data-key="'.$row->id_psm.'" data-task="delete_keahlian" title="Hapus Data">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>';
                                    echo '</tr>';
                                    $i = $i + 1;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->