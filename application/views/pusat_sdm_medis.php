<?php $this->view('header'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pusat SDM Medis</h1>
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
                    <a href="#" class="btn btn-primary data-modal" data-toggle="modal" data-target="#dataModal" data-key="0"><i class="fa fa-plus-square-o fa-fw"></i> Tambah Data Pusat SDM Medis</a>
                    <br /><br />
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
                                foreach($pusat_sdm_medis->result() as $row)
                                {
                                    echo '<tr>';
                                        echo '<td class="text-center">'.$i.'</td>';
                                        echo '<td>'.$row->nama_psm.'</td>';
                                        echo '<td>'.$row->alamat_psm.'</td>';
                                        echo '<td>'.$row->jumlah_sdm.'</td>';
                                        echo '<td class="text-center">
                                            <a href="#" class="data-modal" data-toggle="modal" data-target="#dataModal" data-key="'.$row->id_psm.'" title="Ubah Data">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;&nbsp;
                                            <a href="#" class="delete-modal" data-toggle="modal" data-target="#deleteModal" data-key="'.$row->id_psm.'" title="Hapus Data">
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
                        <label>Nama pusat SDM medis</label>
                        <input class="form-control" name="nama" id="dataName">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="dataAlamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah SDM</label>
                        <input class="form-control" name="jumlah_sdm" type="number" id="dataSDM">
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
            $('#modalForm').attr("action", "<?=site_url('pusat_sdm_medis/update')?>");

            $.ajax({
                method: "POST",
                url: "<?=base_url()?>pusat_sdm_medis/get_by_id/"+key,
            })
            .done(function( msg ) {
                var obj = jQuery.parseJSON(msg);
                $('#dataName').val(obj[0].nama_psm);
                $('#dataAlamat').val(obj[0].alamat_psm);
                $('#dataSDM').val(obj[0].jumlah_sdm);
            });
        }
        else
        {
            $('#modalHeader').text('Tambah Data');
            $('#modalSubmit').text('Tambah Data');
            $('#modalForm').attr("action", "<?=site_url('pusat_sdm_medis/insert')?>");
        }
    })
</script>

<?php $this->view('footer'); ?>