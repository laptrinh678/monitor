@extends('backend.master.index')
@section('content')
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckfinder/ckfinder.js"></script>
<section class="content-header">
                <h1>
                     <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admin/index')}}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="#">Gửi mail</a>
                    </li>
                    
                </ol>
                </h1>
               
            </section>
            <br>
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="javascript::voild(0)"><i class="livicon" data-name="plus" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-152" style="width: 50px; height: 50px;">
                                
                                </i>Gửi Email</a>
                            </h4>
                        </div>
                            <div class="panel-body">
            					<form class="form-horizontal" role="form" method="post">
			<div class="form-group">
					@include('errors.note')
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email gửi đến</label>
					<div class="col-sm-9">
						<input type="email" required="" id="form-field-1" name="email" placeholder="Nhập tên" class="form-control" />
						<span style="color: red;">{{$errors->first('member_name')}}</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tiêu đề mail</label>
					<div class="col-sm-9">
						<input type="text" required="" id="form-field-1" name="name" placeholder="Nhập Email" class="form-control" />
						<span style="color: red;">{{$errors->first('member_name')}}</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nội dung mail</label>
						<div class="col-sm-9">
						  <!--<textarea id="" cols="30" rows="10" name="content"></textarea>-->
						  <textarea class="ckeditor form-control" name="description1" id="" cols="30" rows="10" ></textarea>
						</div>
				</div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button class="btn btn-primary" type="submit">
							<i class="livicon" data-name="rocket" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-166" style="width: 50px; height: 50px;">
							</i>
						Gửi Email
					</button>
                         &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">
                            	<i class="livicon" data-name="refresh" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-245" style="width: 50px; height: 50px;">
                            	
                            	</i>
                            Reset</button>
							
					</div>
				</div>
				{{csrf_field()}}
			</form>
                           </div>
                        </div>
                    </div>
                </div>
                <!--row end-->
            </section>
@endsection('content')

	