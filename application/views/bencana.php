<?php $this->view('header'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bencana</h1>
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
                    <a href="#" class="btn btn-primary data-modal" data-toggle="modal" data-target="#dataModal" data-key="0"><i class="fa fa-plus-square-o fa-fw"></i> Tambah Data Bencana</a>
                    <br /><br />
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="col-sm-1">No.</th>
                                    <th class="col-sm-4">Bencana</th>
                                    <th class="col-sm-4">Keahlian yang Diperlukan</th>
                                    <th class="col-sm-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0; $j = 1;
                                $n = $bencana->num_rows();
                                while($i < $n)
                                {
                                    $row = $bencana->row($i);
                                    echo '<tr>';
                                        echo '<td class="text-center">'.$j.'</td>';
                                        echo '<td>'.$row->nama_bencana.'</td>';
                                        echo '<td><ul>';
                                            $id = $row->id_bencana;
                                            while($id == $row->id_bencana && $i < $n)
                                            {
                                                echo '<li>'.$row->nama_keahlian.'</li>';
                                                $i=$i+1;
                                                $row = $bencana->row($i);
                                            }
                                        echo '</ul></td>';
                                        echo '<td class="text-center">
                                            <a href="#" class="data-modal" data-toggle="modal" data-target="#dataModal" data-key="'.$id.'" title="Ubah Data">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;&nbsp;
                                            <a href="#" class="delete-modal" data-toggle="modal" data-target="#deleteModal" data-key="'.$id.'" title="Hapus Data">
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
                        <label>Nama jenis bencana</label>
                        <input class="form-control" id="dataName" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Keahlian yang diperlukan</label>
                        <span id="helpBlock" class="help-block">
                            Tahan tombol Ctrl ( <i class="fa fa-windows"></i> ) atau Command ( <i class="fa fa-apple"></i> ) untuk memilih lebih dari satu bencana.
                        </span>
                        <select class="form-control" name="keahlian[]" multiple required>
                        <?php
                            foreach($keahlian->result() as $row)
                            {
                                echo '<option id="opt'.$row->id_keahlian.'" value="'.$row->id_keahlian.'">'.$row->nama_keahlian.'</option>';
                            }
                        ?>
                        </select>
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
            $('#modalForm').attr("action", "<?=site_url('bencana/update')?>");

            $.ajax({
                method: "POST",
                url: "<?=base_url()?>bencana/get_by_id/"+key,
            })
            .done(function( msg ) {
                var obj = jQuery.parseJSON(msg);
                $('#dataName').val(obj[0].nama_bencana);
            });

            $.ajax({
                method: "POST",
                url: "<?=base_url()?>bencana/get_detil_by_id/"+key,
            })
            .done(function( msg ) {
                var obj = jQuery.parseJSON(msg);
                obj.forEach(function(entry) {
                    $('#opt' + entry.id_keahlian).attr("selected","true");
                });
            });
        }
        else
        {
            $('#modalHeader').text('Tambah Data');
            $('#modalSubmit').text('Tambah Data');
            $('#modalForm').attr("action", "<?=site_url('bencana/insert')?>");
        }
    })
</script>

<?php $this->view('footer'); ?>