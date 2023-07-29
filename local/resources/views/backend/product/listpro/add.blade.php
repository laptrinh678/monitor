@extends('backend.master.index')
@section('content')
@include('errors.functions')
<link rel="stylesheet" href="assets/css/select2.min.css" /> 
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>

<div class="page-content">		
	<div class="page-header">
		<h1>
			Thêm sản phẩm
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thông tin sản phẩm
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Danh mục sản phẩm</label>
					<div class="col-sm-3">
	                    <select required name="cat_id" title="title" class="select_lap">
										<option value="">Chọn danh mục</option>
										@php
											menuParent($cat,0,'',old('cat_id'));
										@endphp
				         </select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên sản phẩm </label>
					<div class="col-sm-9">
						<input type="text" required="" id="form-field-1" name="pro_name" placeholder="Nhập tên sản phẩm" class="col-xs-10 col-sm-5" />
					</div>
				</div>
					<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh sản phẩm 1</label>
					<div class="col-sm-9">
						<div id="div_1">
							<div class="div_border">
								<div class="box-preview-img"></div>	
							</div>
					       <input type="file" name="pro_img" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
							<button type="reset" class="btn-reset btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ảnh 2</label>
					<div class="col-sm-9">
						<div id="div_2">	
						 <div class="div_border">
						 	<div class="box-preview-img" id="box_preview2"></div>
						 </div>
							<input type="file"  name="pro_img2" multiple="true" onchange="previewImg2(event);" id="img_file2" accept="image/*">
							<button type="reset" class="btn-reset2 btn_reset_lap">Làm mới</button>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá sản phẩm </label>
					<div class="col-sm-3">
						<input required placeholder="Nhập giá sản phẩm" type="number" name="pro_price" class="form-control">
					</div>
				</div>
				<!--<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá cũ </label>
					<div class="col-sm-3">
						<input required value="10000000" type="number" name="pro_oldprice" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá mới</label>
					<div class="col-sm-3">
						<input required value="10000000" type="number" name="pro_newprice" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giảm Giá </label>
					<div class="col-sm-3">
						<input  type="number" name="pro_sale" class="form-control" placeholder="nhập % giảm">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mã sản phẩm </label>
					<div class="col-sm-3">
						<input type="text" name="pro_masp" class="form-control">
					</div>
				</div>
				<!--<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Màu sắc</label>
					<div class="col-sm-3">
						<textarea type="text" name="mausac"  cols="34" rows="6" placeholder="" ></textarea>
					</div>
					<p>{{'<li><span>Xanh</span></li>'}}</p>
					<p>{{'<li><span>Trắng</span></li>'}}</p>
					<p>{{'<li><span>Đỏ</span></li>'}}</p>
					<p>{{'<li><span>Cam</span></li>'}}</p>
				</div>-->

				<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Màu sắc </label>

										<div class="col-xs-12 col-sm-9">
											<select multiple="" id="state" name="mausac[]" class="select2" data-placeholder="Click to Choose...">
												<option value="Xanh">Xanh</option>
												<option value="Trắng">Trắng</option>
												<option value="Đỏ">Đỏ</option>
												<option value="Vàng">Vàng</option>
												<option value="Đen">Đen</option>
												<option value="Nâu">Nâu</option>
												<option value="Da Cam">Da Cam</option>
												<option value="Tím">Tím</option>
												<option value="Hồng">Hồng</option>
												<option value="Xanh da trời">Xanh da trời</option>
												<option value="Xanh lá cây">Xanh lá cây</option>
												<option value="Xám">Xám</option>
											</select>
										</div>
									</div>
				<!--<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kích thước</label>
					<div class="col-sm-3">
						<input type="text" name="kichthuoc" class="form-control">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Trạng thái</label>
					<div class="col-sm-3">
						<select name="pro_trangthai" id="">
							<option value="1">Còn hàng</option>
							<option value="0">Hết hàng</option>
						</select>
					</div>
				</div>

				<!--<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Size sản phẩm</label>
					<div class="col-sm-3">
						<textarea type="text" name="kichthuoc"  cols="34" rows="6" placeholder="" ></textarea>
					</div>
					<p>{{'<li><span>XL</span></li>'}}</p>
					<p>{{'<li><span>L</span></li>'}}</p>
					<p>{{'<li><span>S</span></li>'}}</p>
					<p>{{'<li><span>M</span></li>'}}</p>
					
				</div>-->
				<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Size sản phẩm </label>

										<div class="col-xs-12 col-sm-9">
											<select multiple="" id="state" name="kichthuoc[]" class="select2" data-placeholder="Click to Choose...">
												<option value="X">X</option>
												<option value="M">M</option>
												<option value="L">L</option>
												<option value="XL">XL</option>
												<option value="XXL">XXL</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
												<option value="32">32</option>
												<option value="33">33</option>
											</select>
										</div>
									</div>
				<!--<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phụ kiện </label>
					<div class="col-sm-3">
						<input type="text" name="pro_phukien" class="form-control">
					</div>
				</div>-->
				<!--
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Trạng thái </label>
					<div class="col-sm-3">
						<select name="pro_trangthai" id="">
							<option value="1">Mới</option>
							<option value="0">Cũ</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tình trạng </label>
					<div class="col-sm-3">
						<select name="pro_tinhtrang" id="">
							<option value="1">Còn hàng</option>
							<option value="0">Hết hàng</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Khuyến mãi </label>
					<div class="col-sm-3">
						<input type="text" name="pro_khuyenmai" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Xuất xứ </label>
					<div class="col-sm-3">
						<input type="text" name="pro_xuatxu" class="form-control">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Loại sản phẩm </label>
					<div class="col-sm-3">
						<select name="pro_noibat" id="">
							<option value="0">Sản phẩm giảm giá</option>
							<option value="1">Sản phẩm Nổi bật</option>
							<option value="2">Sản phẩm Mới</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">MÔ TẢ SẢN PHẨM</label>
					<div class="col-sm-9">
						<textarea class="ckeditor"  name="description3" id="a" cols="70" rows="10" ></textarea>
						<script type="text/javascript">
				     			CKEDITOR.replace('description3');
				      </script>﻿			
					</div>
				</div>

				<!--<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tiêu điểm</label>
					<div class="col-sm-9">
						<textarea class="ckeditor"  name="description1" id="b" cols="30" rows="10" ></textarea>
						<script type="text/javascript">
				      var editor = CKEDITOR.replace('description1',{
				       language:'vi',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Images/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Flash/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			
				       });
				      </script>﻿			
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Thông số kỹ thuật</label>
				<div class="col-sm-9">
					<textarea class="ckeditor" name="description2" id="" cols="30" rows="10" ></textarea>
					<script type="text/javascript">
				      var editor = CKEDITOR.replace('description2',{
				       language:'vi',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Images/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Flash/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			
				       });
				      </script>﻿					
				</div>
				</div>

				<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Hồ sơ dự án</label>
				<div class="col-sm-9">
					<textarea class="ckeditor" name="description4" id="" cols="30" rows="10" ></textarea>
					<script type="text/javascript">
				      var editor = CKEDITOR.replace('description4',{
				       language:'vi',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Images/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/ckfinder.html?Type=Flash/',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				       filebrowserImageBrowseUrl: '../../ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
			
				       });
				      </script>﻿					
				</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Danh mục cha tổng</label>
					<div class="col-sm-3">
						<select name="catcha" id="" required="">
							<option value="">Chọn danh mục cha tổng</option>
							@foreach($catcha as $val)
							<option value="{{$val->id}}">{{$val->cat_name}}</option>
							@endforeach
							
						</select>
					</div>
				</div>
				
				

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Link liên  kết</label>
					<div class="col-sm-6">
						<input type="text" name="link" id="a" placeholder="Dán link liên kết cho sản phẩm" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Meta tab</label>
					<div class="col-sm-3">
					<textarea type="text" name="metatab"  cols="50" rows="2" placeholder="Bạn vui lòng nhập thẻ Metatab" ></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Meta từ khóa</label>
					<div class="col-sm-3">
						<textarea type="text" name="metadescription"  cols="50" rows="2" placeholder="Các từ khóa cách nhau bằng phím Tab" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title</label>
					<div class="col-sm-3">
						<textarea type="text" name="title"  cols="50" rows="2" placeholder="Nhập title sản phẩm <title> Tên sản phẩm</title>" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Trạng thái hiển thị</label>
					<div class="col-sm-3">
						<select name="online" id="">
							<option value="1">Hiển thị</option>
							<option value="0">Không hiển thị</option>
						</select>
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
		</div><!-- /.col --
	</div><!-- /.row -->
