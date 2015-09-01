<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Kabupaten/Kota</h1>
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
                                    <th class="col-sm-4">Kabupaten/Kota</th>
                                    <th class="col-sm-4">Kerawanan Bencana</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0; $j = 1;
                                $n = $kab_kota->num_rows();
                                while($i < $n)
                                {
                                    $row = $kab_kota->row($i);
                                    echo '<tr>';
                                        echo '<td class="text-center">'.$j.'</td>';
                                        echo '<td>'.$row->nama_kota.'</td>';
                                        echo '<td><ul>';
                                            $id = $row->id_kota;
                                            while($id == $row->id_kota && $i < $n)
                                            {
                                                echo '<li>'.$row->nama_bencana.'</li>';
                                                $i++;
                                                $row = $kab_kota->row($i);
                                            }
                                        echo '</ul></td>';
                                    echo '<td class="text-center">
                                        <a href="'.site_url("main/ubah_kab_kota/".$id).'" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="modal-anchor" data-toggle="modal" data-target="#pageModal" data-key="'.$id.'" data-task="delete_kab_kota" title="Hapus Data">
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