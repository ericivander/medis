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
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Dokter</div>
				<div class="panel-body">
					<a class="btn btn-default" role="button" onclick="check(true);">
						<i class="fa fa-check fa-fw"></i>
						Check All
					</a>
					<a class="btn btn-default" role="button" onclick="uncheck(true);">
						<i class="fa fa-close fa-fw"></i>
						Uncheck All
					</a>
				</div>
				<div class="panel-body" style="height:100px; overflow:auto">
				<?php
				if($doctor != null)
				{
					foreach($doctor as $row)
					{
				?>
					<div class="checkbox">
						<label>
							<input class="dokter_cb" id="<?php echo $row->id;?>" type="checkbox" onclick="toogle('<?php echo $row->id;?>');" checked> <?php echo $row->id;?>
						</label>
					</div>
				<?php
					}
				}
				?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
		<div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Kabupaten/Kota</div>
				<div class="panel-body">
					<a class="btn btn-default" role="button" onclick="check(false);">
						<i class="fa fa-check fa-fw"></i>
						Check All
					</a>
					<a class="btn btn-default" role="button" onclick="uncheck(false);">
						<i class="fa fa-close fa-fw"></i>
						Uncheck All
					</a>
				</div>
				<div class="panel-body" style="height:100px; overflow:auto">
				<?php
				if($city != null)
				{
					foreach($city as $row)
					{
				?>
					<div class="checkbox">
						<label>
							<input class="kabkota_cb" id="<?php echo $row->id;?>" type="checkbox" onclick="toogle('<?php echo $row->id;?>');" checked> <?php echo $row->id;?>
						</label>
					</div>
				<?php
					}
				}
				?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
		<!-- /.col-lg-6 -->
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
												echo '<th class="'.$row->id.'">';
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
											echo '<tr class="'.$row->id.'">';
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
														echo '<td class="'.$row->id.' '.$col->id.'" style="background-color:#CC0000; color:white">';
													}
													else
													{
														echo '<td class="'.$row->id.' '.$col->id.'" style="background-color:#33CC33">';
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
<script type="text/javascript">
	function toogle(IDname)
	{
		//alert(IDname);
		if (document.getElementById(IDname).checked) 
		{
			//alert("set " + IDname + " visible");
			var cells = document.getElementsByClassName(IDname), i;
			$("." + IDname).show();
			for (var i = 0; i < cells.length; i ++)
			{
				//cells[i].style.visibility = 'visible';
			}
		}
		else
		{
			//alert("set " + IDname + " hidden");
			var cells = document.getElementsByClassName(IDname), i;
			$("." + IDname).hide();
			for (var i = 0; i < cells.length; i ++)
			{
				//cells[i].style.visibility = 'hidden';
			}
		}
	}
	
	function check(flag)
	{
		if(flag)
		{
			var checkboxes = document.getElementsByClassName('dokter_cb'), i;
			for (var i = 0; i < checkboxes.length; i ++)
			{
				checkboxes[i].checked = true;
				toogle(checkboxes[i].id);
			}
		}
		else
		{
			var checkboxes = document.getElementsByClassName('kabkota_cb'), i;
			for (var i = 0; i < checkboxes.length; i ++)
			{
				checkboxes[i].checked = true;
				toogle(checkboxes[i].id);
			}
		}
	}
	
	function uncheck(flag)
	{
		if(flag)
		{
			var checkboxes = document.getElementsByClassName('dokter_cb'), i;
			for (var i = 0; i < checkboxes.length; i ++)
			{
				checkboxes[i].checked = false;
				toogle(checkboxes[i].id);
			}
		}
		else
		{
			var checkboxes = document.getElementsByClassName('kabkota_cb'), i;
			for (var i = 0; i < checkboxes.length; i ++)
			{
				checkboxes[i].checked = false;
				toogle(checkboxes[i].id);
			}
		}
	}
</script>