</div><!-- /.page-content -->
<script src="assets/uploadfile_lap/jquery.js"></script>
<script src="assets/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="assets/js/jquery.raty.min.js"></script>
		<script src="assets/js/bootstrap-multiselect.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/jquery-typeahead.js"></script>
 <script>
 	// Xem hình ảnh trước khi upload
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
 </script>
 <script type="text/javascript">
			jQuery(function($){
			    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');
			
				/**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
				$('.rating').raty({
					'cancel' : true,
					'half': true,
					'starType' : 'i'
					/**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
				})//.find('i:not(.star-raty)').addClass('grey');
				
				
				
				//////////////////
				//select2
				$('.select2').css('width','200px').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
				
				//////////////////
				$('.multiselect').multiselect({
				 enableFiltering: true,
				 enableHTML: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li><a tabindex="0"><label></label></a></li>',
			        divider: '<li class="multiselect-item divider"></li>',
			        liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
				 }
				});
			
				
				///////////////////
					
				//typeahead.js
				//example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
				var substringMatcher = function(strs) {
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(strs, function(i, str) {
							if (substrRegex.test(str)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: str });
							}
						});
			
						cb(matches);
					}
				 }
			
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'states',
					displayKey: 'value',
					source: substringMatcher(ace.vars['US_STATES']),
					limit: 10
				 });
					
					
				///////////////
				
				
				//in ajax mode, remove remaining elements before leaving page
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
					$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
					$('.rating').raty('destroy');
					$('.multiselect').multiselect('destroy');
				});
			
			});
		</script>
@endsection('content')

	