<link rel="stylesheet" href="<?=url('/backend/vendors/bootstrap/dist/css/bootstrap.min.css')?>">
<script src="<?=url('/backend/vendors/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=url('/backend/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
 
 <div class="modal fade" id="Modal_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="panel panel-danger" style="margin-bottom:0px;">
    <div class="panel-heading">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     เกิดข้อผิดพลาด
    </div>
    <div class="panel-body" align="center">
  	บันทึกข้อมูลไม่สำเร็จ
   	</p>
    </div>
	</div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {

		$('#Modal_error').modal('show');

		$('#Modal_error').on('hidden.bs.modal', function (e) {
				window.location='<?=url("$page")?>';

			});
		setInterval(function(){
			$('#Modal_error').modal('hide');

			$('#Modal_error').on('hidden.bs.modal', function (e) {
				window.location='<?=url("$page")?>';
			});

			},2000
		);				

	});
</script>
