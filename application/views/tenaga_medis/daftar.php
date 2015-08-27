<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Tenaga Medis</h1>
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
                                    <th class="col-sm-3">Nama</th>
                                    <th class="col-sm-3">Pusat Tenaga Medis</th>
                                    <th class="col-sm-3">Keahlian</th>
                                    <th class="col-sm-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0; $j = 1;
                                $n = $tenaga_medis->num_rows();
                                while($i < $n)
                                {
                                    $row = $tenaga_medis->row($i);
                                    echo '<tr>';
                                        echo '<td class="text-center">'.$j.'</td>';
                                        echo '<td>'.$row->nama_tenaga_medis.'</td>';
                                        echo '<td></td>';
                                        echo '<td><ul>';
                                            $id = $row->id_tenaga_medis;
                                            while($id == $row->id_tenaga_medis && $i < $n)
                                            {
                                                echo '<li>'.$row->nama_keahlian.'</li>';
                                                $i=$i+1;
                                                $row = $tenaga_medis->row($i);
                                            }
                                        echo '</ul></td>';
                                    echo '<td class="text-center">
                                        <a href="#" class="modal-anchor" data-toggle="modal" data-target="#pageModal" data-key="'.$row->id_tenaga_medis.'" data-task="delete_tenaga_medis" title="Hapus Data">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>';
                                    $j++;
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