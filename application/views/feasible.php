<div class="col-lg-8 col-lg-offset-2" id="page-content">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Hasil Kelayakan</h1>
        </div>
		<div class="col-lg-4 text-right">
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
                    <div class="dataTable_wrapper" style="overflow:auto">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <?php
										echo "<th></th>";
										if($city != null)
										{
											foreach($city as $row)
											{
												echo '<th class="text-center '.$row->id.'">';
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
											echo "<th class='text-center'>";
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
														echo '<td class="text-center '.$row->id.' '.$col->id.'" style="background-color:#E62F17; color:white">';
													}
													else
													{
														echo '<td class="text-center '.$row->id.' '.$col->id.'" style="background-color:#19FF8E">';
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