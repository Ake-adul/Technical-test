<style>/* File Upload */
.fake-shadow {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}
.fileUpload {
  position: relative;
  overflow: hidden;
}
.fileUpload #logo-id {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 33px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.img-preview {
  max-width: 100%;
}
.times{
  position:absolute; 
  float:right;
  margin:2px 4px;
  float:right;
}
._padding{
  margin-bottom:20px;
}

</style>
<div class="right_col" role="main">
  <div class="page-title">
    <div class="title_left">
      <h3>{{ ucfirst($folder) }}</h3>
    </div>
    
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><a href="{{ url('admin/restaurant') }}">{{ ucfirst($folder) }}</a></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" method="post" action="{{ url('admin/restaurant/update') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- <span class="section">Personal Info</span> -->
            <input type="hidden" name="id" value="{{ $row->restaurant_id }}">

            <div class="item form-group">

              <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Image Cover <span class="required">*</span>
              </label>
              <div class="col-lg-4 col-xs-12">
                <div class="main-img-preview">
                  @if($row->restaurant_images != "")
                  <img class="thumbnail img-preview" src="{{ url($row->restaurant_images) }}" title="Preview Cover">
                  @else
                  <img class="thumbnail img-preview" src="{{ url('../upload/uploadcover.png') }}" title="Preview Cover">
                  @endif
                </div>
                <div class="input-group">
                  <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                  <div class="input-group-btn">
                    <div class="fileUpload btn btn-danger fake-shadow">
                      <span><i class="glyphicon glyphicon-upload"></i> Upload Cover</span>
                      <input id="logo-id" name="restaurant_images" type="file" class="attachment_upload">
                    </div>
                  </div>
                </div>
                <strong><p class="text-center help-block red">* Image size 1000 x 667 Pixel</p></strong>
              </div>                

            </div>
            <div class="" role="tabpanel" data-example-id="togglable-tabs">

              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12">Restaurant Name <span class="required">*</span>
                    </label>
                    <div class="col-md-11 col-sm-6 col-xs-12">
                      <input class="form-control" type="text" name="restaurant_name" required="required" 
                      value="{{ $row->restaurant_name }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12">Restaurant Star <span class="required">*</span>
                    </label>
                    <div class="col-md-11 col-sm-6 col-xs-12">
                      <br>
                      <label>
                        <div class="iradio_flat-green">
                          <input type="radio" id="gen" name="restaurant_star" value="1" class="flat" @if($row->restaurant_star == 1) checked @endif>                  
                        </div>&emsp;<img src="{{url('../upload/star/1.png')}}">
                      </label><br>
                      <label>
                        <div class="iradio_flat-green">
                          <input type="radio" id="gen" name="restaurant_star" value="2" class="flat" @if($row->restaurant_star == 2) checked @endif>                
                        </div>&emsp;<img src="{{url('../upload/star/2.png')}}">
                      </label><br>
                      <label>
                        <div class="iradio_flat-green">
                          <input type="radio" id="gen" name="restaurant_star" value="3" class="flat" @if($row->restaurant_star == 3) checked @endif>                  
                        </div>&emsp;<img src="{{url('../upload/star/3.png')}}">
                      </label><br>
                      <label>
                        <div class="iradio_flat-green">
                          <input type="radio" id="gen" name="restaurant_star" value="4" class="flat" @if($row->restaurant_star == 4) checked @endif>                
                        </div>&emsp;<img src="{{url('../upload/star/4.png')}}">
                      </label><br>
                      <label>
                        <div class="iradio_flat-green">
                          <input type="radio" id="gen" name="restaurant_star" value="5" class="flat" @if($row->restaurant_star == 5) checked @endif>                
                        </div>&emsp;<img src="{{url('../upload/star/5.png')}}">
                      </label>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12">Detail <span class="required">*</span>
                    </label>
                    <div class="col-md-11 col-sm-6 col-xs-12">
                    <textarea id="textarea" name="restaurant_detail" class="form-control tiny">{{ $row->restaurant_detail }}</textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12" >Open <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class='input-group date' id='datetimepicker3'>
                          <input type='text' class="form-control" name="restaurant_open" autocomplete="none" value="{{$row->restaurant_open}}">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                      <!-- <input class="form-control" name="restaurant_open" required="required" type="time" value="{{$row->restaurant_open}}"> -->
                    </div>
                    <label class="control-label col-md-1 col-xs-12" for="name">Close<span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class='input-group date' id='datetimepicker3_1'>
                          <input type='text' class="form-control" name="restaurant_close" autocomplete="none" value="{{$row->restaurant_close}}">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                      <!-- <input class="form-control" name="restaurant_close" required="required" type="time" value="{{$row->restaurant_close}}"> -->
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12" for="name">Tel <span class="required">*</span>
                    </label>
                    <div class="col-md-11 col-sm-6 col-xs-12">
                      <input class="form-control" name="restaurant_tel" required="required" type="text" value="{{$row->restaurant_tel}}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12" for="name">Address <span class="required">*</span>
                    </label>
                    <div class="col-md-11 col-sm-6 col-xs-12">
                      <input class="form-control" name="restaurant_address" required="required" type="text" value="{{$row->restaurant_address}}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12">Google Map</label>
                    <div class="col-md-11 col-sm-6 col-xs-12" id="map-canvas">
                      <textarea class="form-control" rows="5" name="restaurant_map" id="contact_map">{{$row->restaurant_map}}</textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-1 col-xs-12" for="contact_email"></label>
                    <div class="col-md-11 col-sm-6 col-xs-12" id="map">
                      
                    </div>
                  </div>
                </div>

              </div>
              <div class="item form-group">
                <label class="control-label col-md-1 col-xs-12" for="email">Gallery <span class="required">*</span></label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="file" id="Gallery" class="form-control" name="gallery_image[]" onchange="readGallery(this,'preview')">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-1 col-xs-12"></label>
                <div class="col-md-11 col-sm-6 col-xs-12">
                  <div id="gallery_preview"></div>
                  <br><div class="clearfix"></div>
                </div>
              </div>
              @if(!empty($gallery))
              <div id="gallery_project"> 
                <div class="item form-group">
                  <label class="control-label col-md-1 col-xs-12">Gallery</label>
                  <div class="col-md-11 col-sm-6 col-xs-12">
                    <div class="row">
                      @foreach($gallery as $img)
                      <div class="col-lg-3 col-md-6 col-xs-12" id="gallery-{{ $img->gallery_id }}">
                        <div class="thumbnail">
                          <img class="img-responsive img_gallery" src="{{ url($img->gallery_image) }}">
                          <p class="caption"><a class="btn btn-danger delete_galls" href="javascript:void(0)" data-id="{{ $img->gallery_id }}" >Delete</a></p>
                        </div>
                      </div>
                      @endforeach
                      <br><div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-12">
                  <center>
                    <a class="btn btn-default" href="{{ url('/admin') }}">Cancel</a>
                    <button id="send" type="submit" class="btn btn-success">save</button>
                  </center>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<script src="backend/vendors/moment/moment.js"></script>
<script src="backend/vendors/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
          format: 'HH:mm'
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3_1').datetimepicker({
          format: 'HH:mm'
        });
    });
