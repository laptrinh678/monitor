@if(Session::has('addUser'))
	<p class="alert alert-success">{{Session::get('addUser')}}</p>
@endif
@if(Session::has('editUser'))
	<p class="alert alert-success">{{Session::get('editUser')}}</p>
@endif
@if(Session::has('err'))
	<p class="alert alert-success">{{Session::get('err')}}</p>
@endif
@if(Session::has('success'))
	<p class="alert alert-success">{{Session::get('success')}}</p>
@endif
@if(Session::has('addcate'))
	<p class="alert alert-success">{{Session::get('addcate')}}</p>
@endif
@if(Session::has('editcatsuccess'))
	<p class="alert alert-success">{{Session::get('editcatsuccess')}}</p>
@endif
@if(Session::has('errCatedelete'))
	<p class="alert alert-success">{{Session::get('errCatedelete')}}</p>
@endif
@if(Session::has('sucessCateDele'))
	<p class="alert alert-success">{{Session::get('sucessCateDele')}}</p>
@endif
@if(Session::has('addproductsucess'))
	<p class="alert alert-success">{{Session::get('addproductsucess')}}</p>
@endif
@if(Session::has('editproductsuccess'))
	<p class="alert alert-success">{{Session::get('editproductsuccess')}}</p>
@endif
@if(Session::has('deleteproductsuccess'))
	<p class="alert alert-success">{{Session::get('deleteproductsuccess')}}</p>
@endif
@if(Session::has('sucessimgdetailDele'))
	<p class="alert alert-success">{{Session::get('sucessimgdetailDele')}}</p>
@endif
@if(Session::has('addcatepost'))
	<p class="alert alert-success">{{Session::get('addcatepost')}}</p>
@endif
@if(Session::has('addsucess'))
	<p class="alert alert-success">{{Session::get('addsucess')}}</p>
@endif
@if(Session::has('editsucess'))
	<p class="alert alert-success">{{Session::get('editsucess')}}</p>
@endif
@if(Session::has('deletesucess'))
	<p class="alert alert-success">{{Session::get('deletesucess')}}</p>
@endif
@if(Session::has('addsuccess'))
	<p class="alert alert-success">{{Session::get('addsuccess')}}</p>
@endif
@if(Session::has('sensucess'))
	<p class="alert alert-success">{{Session::get('sensucess')}}</p>
@endif
@if(Session::has('name'))
	<span class="alert alert-success">{{Session::get('name')}}</span>
@endif

@if(Session::has('errorFIX'))
	<span class="alert alert-success">{{Session::get('errorFIX')}}</span>
@endif