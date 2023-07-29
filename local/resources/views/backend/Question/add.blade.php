@extends('backend.master.index')
@section('content')
<div class="page-content">		
	<div class="page-header">
		<h1>
			Thêm câu hỏi
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin câu hỏi
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal " role="form" method="post" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1"> Tên câu hỏi 
						
					</label>
					<div class="col-sm-9">
						<input type="text" name="nameQuestion" id=""  placeholder="Nhập tên câu hỏi" class="col-xs-12 col-sm-6 inputQuestion">
						 <div class="alertQuestion">
						 	<span style="color:red">{{$errors->first('nameQuestion')}}</span></div>
					
					</div>

				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1"> URL img câu hỏi 
						
					</label>
					<div class="col-sm-9">
						<input type="text" name="imgQuestion" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion">
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('imgQuestion')}}</span></div>
					
					</div>

				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1"> Âm thanh câu hỏi 
						
					</label>
					<div class="col-sm-9">
						<input type="text" name="soundQuestion" id=""  placeholder="Nhập URL soundQuestion câu hỏi" class="col-xs-12 col-sm-6 inputQuestion">
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('soundQuestion')}}</span></div>
					
					</div>

				</div>
				

				<!-- <div class="form-group">
				
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh câu hỏi</label>
					<div class="col-sm-3">
						<div id="div_1">
							<div class="div_border">
								<div class="box-preview-img"></div>	
							</div>
											       <input type="file" name="imgQuestion" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
							
						</div>
					</div>
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Âm thanh câu hỏi</label>
					<div class="col-sm-3">
						<div id="div_1">
							<div class="div_border">
								<div class="box-preview-img"></div>	
							</div>
					       <input type="file" name="soundQuestion" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
							
						</div>
					</div>
				
				</div>
				 -->

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1">Đáp án A 
					
					</label>
					<div class="col-sm-9">
						<input type="text"   id="form-field-1" name="replyA" placeholder="Nhập tên đáp án A" class="col-xs-10 col-sm-5 inputQuestion" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace " value="A">
							<span class="lbl">Đáp án đúng</span>
							
						</label>
							<div class="alertQuestion"><span style="color:red">{{$errors->first('replyA')}}</span></div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh đáp án A</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyA" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion">
						<!-- <div id="div_2">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview2"></div>
						 </div>
							<input type="file"    name="imgreplyA" multiple="true" onchange="previewImg2(event);" id="img_file2" accept="image/*">
							
						</div> -->
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1">Đáp án B
						
					 </label>
					<div class="col-sm-9">
						<input type="text"  id="form-field-1" name="replyB" placeholder="Nhập tên đáp án B" class="col-xs-10 col-sm-5 inputQuestion" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace "  value="B">
							<span class="lbl">Đáp án đúng</span>
							
						</label>
						<div class="alertQuestion"><span style="color:red">{{$errors->first('replyB')}}</span></div>
					</div>
					
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh đáp án B</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyB" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion">
						<!-- <div id="div_3">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview3"></div>
						 </div>
							<input type="file"   name="imgreplyB" multiple="true" onchange="previewImg3(event);" id="img_file3" accept="image/*">
						
						</div> -->
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1">Đáp án C 
					
					</label>
					<div class="col-sm-9">
						<input type="text"  id="form-field-1" name="replyC" placeholder="Nhập tên đáp án C" class="col-xs-10 col-sm-5 inputQuestion" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace " value="C">
							<span class="lbl">Đáp án đúng</span>
							 
						</label>
						<div class="alertQuestion"><span style="color:red">{{$errors->first('replyC')}}</span></div>
					</div>
					
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh đáp án C</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyC" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion">
						<!-- <div id="div_5">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview5"></div>
						 </div>
							<input type="file"   name="imgreplyC" multiple="true" onchange="previewImg5(event);" id="img_file5" accept="image/*">
							
						</div> -->
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1">Đáp án D
					
					 </label>
					<div class="col-sm-9">
						<input type="text"   id="form-field-1" name="replyD" placeholder="Nhập tên đáp án D" class="col-xs-10 col-sm-5 inputQuestion" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace " value="D">
							<span class="lbl">Đáp án đúng</span>
							
						</label>
						<div class="alertQuestion"><span style="color:red">{{$errors->first('replyD')}}</span></div>
					</div>
					
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh đáp án D</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyD" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion">
						<!-- <div id="div_4">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview4"></div>
						 </div>
							<input type="file"   name="imgreplyD" multiple="true" onchange="previewImg4(event);" id="img_file4" accept="image/*">
							
						</div> -->
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Trạng thái</label>
					<div class="col-sm-3">
						<select name="status" id="">
							<option value="ON">Hiến thị</option>
							<option value="OFF">Ẩn</option>
						</select>
					</div>

					
				</div>
				<div class="form-group">
					<div class="col-sm-3"></div>
					<div class="col-sm-9">
						<div class="alertQuestion"><span style="color:red">{{$errors->first('chooseReply')}}</span></div>
					</div>
					
				</div>

				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="sub_mit_l" value="Lưu và quay vể trang list">
						&nbsp; &nbsp; &nbsp;
							<input type="reset" class="reset_l" value="Làm mới">
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</div><!-- /.col -->
	</div>
</div>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-2.1.4.min.js"></script>

<script>
$(document).ready(function()
{
	$('.chooseReply').click(function()
	{
		$('.inputQuestion').css('background','white');
		$(this).parent().parent().find('input').css('background','#f5f0ae');
	});

});
</script>
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
@endsection('content')

