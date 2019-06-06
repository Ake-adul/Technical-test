<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>{{ ucfirst($folder) }}</h3>
		</div>
		<div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            	<form action="{{url('/')}}" method="post">
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
				<div class="x_content">
					<div class="x_content">
                    @foreach($rows as $row)
					<div class="col-lg-4">
						<a href="{{url('restaurant-detail/'.$row->restaurant_id)}}">
						<div class="item">
							<div class="shadow-effect">
								<img src="{{url($row->restaurant_images)}}" class="img-responsive">
								<div class="card__desc">
									<h4 style="margin: 15px 0 15px 0;">{{$row->restaurant_name}}</h4>
									<div class="page-custom "></div>
									<p>Address: {{$row->restaurant_address}}
										<br>Open: {{date('H:i',strtotime($row->restaurant_open))}} - {{date('H:i',strtotime($row->restaurant_close))}} hrs.
										<br>Tel: {{$row->restaurant_tel}}
										<br>
										<span class="star-view ">
											@for($i=0; $i<$row->restaurant_star; $i++)
												<i class="fas fa-star star-yes"></i>
											@endfor
										</span>
									</p>
								</div>
							</div>							
								<div class="testimonial-name">Read more </div>
							</a>
						</div>
						<br>
					</div>
				@endforeach						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>