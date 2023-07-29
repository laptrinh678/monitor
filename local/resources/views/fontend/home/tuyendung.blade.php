@extends('fontend.master.index')
@section('title')
Tuyển dụng
@endsection('title')
@section('header_style')
<link rel="stylesheet" href="{{url('public/fontend')}}/css/cate_new.css">
@endsection('header_style')
@section('content')
<div class="catetuyendung">
  <!--ket thuc dev tim kiem -->
  <div class="mottram wow animated zoomIn">
      <div class="container">
        <div class="row litstwork">
        <p align="center" class="title_td"> HÃY THAM GIA CÙNG CHÚNG TÔI </p>
        <table>
          <tr>
            <td class="vitri roboto_bold">VỊ TRÍ ĐANG TUYỂN</td>
            <td class="soluong roboto_bold">SỐ LƯỢNG</td>
            <td class="hannop roboto_bold">HẠN NỘP HỒ SƠ</td>
          </tr>
          <tr>
            <td class="vitri roboto_bold">
              <div class="left_15">
                <a href="tuyendungdetail.html"><img src="images/cv1.png" alt=""></a>
              </div>
              <div class="right_85">
                <p><a href="tuyendungdetail.html">Egroup tuyển gấp ADMIN lương cao</a></p>
                <span class="roboto_re">(Toàn thời gian)</span>
              </div>
            </td>
            <td class="soluong roboto_bold">
              <p class="roboto_re">01</p>
            </td>
            <td class="hannop roboto_bold">
              <p class="roboto_re">01/5/2018</p>
            </td>
          </tr>
           <tr>
            <td class="vitri roboto_bold">
              <div class="left_15">
               <a href="tuyendungdetail.html"><img src="images/cv1.png" alt=""></a>
              </div>
              <div class="right_85">
                <p><a href="tuyendungdetail.html">Egroup tuyển gấp ADMIN lương cao</a></p>
                <span class="roboto_re">(Toàn thời gian)</span>
              </div>
            </td>
            <td class="soluong roboto_bold">
              <p class="roboto_re">01</p>
            </td>
            <td class="hannop roboto_bold">
              <p class="roboto_re">01/5/2018</p>
            </td>
          </tr>
           <tr>
            <td class="vitri roboto_bold">
              <div class="left_15">
               <a href="tuyendungdetail.html"><img src="images/cv1.png" alt=""></a>
              </div>
              <div class="right_85">
                <p><a href="tuyendungdetail.html">Egroup tuyển gấp ADMIN lương cao</a></p>
                <span class="roboto_re">(Toàn thời gian)</span>
              </div>
            </td>
            <td class="soluong roboto_bold">
              <p class="roboto_re">01</p>
            </td>
            <td class="hannop roboto_bold">
              <p class="roboto_re">01/5/2018</p>
            </td>
          </tr>
        </table>
         <div class="mottram">
             <p class="paginate" align="center"><span> <a href="">1</a></span><span><a href="">2</a></span><span><a href="">3</a></span></p>
        </div>
      </div>
    </div>
  </div>
  <div class="motram camnangtuyendung wow animated zoomIn">
    <div class="container">
      <div class="row">
            <p align="center" class="title_td2 roboto_bold">CẨM NANG TUYỂN DỤNG</p>
            <hr class="hr_thongtinegroup">
            <div class="owl-carousel owl-theme camnangtuyendung_carosel">
              <div class="item">
                <img src="images/tintd.png" alt="">
                <p class="tintuyendung_p"><a href="javascript:void(0)">Tin Tuyển Dụng</a></p>
                <div class="mottram">
                  <h6><a href="tuyendungdetail.html">Những điểm mạnh của việc tuyển dụng ứng viên do nhân viên giới thiệu</a></h6>
                    <div>
                       Việc tuyển dụng ở các công ty hàng năm tưởng chừng là câu chuyện đã cũ
                     Việc tuyển dụng ở các công ty hàng năm tưởng chừng là câu chuyện đã cũ
                    </div>
                    <div class="duongke"></div>
                </div>
                <div class="mottram tapdoanegroup">
                  <div class="nammuoi">
                    <p><img src="images/logo2.png" alt="">Tập đoàn Egroup</p>
                  </div>
                  <div class="nammuoi">
                    <p class="thoigian_p">24/08/2017</p>
                  </div>
                </div>
              </div>
               <div class="item">
                <img src="images/tintd.png" alt="">
                <p class="tintuyendung_p"><a href="javascript:void(0)">Tin Tuyển Dụng</a></p>
                <div class="mottram">
                  <h6><a href="tuyendungungtuyen.html">Những điểm mạnh của việc tuyển dụng ứng viên do nhân viên giới thiệu</a></h6>
                    <div>
                       Việc tuyển dụng ở các công ty hàng năm tưởng chừng là câu chuyện đã cũ
                     Việc tuyển dụng ở các công ty hàng năm tưởng chừng là câu chuyện đã cũ
                    </div>
                    <div class="duongke"></div>
                </div>
                <div class="mottram tapdoanegroup">
                  <div class="nammuoi">
                    <p><img src="images/logo2.png" alt="">Tập đoàn Egroup</p>
                  </div>
                  <div class="nammuoi">
                    <p class="thoigian_p">24/08/2017</p>
                  </div>
                </div>
              </div>
               <div class="item">
            <img src="images/tintd.png" alt="">
                <p class="tintuyendung_p"><a href="javascript:void(0)">Tin Tuyển Dụng</a></p>
                <div class="mottram">
                  <h6><a href="tuyendungdetail.html">Những điểm mạnh của việc tuyển dụng ứng viên do nhân viên giới thiệu</a></h6>
                    <div>
                       Việc tuyển dụng ở các công ty hàng năm tưởng chừng là câu chuyện đã cũ
                     Việc tuyển dụng ở các công ty hàng năm tưởng chừng là câu chuyện đã cũ
                    </div>
                    <div class="duongke"></div>
                </div>
                <div class="mottram tapdoanegroup">
                  <div class="nammuoi">
                    <p><img src="images/logo2.png" alt="">Tập đoàn Egroup</p>
                  </div>
                  <div class="nammuoi">
                    <p class="thoigian_p">24/08/2017</p>
                  </div>
                </div>
              </div>
            
          </div>
      </div>
    </div>
  </div>
</div>  
<!-- bat dau dang ky email -->
@endsection
