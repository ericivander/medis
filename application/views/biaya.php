<?php $this->view('header'); ?>

<div class="col-lg-8 col-lg-offset-2" id="page-content">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Data Master Biaya</h1>
        </div>
        <div class="col-lg-4 text-right">
            <br/>
            <br/>
            <a href="#" class="btn btn-success data-modal" data-toggle="modal" data-target="#dataModal" data-key="0">
                <i class="fa fa-plus-square-o fa-fw"></i> Tambah Data Biaya
            </a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                        if(!empty($this->session->flashdata('insert')))
                        {
                            if($this->session->flashdata('insert') == 'success')
                                echo '<div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <b>Berhasil.</b> Data telah berhasil ditambahkan.
                                </div>';
                            else if($this->session->flashdata('insert') == 'failed')
                                echo '<div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <b>Gagal.</b> Data tersebut telah ada.
                                </div>';
                        }
                        else if(!empty($this->session->flashdata('update')) && $this->session->flashdata('update') == 'success')
                        {
                            echo '<div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                <b>Berhasil.</b> Data telah berhasil diubah.
                            </div>';
                        }
                        else if(!empty($this->session->flashdata('delete')) && $this->session->flashdata('delete') == 'success')
                        {
                            echo '<div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                <b>Berhasil.</b> Data telah berhasil dihapus.
                            </div>';
                        }
                    ?>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">No.</th>
                                    <th class="col-sm-4">Tenaga Medis</th>
                                    <th class="col-sm-4">Kabupaten/Kota</th>
                                    <th class="col-sm-2">Biaya</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                foreach($biaya as $row)
                                {
                                    echo '<tr>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td>'.$row->nama_tenaga_medis.'</td>';
                                        echo '<td>'.$row->nama_kota.'</td>';
                                        echo '<td>'.$row->biaya.'</td>';
                                        echo '<td class="text-center">
                                            <a href="#" class="data-modal" data-toggle="modal" data-target="#dataModal" data-key="'.$row->id_biaya.'" title="Ubah Data">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;&nbsp;
                                            <a href="#" class="delete-modal" data-toggle="modal" data-target="#deleteModal" data-key="'.$row->id_biaya.'" title="Hapus Data">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>';
                                    echo '</tr>';
                                    $i++;
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

<div class="modal fade" id="dataModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="modalHeader"></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="modalForm" action="" method="post">
                    <div class="form-group">
                        <label>Tenaga medis</label>
                        <select class="form-control" name="id_tenaga_medis" required>
                        <?php
                            foreach($tenaga_medis->result() as $row)
                            {
                                echo '<option id="opt'.$row->id_tenaga_medis.'t" value="'.$row->id_tenaga_medis.'">'.$row->nama_tenaga_medis.'</option>';
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
                                echo '<option id="opt'.$row->id_kota.'k"value="'.$row->id_kota.'">'.$row->nama_kota.'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Banyak biaya yang diperlukan</label>
                        <input class="form-control" name="biaya" id="dataName" required>
                    </div>
            </div>
            <div class="modal-footer">
                    <input type="hidden" id="dataKey" name="key"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button id="modalSubmit" type="submit" class="btn btn-danger"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.data-modal').on('click', function () {
        var anchor = $(this);
        var key = anchor.data('key');
        $('#dataKey').val(key);
        if(key != '0')
        {
            $('#modalHeader').text('Ubah Data');
            $('#modalSubmit').text('Ubah Data');
            $('#modalForm').attr("action", "<?=site_url('biaya/update')?>");

            $.ajax({
                method: "POST",
                url: "<?=base_url()?>biaya/get_by_id/"+key,
            })
            .done(function( msg ) {
                var obj = jQuery.parseJSON(msg);
                $('#dataName').val(obj[0].biaya);
                $('#opt' + obj[0].id_tenaga_medis + 't').attr("selected","true");
                $('#opt' + obj[0].id_kota + 'k').attr("selected","true");
            });
        }
        else
        {
            $('#modalHeader').text('Tambah Data');
            $('#modalSubmit').text('Tambah Data');
            $('#modalForm').attr("action", "<?=site_url('biaya/insert')?>");
        }
    })
</script>

<?php $this->view('footer'); ?>