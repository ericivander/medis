<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pemetaan Tenaga Medis</h1>
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
                                    <th class="col-sm-5">Tenaga Medis</th>
                                    <th class="col-sm-4">Kabupaten/Kota</th>
                                    <th class="col-sm-2">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                foreach($pemetaan->result() as $row)
                                {
                                    echo '<tr>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.$row->nama_tenaga_medis.'</td>';
                                        echo '<td>'.$row->nama_kota.'</td>';
                                        echo '<td>'.$row->biaya.'</td>';
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