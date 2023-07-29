<?php
Route::group(['namespace'=>'backend'], function()
{		
		Route::get('/','member\logincontroller@getlogin');
		Route::post('/','member\logincontroller@postlogin');
		Route::get('logout','member\logincontroller@getlogout');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
	{	
		Route::get('index', 'home\homecontroller@getlist');
		Route::get('ajaxdata','home\homecontroller@getajax');
		Route::get('different','home\homecontroller@getajax2');

		Route::group(['prefix'=>'member'], function()
		{
			Route::get('list','member\membercontroller@getlist');
			Route::get('add','member\membercontroller@getadd');
			Route::post('add','member\membercontroller@postadd')->name('addmember');

			Route::get('edit/{id}','member\membercontroller@getedit');
			Route::post('edit/{id}','member\membercontroller@postedit');
			Route::get('delete/{id}','member\membercontroller@getdelete');
		});
		Route::group(['prefix'=>'product'], function()
		{
			Route::group(['prefix'=>'cate'], function()
			{
				Route::get('list','product\cateController@getlist');
				Route::get('add','product\cateController@getadd');
				Route::post('add','product\cateController@postadd');
				Route::get('edit/{id}','product\cateController@getedit');
				Route::post('edit/{id}','product\cateController@postedit');
				Route::get('delete/{id}','product\cateController@getdelete');
				Route::get('search_catepro','product\cateController@getsearch');
			});
			Route::group(['prefix'=>'listpro'], function()
			{
				Route::get('list','product\productcontroller@getlist');
				Route::get('add','product\productcontroller@getadd');
				Route::post('add','product\productcontroller@postadd');
				Route::get('edit/{id}','product\productcontroller@getedit');
				Route::post('edit/{id}','product\productcontroller@postedit');
				Route::get('delete/{id}','product\productcontroller@getdelete');
				Route::get('search_pro','product\productcontroller@getsearch');
				Route::get('comment','product\productcontroller@getcomment');
			});
			Route::group(['prefix'=>'img_product'], function()
			{
				Route::get('list','product\img_pro_cotroller@getlist');
				Route::get('add','product\img_pro_cotroller@getadd');
				Route::post('add','product\img_pro_cotroller@postadd');
				Route::get('edit/{id}','product\img_pro_cotroller@getedit');
				Route::post('edit/{id}','product\img_pro_cotroller@postedit');
				Route::get('delete/{id}','product\img_pro_cotroller@getdelete');
			});
		});////// KẾT THÚC GROUP PRODUCT//////
		Route::group(['prefix'=>'post'], function()
		{
			Route::group(['prefix'=>'cate'], function()
			{
				Route::get('list','post\catecontroller@getlist');
				Route::get('add','post\catecontroller@getadd');
				Route::post('add','post\catecontroller@postadd');
				Route::get('edit/{id}','post\catecontroller@getedit');
				Route::post('edit/{id}','post\catecontroller@postedit');
				Route::get('delete/{id}','post\catecontroller@getdelete');
				Route::get('search_cate_post','post\catecontroller@getsearch');
			});
			Route::group(['prefix'=>'listpost'], function()
			{
				Route::get('list','post\lispostcontroller@getlist');
				Route::get('add','post\lispostcontroller@getadd');
				Route::post('add','post\lispostcontroller@postadd');
				Route::get('edit/{id}','post\lispostcontroller@getedit');
				Route::post('edit/{id}','post\lispostcontroller@postedit');
				Route::get('delete/{id}','post\lispostcontroller@getdelete');
				Route::get('search_post','post\lispostcontroller@getsearch');
				Route::get('comment','post\lispostcontroller@getcomment');
			});
			// chức năng postimg
			Route::group(['prefix'=>'postimg'], function()
			{
				Route::get('list','post\post_imgcontroller@getlist');
				Route::get('add','post\post_imgcontroller@getadd');
				Route::post('add','post\post_imgcontroller@postadd');
				Route::get('edit/{id}','post\post_imgcontroller@getedit');
				Route::post('edit/{id}','post\post_imgcontroller@postedit');
				Route::get('delete/{id}','post\post_imgcontroller@getdelete');
			});
		});////// KẾT THÚC GROUP Post//////
		
		Route::group(['prefix'=>'header-footer'], function()
		{
				Route::get('list','head\head_footcontroller@getlist');
				Route::get('add','head\head_footcontroller@getadd');
				Route::post('add','head\head_footcontroller@postadd');
				Route::get('edit/{id}','head\head_footcontroller@getedit');
				Route::post('edit/{id}','head\head_footcontroller@postedit');
		});

		//// 9/10/2018// tvqg tang 4// lam chuc nang quan ly header-footer
		Route::group(['prefix'=>'background'], function()
		{
				Route::get('list','backgroundcontroller@getlist');
				Route::get('add','backgroundcontroller@getadd');
				Route::post('add','backgroundcontroller@postadd');
				Route::get('edit/{id}','backgroundcontroller@getedit');
				Route::post('edit/{id}','backgroundcontroller@postedit');
		});

		///// bắt đầu route slider_no;
		Route::group(['prefix'=>'slider'], function()
		{
			Route::get('list','slider\slider_nocontroller@getlist');
			Route::get('add','slider\slider_nocontroller@getadd');
			Route::post('add','slider\slider_nocontroller@postadd');
			Route::get('edit/{id}','slider\slider_nocontroller@getedit');
			Route::post('edit/{id}','slider\slider_nocontroller@postedit');
			Route::get('delete/{id}','slider\slider_nocontroller@getdelete');
		});
		////kết thúc phần slider//
		Route::group(['prefix'=>'block'], function()
		{
			Route::get('list','block\blockcontroller@getlist');
			Route::get('add','block\blockcontroller@getadd');
			Route::post('add','block\blockcontroller@postadd');
			Route::get('edit/{id}','block\blockcontroller@getedit');
			Route::post('edit/{id}','block\blockcontroller@postedit');
			Route::get('delete/{id}','block\blockcontroller@getdelete');
		});
		//// Bắt đầu phần quảng cáo 10/11/2017//
		Route::group(['prefix'=>'quangcao'], function()
		{
			Route::get('list','quangcao\quangcaocontroller@getlist');
			Route::get('add','quangcao\quangcaocontroller@getadd');
			Route::post('add','quangcao\quangcaocontroller@postadd');
			Route::get('edit/{id}','quangcao\quangcaocontroller@getedit');
			Route::post('edit/{id}','quangcao\quangcaocontroller@postedit');
			Route::get('delete/{id}','quangcao\quangcaocontroller@getdelete');
		});
		// bắt đầu chức kho giao diện
		Route::group(['prefix'=>'giaodien'], function()
		{
			Route::get('list','giaodien\giaodiencontroller@getlist');
			Route::get('add','giaodien\giaodiencontroller@getadd');
			Route::post('add','giaodien\giaodiencontroller@postadd');
			Route::get('edit/{id}','giaodien\giaodiencontroller@getedit');
			Route::post('edit/{id}','giaodien\giaodiencontroller@postedit');
			Route::get('delete/{id}','giaodien\giaodiencontroller@getdelete');
		});
		//kết thúc chức năng kho giao diện
		// bat dau chuc nang quan ly link lien ket dung de ql link dan dong do phai copy link nhieu lan. de thay doi
		Route::group(['prefix'=>'link'], function()
		{
			Route::get('list','link\linkcontroller@getlist');
			Route::get('add','link\linkcontroller@getadd');
			Route::post('add','link\linkcontroller@postadd');
			Route::get('edit/{id}','link\linkcontroller@getedit');
			Route::post('edit/{id}','link\linkcontroller@postedit');
			Route::get('delete/{id}','link\linkcontroller@getdelete');
		});
		// lam ngay 20/3/2019 tai viettel 1 giang văn minh.
		Route::group(['prefix'=>'service'], function()
		{	Route::get('listService','ServiceController@getlistService');
			Route::get('add', 'ServiceController@getadd');
			Route::post('add','ServiceController@postadd');
			Route::get('edit/{item}','ServiceController@getedit');
			Route::get('delete/{id}','ServiceController@getdelete');
			Route::get('all','ServiceController@allService');
			Route::get('{id}','ServiceController@getlist');
		    Route::get('reason/{reason}/{DFfect}/{idHfix}/{Des}/{Idhis}','ServiceController@getreason');
  			Route::get('reason2/{reason}/{DFfect}/{idHfix}/{Des}/{Idhis}','ServiceController@getreason2');
			Route::get('ajax/{view}/{id}','ServiceController@getView');
			Route::get('list/{reason}/{DFfect}/{idHfix}/{Des}/{Idhis}/{SId}','ServiceController@getViewList');
		});
		Route::group(['prefix'=>'reason'], function()
		{
			Route::get('list','ReasonController@getlist');
			Route::get('add','ReasonController@getadd');
			Route::post('add','ReasonController@postadd');
			Route::get('edit/{id}','ReasonController@getedit');
			Route::post('edit/{id}','ReasonController@postedit');
			Route::get('delete/{id}','ReasonController@getdelete');
		});

		Route::group(['prefix'=>'error'], function()
		{
			Route::get('list','ErrorController@getlist');
			Route::post('add','ErrorController@postadd')->name('erroradd');
			Route::post('edit','ErrorController@postedititem')->name('erroredit');
			Route::get('delete/{id}/{error_code}','ErrorController@getdelete');
			Route::get('status/{ac}/{id}','ErrorController@getstatus');
			Route::get('statusMe/{ac}/{id}','ErrorController@getstatusMe');
			Route::get('dowload/{name}','ErrorController@getdowload');
			Route::get('dowloaderror','ErrorController@getdowloaderror');
			
		});

		Route::group(['prefix'=>'errorReport'], function()
		{
			Route::get('list','errorReportController@getlist');
			Route::post('add','errorReportController@postadd')->name('errorReport');
			Route::post('edit','errorReportController@postedititem')->name('errorReportedit');
			
			Route::get('delete/{id}/{error_code}','errorReportController@getdelete');
			Route::get('status/{ac}/{id}','errorReportController@getstatus');
			Route::get('statusMe/{ac}/{id}','errorReportController@getstatusMe');
			Route::get('dowload/{name}','errorReportController@getdowload');
			Route::get('dowloaderror','errorReportController@getdowloaderror');
			
		});

		Route::group(['prefix'=>'solve'], function()
		{
			Route::get('list','ErrorSloveController@getlist');
			Route::get('add/{itemJson}','ErrorSloveController@getadd');
			Route::get('edit/{itemJson}/{id}','ErrorSloveController@getedit');
			Route::get('delete/{id}','ErrorSloveController@getdelete');
			Route::get('status/{ac}/{id}','ErrorSloveController@getstatus');
			Route::get('statusMe/{ac}/{id}','ErrorSloveController@getstatusMe');
		});


		Route::group(['prefix'=>'process'], function()
		{
			Route::get('list','ProcessController@getlist');
			Route::get('add','ProcessController@getadd');
			Route::post('add','ProcessController@postadd');
			Route::get('edit/{id}','ProcessController@getedit');
			Route::post('edit/{id}','ProcessController@postedit');
			Route::get('delete/{id}','ProcessController@getdelete');
		});
		/*lam ngay 8/4*/
		Route::group(['prefix'=>'fixerror'], function()
		{
			Route::get('list','FixErrorController@getlist');
			Route::get('add/{er}/{Ds}/{sT}/{En}/{li}/{le}','FixErrorController@getadd');
			Route::get('edit/{id}/{Ds}/{sT}/{En}/{li}/{le}','FixErrorController@postedit');
			Route::get('delete/{id}','FixErrorController@getdelete');
		});
		// lam ngay 20/3/2019 tai viettel 1 giang văn minh.
		Route::group(['prefix'=>'chatbox'], function()
		{
		Route::get('list','ChatboxController@getlist');
		Route::get('ajaxdata','ChatboxController@getajaxdata');
		Route::get('report/{text}/{user}','ChatboxController@ContenChat');	
		});

		Route::group(['prefix'=>'live'], function()
		{
			Route::get('list','LiveController@getlist');
		    Route::get('handover/{item}','LiveController@addhandover');
	        Route::get('add/{users}/{sT}/{date3}','LiveController@getadd');	
	        Route::get('delete/{id}','LiveController@getdelete');
		    Route::get('update/{id}/{users}/{date2}/{sT}','LiveController@getupdate');
		    Route::post('ajax_edit','LiveController@postedititem')->name('ajaxedit');
		    Route::get('ajax_upload','LiveController@getload');			
		    Route::post('ajax_upload','LiveController@postload')->name('ajaxupload');
    		Route::get('searchdate/{startdate}/{enddate}','LiveController@searchdate');

		});

		Route::group(['prefix'=>'confix'], function()
		{
			Route::get('list','ConfixController@getlist');
			Route::get('add/{itemjson}','ConfixController@getadd');
			Route::get('delete/{id}','ConfixController@getdelete');
			Route::get('update/{itemjson}','ConfixController@getupdate'); 	
			Route::get('active/{ac}/{id}','ConfixController@getactive');
		});

		Route::group(['prefix'=>'health'], function()
		{
			Route::get('list','healthController@getlist');
			Route::get('add/{itemjson}','healthController@getadd');
			Route::get('delete/{id}','healthController@getdelete');
			Route::get('update/{itemjson}','healthController@getupdate'); 	
			Route::get('active/{ac}/{id}','healthController@getactive');
		});
		Route::group(['prefix'=>'search'], function()
		{
			Route::get('list','searchController@getlist');
			Route::get('add/{itemjson}','searchController@getadd');
			Route::get('delete/{id}','searchController@getdelete');
			Route::get('update/{itemjson}','searchController@getupdate'); 	
			Route::get('active/{ac}/{id}','searchController@getactive');
		});

		Route::group(['prefix'=>'grafana'], function()
		{
			Route::get('paymentTranHis',function(){return view('backend.grafana.paymentTranHis');});
			Route::get('tpp_trans_daily_his',function(){return view('backend.grafana.tpp_trans_daily_his');});
			Route::get('mobile_service',function(){ return view('backend.grafana.mobile_service');});
			Route::get('trans-gateway-egate',function(){ return view('backend.grafana.trans-gateway-egate');});
			Route::get('trans-gateway-error',function(){ return view('backend.grafana.trans-gateway-error');});
			
			
		});

		Route::group(['prefix'=>'seo'], function()
		{
			Route::get('list','seocontroller@getlist');
			Route::get('add','seocontroller@getadd');
			Route::post('add','seocontroller@postadd');
			Route::get('edit/{id}','seocontroller@getedit');
			Route::post('edit/{id}','seocontroller@postedit');
			Route::get('delete/{id}','seocontroller@getdelete');
		});

		Route::group(['prefix'=>'Question'], function()
		{
			Route::get('list','QuestionController@getlist');
			Route::get('add','QuestionController@getadd');
			Route::post('add','QuestionController@postadd');
			Route::get('edit/{id}','QuestionController@getedit');
			Route::post('edit/{id}','QuestionController@postedit');
			Route::get('delete/{id}','QuestionController@getdelete');
			Route::get('ChangeStatus/{status}/{idQues}','QuestionController@getChangeStatus');
		});
		///kết thúc phần quảng cáo///
		Route::group(['prefix'=>'guimail'], function()
		{
			Route::get('mail','mail\mailcontroller@getmail');
			Route::post('mail','mail\mailcontroller@postmail');
		});

		Route::any('{all}', function () {
		    return view('fontend.home.error');
		});

	});//// Kết thúc route admins
	
});


