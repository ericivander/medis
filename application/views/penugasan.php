<script type="text/javascript">
	var vDoctor = {};
	var vCity = {};
</script>
<div class="col-lg-8 col-lg-offset-2" id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Penugasan</h1>
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
				<div class="panel-body" style="overflow:auto">
				<?php
				if($doctor != null)
				{
					foreach($doctor as $row)
					{
				?>
					<script type="text/javascript">
						vDoctor["<?php echo $row->nama;?>"] = true;
					</script>
					<div class="checkbox">
						<label>
							<input class="dokter_cb" id="<?php echo $row->nama;?>" type="checkbox" onclick="toogle(1, '<?php echo $row->nama;?>');" checked> <?php echo $row->nama;?>
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
				<div class="panel-body" style="overflow:auto">
				<?php
				if($city != null)
				{
					foreach($city as $row)
					{
					
				?>
					<script type="text/javascript">
						vCity["<?php echo $row->nama;?>"] = true;
					</script>
					<div class="checkbox">
						<label>
							<input class="kabkota_cb" id="<?php echo $row->nama;?>" type="checkbox" onclick="toogle(0, '<?php echo $row->nama;?>');" checked> <?php echo $row->nama;?>
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
		<div class="col-lg-12 text-right">
			<form id="sampleForm" name="sampleForm" method="post" action="<?php echo site_url("solution/main") ?>">
				<input type="hidden" name="visDoctor" id="visDoctor" value="">
				<input type="hidden" name="visCity" id="visCity" value="">
				<a href="#" class="btn btn-success" onClick="setValue()">
					<i class="fa fa-forward fa-fw"></i>
					Go
				</a>
			</form>
		</div>
        <!-- /.col-lg-12 -->
    </div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12 text-right">
			<br/>
		</div>
        <!-- /.col-lg-12 -->
    </div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
	console.log(vDoctor);
	console.log(vCity);
	function toogle(flag, IDname)
	{
		//alert(flag + IDname);
		if (document.getElementById(IDname).checked) 
		{
			if(flag)
			{
				vDoctor[IDname] = true;
			}
			else
			{
				vCity[IDname] = true;
			}
		}
		else
		{
			if(flag)
			{
				vDoctor[IDname] = false;
			}
			else
			{
				vCity[IDname] = false;
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
				toogle(1, checkboxes[i].id);
			}
		}
		else
		{
			var checkboxes = document.getElementsByClassName('kabkota_cb'), i;
			for (var i = 0; i < checkboxes.length; i ++)
			{
				checkboxes[i].checked = true;
				toogle(0, checkboxes[i].id);
			}
		}
		console.log(vDoctor);
		console.log(vCity);
	}
	
	function uncheck(flag)
	{
		if(flag)
		{
			var checkboxes = document.getElementsByClassName('dokter_cb'), i;
			for (var i = 0; i < checkboxes.length; i ++)
			{
				checkboxes[i].checked = false;
				toogle(1, checkboxes[i].id);
			}
		}
		else
		{
			var checkboxes = document.getElementsByClassName('kabkota_cb'), i;
			for (var i = 0; i < checkboxes.length; i ++)
			{
				checkboxes[i].checked = false;
				toogle(0, checkboxes[i].id);
			}
		}
		console.log(vDoctor);
		console.log(vCity);
	}
	
	function setValue()
	{
		document.sampleForm.visDoctor.value = JSON.stringify(vDoctor);
		document.sampleForm.visCity.value = JSON.stringify(vCity);
		document.forms["sampleForm"].submit();
	}
</script>