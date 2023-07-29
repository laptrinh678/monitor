@extends('backend.master.index')
@section('content')
@include('errors.functions')
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<div class="page-content">		
	<div class="page-header">
		<h1>
			Thêm thông tin chi tiết sản phẩm
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin chi tiết sản phẩm
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Sản phẩm</label>
					<div class="col-sm-3">
						
						<select class="form-control" name="product_id" required="">
	                        <option  value="">Chọn sản phẩm</option>
	                      
	                        @foreach($product as $key=>$list)
	                        <option value="{{$list->id}}">{{$key}} - {{$list->pro_name}}</option>
	                         @endforeach
	                        
	                    </select>
					</div>
				</div>
				<div class="motram">
				<h3 align="center">Ảnh chi tiết sản phẩm</h3>	
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 1</label>
					<div class="col-sm-3">
						<div id="div_1">
							<div class="div_border">
								<div class="box-preview-img"></div>	
							</div>
					       <input type="file" required="" name="imgdetail[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
							<button type="reset" class="btn-reset btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 2</label>
					<div class="col-sm-3">
						<div id="div_2">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview2"></div>
						 </div>
							<input type="file" required=""   name="imgdetail[]" multiple="true" onchange="previewImg2(event);" id="img_file2" accept="image/*">
							<button type="reset" class="btn-reset2 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 3</label>
					<div class="col-sm-9">
						<div id="div_3">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview3"></div>
						 </div>
							<input type="file" required=""  name="imgdetail[]" multiple="true" onchange="previewImg3(event);" id="img_file3" accept="image/*">
							<button type="reset" class="btn-reset3 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>


				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 4</label>
					<div class="col-sm-9">
						<div id="div_4">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview4"></div>
						 </div>
							<input type="file"  required="" name="imgdetail[]" multiple="true" onchange="previewImg4(event);" id="img_file4" accept="image/*">
							<button type="reset" class="btn-reset4 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>


			<!--	<div class="nammuoi">
				<h3 align="center">Ảnh màu sắc sản phẩm</h3>

				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 1</label>
					<div class="col-sm-3">
						<div id="div_5">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview5"></div>
						 </div>
							<input type="file"   name="mausac[]" multiple="true" onchange="previewImg5(event);" id="img_file5" accept="image/*">
							<button type="reset" class="btn-reset5 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 2</label>
					<div class="col-sm-3">
						<div id="div_6">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview6"></div>
						 </div>
							<input type="file"   name="mausac[]" multiple="true" onchange="previewImg6(event);" id="img_file6" accept="image/*">
							<button type="reset" class="btn-reset6 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>



				
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 3</label>
					<div class="col-sm-9">
						<div id="div_7">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview7"></div>
						 </div>
							<input type="file"  name="mausac[]" multiple="true" onchange="previewImg7(event);" id="img_file7" accept="image/*">
							<button type="reset" class="btn-reset7 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>


				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 4</label>
					<div class="col-sm-9">
						<div id="div_8">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview8"></div>
						 </div>
							<input type="file"  name="mausac[]" multiple="true" onchange="previewImg8(event);" id="img_file8" accept="image/*">
							<button type="reset" class="btn-reset8 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>

					</div>-->
					
				</div>




				<div class="form-group">
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="sub_mit_l" value="Lưu và quay vể trang list">
						&nbsp; &nbsp; &nbsp;
							<input type="reset" class="reset_l" value="Làm mới">
					</div>
				</div>
			   </div>
				{{csrf_field()}}
			</form>
		</div><!-- /.col --
	</div><!-- /.row -->
</div><!-- /.page-content -->

@endsection('content')
@section('script')
<script>
	function previewImg(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file').files; 
    // Show khung chứa ảnh xem trước
    $('#div_1 .box-preview-img').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_1 .box-preview-img').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_1 .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_1 .btn-reset').on('click', function(){
	$('#div_1 .box-preview-img').html('');
	$('#div_1 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_1 .output').hide();
});
// xử lý ảnh dự án
function previewImg3(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file3').files; 
    // Show khung chứa ảnh xem trước
    $('#div_3 #box_preview3').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_3 #box_preview3').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_3 #box_preview3 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_3 .btn-reset3').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_3 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_3 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_3 .output').hide();
});
// xử lý ảnh bản vẽ
function previewImg2(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file2').files; 
    // Show khung chứa ảnh xem trước
    $('#div_2 #box_preview2').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_2 #box_preview2').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_2 #box_preview2 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_2 .btn-reset2').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_2 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_2 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_2 .output').hide();
});
// xử lý ảnh thứ 4
function previewImg4(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file4').files; 
    // Show khung chứa ảnh xem trước
    $('#div_4 #box_preview4').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_4 #box_preview4').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_4 #box_preview4 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_4 .btn-reset4').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_4 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_4 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_4 .output').hide();
});

// xử lý ảnh thứ 5
function previewImg5(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file5').files; 
    // Show khung chứa ảnh xem trước
    $('#div_5 #box_preview5').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_5 #box_preview5').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_5 #box_preview5 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_5 .btn-reset5').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_5 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_5 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_5 .output').hide();
});

// xử lý ảnh thứ 6
function previewImg6(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file6').files; 
    // Show khung chứa ảnh xem trước
    $('#div_6 #box_preview6').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_6 #box_preview6').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_6 #box_preview6 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_6 .btn-reset6').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_6 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_6 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_6 .output').hide();
});


// xử lý ảnh thứ 7
function previewImg7(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file7').files; 
    // Show khung chứa ảnh xem trước
    $('#div_7 #box_preview7').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_7 #box_preview7').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_7 #box_preview7 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_7 .btn-reset7').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_7 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_7 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_7 .output').hide();
});

// xử lý ảnh thứ 8
function previewImg8(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('img_file8').files; 
    // Show khung chứa ảnh xem trước
    $('#div_8 #box_preview8').show();
    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#div_8 #box_preview8').append('<img src="" id="' + i +'">');
        // Thêm src vào mỗi thẻ img theo id = i
       $('#div_8 #box_preview8 img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}
// Nút reset form upload
$('#div_8 .btn-reset8').on('click', function() {
	// Làm trống khung chứa hình ảnh xem trước
	$('#div_8 .box-preview-img').html('');
	// Hide khung chứa hình ảnh xem trước
	$('#div_8 .box-preview-img').hide();
	// Hide khung kết quả
	$('#div_8 .output').hide();
});


</script>
@endsection('script')

	