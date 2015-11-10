<div class="col-lg-8 col-lg-offset-2" id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hasil Penugasan</h1>
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
							<?php $cityCount = 0;?>
                            <thead>
                                <tr>
									<th></th>
                                    <?php
										if($vCity != null)
										{
											foreach($vCity as $key => $value)
											{
												$cityCount++;
												echo "<th>";
												echo $key;
												echo "</th>";
											}
										}
									?>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									if($vDoctor != null)
									{
										foreach($vDoctor as $key => $value)
										{
											echo "<tr>";
											echo "<td>";
											echo $key;
											echo "</td>";
											if($vCity != null)
											{
												foreach($vCity as $key2 => $value2)
												{
													$flag = false;
													foreach($doctorCity[$idDokters[$key]] as $iter)
													{
														if($iter == $idKotas[$key2]) $flag = true;
													}
													if($flag)
														echo '<td style="background-color:#19FF8E">';
													else
														echo '<td style="background-color:#E62F17; color:white">';
													echo $dataMatrix[$idDokters[$key]][$idKotas[$key2]];
													echo "</td>";
												}
											}
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
	<div class="row">
		<div class="col-lg-12 text-right">
			<a href="<?php echo site_url("solution") ?>" class="btn btn-success" onClick="setValue()">
				<i class="fa fa-backward fa-fw"></i>
				Back
			</a>
		</div>
        <!-- /.col-lg-12 -->
    </div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->