</script>
<script>
  tinymce.init({
    selector: 'textarea.tiny',
    menubar : false,
    force_br_newlines : true,
    force_p_newlines : false,
    forced_root_block : '',
    height: 250, 
  //width : 1100,
  plugins: [
  "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
  "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
  "save table contextmenu directionality emoticons template paste textcolor colorpicker layer textpattern moxiemanager"
  ],    
  toolbar: 'insertfile undo redo | table | styleselect fontselect fontsizeselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print nonbreaking hr emoticons code',

});
  // setInterval(function(){ $('#mceu_86').hide(); }, 100)
  // setInterval(function(){ $('#mceu_87').hide(); }, 100)
  // var brand = document.getElementById('logo-id');
  // brand.className = 'attachment_upload';
  // brand.onchange = function() {
  //   document.getElementById('fakeUploadLogo').value = this.value.substring(12);
  // };

  $("#logo-id").change(function() {
    readCover(this);
  });

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readCover(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.img-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    


    $('#Gallery').filer({ limit: '5' });

    function readGallery(input,id)
    {
      if (input.files && input.files[0])
      {
        var reader = new FileReader();
        reader.onload = function (e)
        {
          $("#"+id).css("display", "block").prop("src", e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    function readGallery() 
    {
      var total_file=document.getElementById("Gallery").files.length;
      for(var i=0;i<total_file;i++)
      {
        $('#gallery_preview').append("<div class='col-md-3'><img class='img-responsive _padding' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
      }
    }
    $('.delete_galls').click(function(){
      const id = $(this).data('id');

      if(confirm('ยืนยันการลบ Gallery') == true){

        $.ajax({
          url:'{{ url('admin/restaurant/delete_galls') }}',
          type:'post',
          data:{id:id,'_token':'{{ csrf_token() }}'},
          dataType:'json',
          success:function(res){
            if(res == true){
              $('#gallery-'+id).remove();
            }
          }
        })
      }

    })

    
  </script>