Route::group(['namespace'=>'fontend'], function()
{
	Route::get('gggg', 'homecontroller@getlist');
	Route::get('sevice/{slug}', 'homecontroller@getservicedetail');


	//Route::post('/','homecontroller@postlist');
	Route::get('lien-he.html', 'homepostcontroller@getlienhe');
	Route::get('tuyen-dung.html', 'homepostcontroller@gettuyendung');
	Route::get('registration.html', 'homecontroller@getLogin');
	Route::post('registration.html', 'homecontroller@postLogin');

	Route::get('logincustomer.html', 'homecontroller@getLogincustomer');
	Route::post('logincustomer.html', 'homecontroller@postLogincustomer');


	Route::get('mua-hang-thang-cong.html','cartcontroller@getcomplate');
	Route::get('tin-tuc.html','homepostcontroller@getcatepost');
	Route::get('tin-tuc/{slug}.html','homepostcontroller@getlistcatepost');
	
	Route::get('search_gia/{giasp}','homecontroller@search_gia');
	
	Route::get('chi-tiet-tin/{slug}.html','homepostcontroller@getdetailpost');
	
	Route::get('chi-tiet-san-pham/{slug}.html','homecontroller@detailproduct2');
	Route::get('danh-muc/{slug_cate_con}.html','homecontroller@getcateprocate_con');
	Route::get('{slug}.html','homecontroller@getcatepro');
	Route::get('{slugcate}/{slug}.html','homecontroller@detailproduct');
	
	
	
	
	Route::post('chi-tiet-san-pham/{slug}','homecontroller@postcomment');
	Route::get('chi-tiet-be-tong/{slug}.html','homecontroller@detail_betong');
	Route::get('chi-tiet-du-an/{slug}.html','homepostcontroller@detail_duan');
	// chuc nang dowload file san pham
	Route::get('dowload/{banve}','homecontroller@getdowload');
	// chucs nang gio hang
	// xử lý phần danh mục sản phẩm-tintuc
	Route::get('danh-sach-san-pham/{slug}.html','homecontroller@getlistcate_pro')->name('dssp');

	Route::get('danh-sach-vat-lieu/{slug}.html','homecontroller@getlistvatlieu');
    Route::get('danh-sach-du-an.html','homepostcontroller@dsduan');
    Route::get('be-tong.html','homecontroller@dsbetong');
	// xử lý chức năng tìm kiếm sản phẩm

    Route::get('search','homecontroller@getsearch');
    Route::get('search_post','homepostcontroller@getsearch_post' );
	Route::get('search_kichthuoc/{kichthuocsp}','homecontroller@search_kichthuoc');
	Route::get('search_mausac/{mausacsp}','homecontroller@search_mausacsp');
	// xu ly fontend phan tin tuc

	//Route::get('chi-tiet-bai-viet/{slug}.html','homepostcontroller@getdetailpost');
	Route::get('blogs/{slug}.html', 'homepostcontroller@getblog');
	// xử lý chi iết bài viết
	Route::get('chi-tiet-bai-viet/{slug}.html','homepostcontroller@getchitietbaiviet1');
	Route::post('chi-tiet-bai-viet2/{slug}.html','homepostcontroller@postbinhluan');
	Route::get('chi-tiet-bai-viet3','homepostcontroller@getdetai3');
	// xử lý phần kho giao diện 15/11/2017
	Route::get('showrow.html', 'homepostcontroller@getshowrow');

    //Route::get('tuyen-dung/{slug}.html', 'homepostcontroller@gettuyendung');

    // xu ly gio hang
    Route::group(['prefix'=>'cart'], function()
    {
    	Route::get('add/{id}', 'cartcontroller@getaddcart');
    	Route::get('show','cartcontroller@cartshow');
    	Route::post('show', 'cartcontroller@postmail');
		Route::get('delete/{rowid}','cartcontroller@cartdelete');
		Route::get('update','cartcontroller@cartupdate');

    });

    Route::group(['prefix' => 'api','middleware' => 'cors'], function() 
    {
			Route::get('sanphamnoibat','homecontroller@getjson');
			Route::get('cateproduct','homecontroller@getapicateproduct');
			Route::get('Question','homecontroller@getapi');
			Route::get('list','homecontroller@getapilist');
			
	});
    


});
Route::any('{all}', function () {
    return view('fontend.home.error');
});


