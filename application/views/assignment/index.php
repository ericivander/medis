<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="page-header">Komputasi Penugasan Dokter</h1>
        </div>
		<div class="col-lg-2">
			<br/>
			<br/>
			<a href="<?php echo site_url("compute/main") ?>" class="btn btn-success" role="button">
				<i class="fa fa-refresh fa-fw"></i>
				Refresh
			</a>
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
                                    <?php
										echo "<th></th>";
										if($city != null)
										{
											foreach($city as $row)
											{
												echo "<th>";
												echo $row->id;
												echo "</th>";
											}
										}
									?>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									//echo $assignment;
									$crow = 1;
									if($doctor != null)
									{
										foreach($doctor as $row)
										{
											echo "<tr>";
											echo "<th>";
											echo $row->id;
											echo "</th>";
											$ccol = 1;
											if($city != null)
											{
												foreach($city as $col)
												{
													$result = $assignment[$crow][$ccol++];
													if($result == 999)
													{
														echo '<td style="background-color:#CC0000; color:white">';
													}
													else
													{
														echo '<td style="background-color:#33CC33">';
													}
													echo $result;
													echo "</td>";
												}
											}
											$crow++;
											echo "</tr>";
										}
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