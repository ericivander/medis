        <div class="modal fade" id="pageModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4></h4>
                    </div>
                    <div class="modal-footer">
                        <form role="form" action="<?php echo site_url('main/process_from_modal') ?>" method="post">
                            <input type="hidden" id="key" name="key"/>
                            <input type="hidden" id="task" name="task"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    $('.modal-anchor').on('click', function () {
        var anchor = $(this)
        var key = anchor.data('key')
        var task = anchor.data('task')

        $(document).find('.modal-body h4').text('Apakah anda yakin ingin menghapus data tersebut ?')

        $('input[name=key]').val(key)
        $('input[name=task]').val(task)
    })
    </script>

</body>

</html>
