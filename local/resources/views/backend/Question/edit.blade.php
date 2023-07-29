@extends('backend.master.index')
@section('content')
<div class="page-content">		
	<div class="page-header">
		<h1>
			Sửa câu hỏi
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin câu hỏi
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên câu hỏi </label>
					<div class="col-sm-9">
						<input type="text" name="nameQuestion" id=""  placeholder="Nhập tên câu hỏi" value="{{$Question->nameQuestion}}" class="col-xs-12 col-sm-6 inputQuestion">
						
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('nameQuestion')}}</span></div>
						
					</div>
				</div>
				<div class="form-group">

				<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1"> URL img câu hỏi 
						
					</label>
					<div class="col-sm-9">
						<input type="text" name="imgQuestion" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion" value="{{$Question->imgQuestion}}">
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('imgQuestion')}}</span></div>
					
					</div>
				
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right QuestionLabel" for="form-field-1"> Âm thanh câu hỏi 
						
					</label>
					<div class="col-sm-9">
						<input type="text" name="soundQuestion" id=""  placeholder="Nhập URL soundQuestion câu hỏi" value="{{$Question->soundQuestion}}" class="col-xs-12 col-sm-6 inputQuestion">
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('soundQuestion')}}</span></div>
					
					</div>

				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Đáp án A </label>
					<div class="col-sm-9">
						<input type="text"  value="{{$Question->replyA}}"  id="form-field-1" name="replyA" placeholder="Nhập tên đáp án A" class="col-xs-10 col-sm-5" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace " value="A">
							<span class="lbl">Đáp án đúng</span>
						</label>
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('replyA')}}</span></div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> URL Ảnh đáp án A</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyA" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion" value="{{$Question->imgreplyA}}">
						
					</div>
				</div>



				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Đáp án B </label>
					<div class="col-sm-9">
						<input type="text" value="{{$Question->replyB}}"  id="form-field-1" name="replyB" placeholder="Nhập tên đáp án B" class="col-xs-10 col-sm-5" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace "  value="B">
							<span class="lbl">Đáp án đúng</span>
						</label>
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('replyB')}}</span></div>
					</div>
					
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">URL Ảnh đáp án B</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyB" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion" value="{{$Question->imgreplyB}}">
						
					</div>
				</div>





				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Đáp án C </label>
					<div class="col-sm-9">
						<input type="text" value="{{$Question->replyC}}"  id="form-field-1" name="replyC" placeholder="Nhập tên đáp án C" class="col-xs-10 col-sm-5" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace " value="C">
							<span class="lbl">Đáp án đúng</span>
						</label>
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('replyC')}}</span></div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">URL Ảnh đáp án C</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyC" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion" value="{{$Question->imgreplyC}}">
						
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Đáp án D </label>
					<div class="col-sm-9">
						<input type="text" value="{{$Question->replyD}}"  id="form-field-1" name="replyD" placeholder="Nhập tên đáp án D" class="col-xs-10 col-sm-5" />
						<label class="col-xs-2 control-label no-padding-right chooseReply">
							<input name="chooseReply" type="radio" class="ace " value="D">
							<span class="lbl">Đáp án đúng</span>
						</label>
						 <div class="alertQuestion"><span style="color:red">{{$errors->first('replyD')}}</span></div>
					</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">URL Ảnh đáp án D</label>
					<div class="col-sm-9">
						<input type="text" name="imgreplyD" id=""  placeholder="Nhập URL img câu hỏi" class="col-xs-12 col-sm-6 inputQuestion" value="{{$Question->imgreplyC}}">
						
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
	 function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

     function Preview2Image() {
        var oFReader2 = new FileReader();
        oFReader2.readAsDataURL(document.getElementById("uploadImage2").files[0]);

        oFReader2.onload = function (oFREvent2) {
            document.getElementById("uploadPreview2").src = oFREvent2.target.result;
        };
    };

     function Preview3Image() {
        var oFReader3 = new FileReader();
        oFReader3.readAsDataURL(document.getElementById("uploadImage3").files[0]);

        oFReader3.onload = function (oFREvent3) {
            document.getElementById("uploadPreview3").src = oFREvent3.target.result;
        };
    };

     function Preview4Image() {
        var oFReader4 = new FileReader();
        oFReader4.readAsDataURL(document.getElementById("uploadImage4").files[0]);

        oFReader4.onload = function (oFREvent4) {
            document.getElementById("uploadPreview4").src = oFREvent4.target.result;
        };
    };

     function Preview5Image() {
        var oFReader5 = new FileReader();
        oFReader5.readAsDataURL(document.getElementById("uploadImage5").files[0]);

        oFReader5.onload = function (oFREvent5) {
            document.getElementById("uploadPreview5").src = oFREvent5.target.result;
        };
    };

</script>
@endsection('content')

	