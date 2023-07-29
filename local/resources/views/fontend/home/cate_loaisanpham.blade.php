@extends('fontend.master.index')
 @section('title')
  {{sản phẩm mới}}
 @endsection('title')
 @section('header_style')
     <link rel="stylesheet" href="{{url('public/fontend')}}/css/cateproduct.css">
 @endsection('header_style')
@section('content')
<!--start cateproduct-->
<div class="cateproduct">
  <div class="container">
    <div class="row">
      <div class="mottram">
        <div class="tieude_item">
              <div class="category_full">
            <div class="tab">
                <span class="dcm">
                  <a href="/danh-muc/so-mi-kieu"> Sản phẩm mới</a>
                   <i class="fa fa-caret-right" aria-hidden="true"></i>
                   </span>
                <p class="arrow_cate"></p> 
            </div>        
        </div>
       </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <h3>LỌC SẢN PHẨM</h3>
        <div class="form-group form_tksp">
        <label for="sel1">Theo giá</label>
        <select class="form-control" id="sel1">
          <option> Dưới 500.000</option>
          <option> Từ 500.000 - 1000.0000</option>
          <option>Trên 1.000.000</option>
        </select>
        </div>

        <div class="mottram">
          <div class="sidebar-sort">
        <button class="accordion active">Kích thước</button>
        <div class="panel grid" style="max-height: 215px;">
          <ul class="no-bullets filter-variant filter-size clearfix ">
            <li class="grid__item large--six-twelfths">
              <label data-filter="XS" class="filter-vendor__item xs">
                <input type="checkbox" value="XS">
                <span>XS</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="S" class="filter-vendor__item s">
                <input type="checkbox" value="S">
                <span>S</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="M" class="filter-vendor__item m">
                <input type="checkbox" value="M">
                <span>M</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="L" class="filter-vendor__item l">
                <input type="checkbox" value="L">
                <span>L</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="XL" class="filter-vendor__item xl">
                <input type="checkbox" value="XL">
                <span>XL</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="XXL" class="filter-vendor__item xxl">
                <input type="checkbox" value="XXL">
                <span>XXL</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="28" class="filter-vendor__item 28">
                <input type="checkbox" value="28">
                <span>28</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="29" class="filter-vendor__item 29">
                <input type="checkbox" value="29">
                <span>29</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="30" class="filter-vendor__item 30">
                <input type="checkbox" value="30">
                <span>30</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="31" class="filter-vendor__item 31">
                <input type="checkbox" value="31">
                <span>31</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="32" class="filter-vendor__item 32">
                <input type="checkbox" value="32">
                <span>32</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="33" class="filter-vendor__item 33">
                <input type="checkbox" value="33">
                <span>33</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="34" class="filter-vendor__item 34">
                <input type="checkbox" value="34">
                <span>34</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="35" class="filter-vendor__item 35">
                <input type="checkbox" value="35">
                <span>35</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="36" class="filter-vendor__item 36">
                <input type="checkbox" value="36">
                <span>36</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="37" class="filter-vendor__item 37">
                <input type="checkbox" value="37">
                <span>37</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="38" class="filter-vendor__item 38">
                <input type="checkbox" value="38">
                <span>38</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="39" class="filter-vendor__item 39">
                <input type="checkbox" value="39">
                <span>39</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="40" class="filter-vendor__item 40">
                <input type="checkbox" value="40">
                <span>40</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="41" class="filter-vendor__item 41">
                <input type="checkbox" value="41">
                <span>41</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="42" class="filter-vendor__item 42">
                <input type="checkbox" value="42">
                <span>42</span>
              </label>
            </li> 
            
            <li class="grid__item large--six-twelfths">
              <label data-filter="43" class="filter-vendor__item 43">
                <input type="checkbox" value="43">
                <span>43</span>
              </label>
            </li> 
            
          </ul>
        </div>
      </div>
        </div>
        <div class="mottram">
           <div class="sidebar-sort" style="border-bottom: 1px solid #eee;">
        <button class="accordion active">Màu sắc</button>
        <div class="panel grid" style="max-height: 129px;">
          <ul class="no-bullets filter-variant filter-color clearfix ">

            <li class="grid__item large--six-twelfths">
              <label data-filter="Hồng" class="filter-vendor__item hong item_mausac">
                <input type="checkbox" value="Hồng" style="background-color: #d67474">
                
              </label>
            </li> 

            <li class="grid__item large--six-twelfths">
              <label data-filter="Vàng" class="filter-vendor__item item_mausac vang">
                <input type="checkbox" value="Vàng" style="background-color: #f6eb1e">
              
              </label>
            </li> 

            <li class="grid__item large--six-twelfths">
              <label data-filter="Xanh" class="filter-vendor__item item_mausac xanh">
                <input type="checkbox" value="Xanh" style="background-color: #5f3fbf">
               
              </label>
            </li> 
        
            <li class="grid__item large--six-twelfths">
              <label data-filter="Đỏ" class="filter-vendor__item item_mausac do">
                <input type="checkbox" value="Đỏ" style="background-color: #f60a0a">
               
              </label>
            </li> 
        
            <li class="grid__item large--six-twelfths">
              <label data-filter="Tím" class="filter-vendor__item item_mausac tim">
                <input type="checkbox" value="Tím" style="background-color: #6b4444">
               
              </label>
            </li> 

            <li class="grid__item large--six-twelfths">
              <label data-filter="Đen" class="filter-vendor__item item_mausac den">
                <input type="checkbox" value="Đen" style="background-color: #000000">
              
              </label>
            </li> 

            <li class="grid__item large--six-twelfths">
              <label data-filter="Xanh đen" class="filter-vendor__item item_mausac xanh-den">
                <input type="checkbox" value="Xanh đen" style="background-color: #283963">
               
              </label>
            </li>   
            <li class="grid__item large--six-twelfths">
              <label data-filter="Xanh đen" class="filter-vendor__item item_mausac xanh-den">
                <input type="checkbox" value="Trắng" style="background-color: white">
               
              </label>
            </li>
               <li class="grid__item large--six-twelfths">
              <label data-filter="Xanh đen" class="filter-vendor__item item_mausac xanh-den">
                <input type="checkbox" value="Xanh da trời " style="background-color: #0549f2">
              
              </label>
            </li>
             <li class="grid__item large--six-twelfths">
              <label data-filter="Xanh đen" class="filter-vendor__item item_mausac xanh-den">
                <input type="checkbox" value="Xanh" style="background-color: #1be109">
              </label>
            </li>          
          </ul>
        </div>
      </div>
        </div>


      </div>
      <div class="col-md-9">
        @foreach($list_cate_pro as $val)
        <div class="hai_5">
             <div class="item item_nha">
            <div class="img">
                 <a href="{{url("$cate->cat_slug/$val->pro_slug.html")}}"><img class="hvr-bob" src="{{url('public/backend/product')}}/{{$val->pro_img}}" alt=""></a>
            </div>
            <div class="content">
              <h4> <a href="{{url("$cate->cat_slug/$val->pro_slug.html")}}">{{$val->pro_name}}</a> </h4>
            </div>
            <div class="click">
              <span class="start">
                 {{number_format($val->pro_price)}} VNĐ
              </span>
              <span class="chitet">
                <a class="text_chitiet" href="{{url("$cate->cat_slug/$val->pro_slug.html")}}">Chi tiết</a>
              </span>
            </div>
          </div>
        </div>
        @endforeach

     

      </div>
    </div>
  </div>
</div>
@endsection