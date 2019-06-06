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
                        <div class="container">
                            <div class="row">
                                <center><h1>{{$row->restaurant_name}}</h1></center>
                                <div>
                                    <img srcset="{{url($row->restaurant_images)}}" src="{{url($row->restaurant_images)}}" />
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <h4 class="pading-t">{{$row->restaurant_name}}</h4>
                                    <span class="star-view ">
                                        @for($i=0; $i<$row->restaurant_star; $i++)
                                            <i class="fas fa-star star-yes"></i>
                                        @endfor					
                                    </span>

                                    <div class="clearfix"></div>

                                    <div class="col-md-7 ">
                                        <div class="row">
                                            <p>
                                                <?=$row->restaurant_detail?>
                                            </p>

                                            <h4>Contact</h4>
                                            <ul class="v">
                                                <li>Address: {{$row->restaurant_address}}</li>
                                                <li>Open: {{date('H:i',strtotime($row->restaurant_open))}} - {{date('H:i',strtotime($row->restaurant_close))}} hrs.</li>
                                                <li>{{$row->restaurant_tel}}</li>
                                            </ul>
                                        </div>
                                    </div>                                   

                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <?=$row->restaurant_map?>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12">
                                <center>
                                    <a class="btn btn-info" style="width:200px" href="{{ url('/') }}">Back</a>
                                </center>
                                </div>
                            </div>
                        </div>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>