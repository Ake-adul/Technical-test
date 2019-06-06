<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>{{ ucfirst($folder) }}</h3>
		</div>
		<div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            	<form action="{{url('/admin')}}" method="post">
	                <div class="input-group">
	                    <input type="text" name="keyword" class="form-control" placeholder="Search for..." value="<?php if(isset($_POST['keyword'])){ echo $_POST['keyword']; } ?>">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <span class="input-group-btn">
	                        <button class="btn btn-default" type="submit">Go!</button>
	                    </span>
	                </div>
                </form>
            </div>
      </div>
	</div>
	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
				<ul class="nav panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				</ul>
				<!-- <h2>About Us<small>Data</small></h2> -->
				<div class="pull-right">
					<a href="{{ url('/admin/restaurant/add') }}" class="btn btn-primary btn-sm" >Add</a>
					<button class="btn btn-danger btn-sm" id="delSelect" disabled="">Delete</button>
				</div>
				<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="x_content">
						<table class="table table-hover" id="sorted_table">
						<thead>
							<tr>
							<th width="5%">#</th>
							<th width="3%">
								<input type="checkbox" name="CheckAll" id="selectAll">
								<label for="selectAll"></label>
							</th>
							<th width="20%">Title</th>
							<!-- <th width="25%">Description</th> -->
							<th width="25%">Address</th>
							<th width="25%">Update</th>
							<th width="15%">Status</th>
							<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; $x=0; ?>
							
				
							@foreach($rows as $row)
							<tr>
							<th scope="row"><?=$i++; ?> @php($x++)</th>
							<td class="handle">
								<input class="ChkBox" id="ChkBox-<?=$i?>" type="checkbox" name="checkboxlist" value="{{ $row->restaurant_id }}?>">
                                <label for="ChkBox-<?=$i?>"></label>
							</td>
							<td>{{ $row->restaurant_name }}</td>
							<td>{{ $row->restaurant_address }}</td>
							<td>{{ $row->restaurant_create }}</td>
							<td>
								<div class="custom_switch switch-container">
									<label class="new-switch switch-green">
										<input type="checkbox" class="switch-input status" id="{{ $row->restaurant_id }}" @if($row->restaurant_status == 1) checked @endif >
										<span class="switch-label" data-on="on" data-off="off"></span>
										<span class="switch-handle"></span>
									</label>
								</div>
								
							</td>
							<td class="handle">
								<a class="btn btn-default" href="{{ url('admin/restaurant/edit/'.$row->restaurant_id) }}"><i class="fa fa-pencil"></i></a>
								<a class="btn btn-default delete" id="{{ $row->restaurant_id }}"><i class="fa fa-trash"></i></a>
							</td>
							<input type="hidden" id="restaurant_id{{$x}}" value="{{ $row->restaurant_id }}">
							</tr>
							@endforeach
						</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title" id="exampleModalLongTitle">Delete</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Confirm Delete
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_changes" class="btn btn-danger"><i class="fa fa-trash"></i> Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalDeleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title" id="exampleModalLongTitle">Delete</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center"><p>Confirm Delete all selected.</p></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_deleteAll" class="btn btn-danger"><i class="fa fa-trash"></i> Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>

	$('#delSelect').click(function(){
		$('#modalDeleteAll').modal('show');
	})
	$('#btn_deleteAll').click(function(){
		//if($("#checkkBoxId").attr("checked")==true)
		var checkValues = $('input[name=checkboxlist]:checked').map(function()
		{
			return $(this).val();
		}).get();

		$.ajax({
			url: '{{ url('admin/restaurant/deleteAll') }}',
			type: 'post',
			data: { id:checkValues, _token:'{{ csrf_token() }}' },
			success:function(data){
				//alert(data);
				location.reload();
				$('#btn_deleteAll').modal('hide')
			}
		});
		
	});
	$("#selectAll").click(function(){
		var checkAll = $(this).prop("checked");
		//alert(checkAll);
		$("input.ChkBox").each(function(){
			$(this).prop({"checked":checkAll});
		});
		if(checkAll == true){
			$('#delSelect').prop('disabled',false);
		}
		else{
			$('#delSelect').prop('disabled',true);
		}
	});
	$('.ChkBox').click(function(){
		const checked = [];
		const $this = $(this).prop("checked");
		$('.ChkBox').each(function(){
			if($(this).is(':checked')){ checked.push($this) }
		})
		/console.log(checked);
		if(checked.length>0){ $('#delSelect').prop('disabled',false); }else{ $('#delSelect').prop('disabled',true); }
	})
	$(".status").click(function(){
		var ID = $(this).attr("id");
		//alert(ID);
		$.ajax({
			url: '{{ url('admin/restaurant/status') }}',
			type: 'post',
			data: { id:ID, _token:'{{ csrf_token() }}' },
			// dataType:'json',
			success:function(data){
				console.log(data);
				//location.reload();
				
			}
		})

	})
	$(".delete").click(function(){
		var ID = $(this).attr("id");
		$('#ModalDelete').modal('show');
		$('#save_changes').click(function(){
			$.ajax({
				url: '{{ url('admin/restaurant/delete_restaurant') }}',
				type: 'post',
				data: { id:ID, _token:'{{ csrf_token() }}' },
				// dataType:'json',
				success:function(data)
				{
					console.log(data);
					$('#ModalDelete').modal('hide');					
					location.reload();

					// if(data==true){
					// 	$('#ModalDelete').modal('hide');					
					// 	location.reload();
				}
			})
		})
	})

</script>