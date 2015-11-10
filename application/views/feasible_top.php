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