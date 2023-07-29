@extends('backend.master.index')
@section('content')
<script src="{{url('public/backend/assets/js')}}/jquery3.3.1.min.js"></script>
<div class="page-content listQuestionParent">
	<div class="page-header">
	<h1>
		Danh sách câu hỏi
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<a href="{{url('admin/Question/add')}}"> Thêm câu hỏi mới</a>
		</small>
			@include('errors.note')
	</h1>
	</div><!-- /.page-header -->
		<div class="row ">
							<div class="col-xs-12">
									<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Quản lý câu hỏi
										</div>
								<div class="row">
									<div class="col-xs-12">
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															Id
														</th>
														<th>Tên Câu hỏi</th>
														<th class="center">Đáp án</th>

														<th>
															Đáp án đúng
														</th>
														<th class="center">Người thêm</th>
														<th class="center">Trạng thái</th>

														<th>Hành động</th>
													</tr>
												</thead>

												<tbody>
													
												@foreach($listQuestion as $key=>$val)
												
													<tr class="listQuestion">
														<td class="center">
															{{$key+1}}
														</td>
														<td class="left">
															<p><span>Tên câu hỏi</span> :{{$val->nameQuestion}}</p>
	
															<p align="center"><img class="imgQuestion" src="{{url('public/backend/question')}}/{{$val->imgQuestion}}" alt=""></p>
															<p>
																<span>Âm thanh câu hỏi</span>:
																<audio controls>
																  <source src="{{url('public/backend/question')}}/{{$val->soundQuestion}}" type="audio/mpeg">
																</audio>
															</p>
															
														</td>
													
														
														
														<td>
														<p>
															<span>Đáp án A</span>:{{$val->replyA}}
															<span><img class="imgQuestion" src="{{url('public/backend/question')}}/{{$val->imgreplyA}}" alt=""></span>
														</p>
														
														<p>
															<span>Đáp án B</span>:{{$val->replyB}}
															<span>
																<img class="imgQuestion" src="{{url('public/backend/question')}}/{{$val->imgreplyB}}" alt="">
															</span>
														</p>
														
														<p>
															<span>Đáp án C</span>:{{$val->replyC}}
															<span>
																<img class="imgQuestion" src="{{url('public/backend/question')}}/{{$val->imgreplyC}}" alt="">
															</span>

														</p>
														
														<p>
															<span>Đáp án D</span>:{{$val->replyD}}
															<span>
																<img class="imgQuestion" src="{{url('public/backend/question')}}/{{$val->imgreplyD}}" alt="">
															</span>

														</p>
	
														</td>
														<td class="hidden-480">

															<p> <span>Đáp án</span>:{{$val->chooseReply}}</p>

													    </td>
														<td class="left">
															
															<p> <span>Người tạo</span>:{{$val->user}}</p>
															<p><span>Ngày tạo</span>:{{date('d-m-Y',strtotime($val->created_at))}}</p>

														</td>
														<td class="hidden-480 center status">
															<input type="button" title="{{$val->status}}" value="{{$val->status}}" class="onoff">
															<input type="hidden" onload="myFunction()" class="idQues" value="{{$val->id}}">
														</td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
						
																<a class="green" href="{{url('admin/Question/edit')}}/{{$val->id}}">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a onclick="return confirm('Bạn chắn chắn muốn xóa sản phẩm này không ?');" class="red" href="{{url('admin/Question/delete')}}/{{$val->id}}">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
													@endforeach()
												
												</tbody>
											</table>
										</div>
									</div>
								</div>

							
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
	
</div><!-- /.page-content -->

@endsection('content')

@section('script')

<!-- <script src="assets/js/jquery3.2.1.min.js"></script> -->

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});

				$('body').on('load','[title="OFF"]', function()
				{
					 $(this).css({"background": "red"});
				});
				
				$('body').on('load','[title="ON"]', function()
				{
					 $(this).css({"background": "#112ad3"});
				});

				 $('body').on('click','.onoff',function()
				 {
				 	var val = $(this).val();
				    	var t = $(this);
				    	if(val==="ON")
				    	{
				    		 var status = 'OFF';
				    		 var idQues = $(this).next().val();
				    		 var thiss = $(this);

				    		/* $.ajax({
								    context: this,
								    type: 'GET',
								    url: "admin/Question/ChangeStatus",
								    data: '/'+status +'/' +idQues,
								    success: function(data){
								      console.log(data);
				    		        $(this).parent().append(data); 
				    		        console.log('ok on');
								    }
								});*/
				    		$.get( 'http://localhost/fasamy.com/admin/Question/ChangeStatus/'+status+'/'+idQues, function(data){
				    			console.log(data);
				    		        thiss.parent().append(data); 
				    		        thiss.parent().find('.onoff:first').remove();
								  
						       });
				    	}else if(val==="OFF"){
				   
				    		  var status = 'ON';
				    		  var idQues = $(this).next().val();
				    		  var thiss = $(this);
				    		  $.get( 'http://localhost/fasamy.com/admin/Question/ChangeStatus/'+status+'/'+idQues, function(data){
				    			   console.log(data);
				    		        thiss.parent().html(data); 
				    		        console.log('ok off');
						         
						       });
				    		
				    	}

				 })
				
			
			})
		</script>
		
@endsection('script')
