@foreach($data as $k=>$val)
<tr>
<td>{{$k +1}}</td>
<td>{{$val->error_code}}</td>
<td> 
<?php 
    
    $darr = explode(",", $val->day_of_week); 
      if(isset($darr))
  {
    foreach($darr as $v)
    {
        if($v==1)
        {
            echo 'Chủ nhật<br>';
        }
        if($v==2)
        {
            echo 'Thứ hai<br>';
        }
        if($v==3)
        {
            echo 'Thứ ba<br>';
        }
        if($v==4)
        {
            echo 'Thứ tư<br>';
        }
        if($v==5)
        {
            echo 'Thứ năm<br>';
        }
        if($v==6)
        {
            echo 'Thứ sáu<br>';
        }
        if($v==7)
        {
            echo 'Thứ bảy';
        }
    }
  }else
  {
    echo 'null';
  }
?>
</td>
<td>  
    <?php 
      $d2Ex = explode("-", $val->hour_of_day); 
      $daoArr = array_reverse($d2Ex);
      echo 'Từ '.$d2Ex[0].'h';
      echo " -";
      echo  $daoArr[0] .'h';
    ?>
</td>
<td>  {{$val->limited_value}}</td>
<td>  {{$val->level}}</td>
<td> 
 <span>User:{{$val->user}}</span>
<br>
<span>Time: {{date('d-m-Y H:i:s',strtotime($val->time))}}</span>
</td>
<td>
    <p align="left">
          <button class="btn btn-warning btnedit" data-toggle="modal" data-target="#modalfixError" data ="{{$val}}" start ="<?php 
          $d2Ex = explode(",", $val->hour_of_day); 
          echo $d2Ex[0];  
          ?>" end=" <?php 
          $d2Ex = explode(",", $val->hour_of_day); 
          $daoArr = array_reverse($d2Ex);
          echo  $daoArr[0];
          ?>" >
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </button>

      @if(Auth::user()->level==2)
       <button  class="btn btn-danger DeleteCb" dataid ="{{$val->id}}">
       <i class="fa fa-trash-o" aria-hidden="true"></i>  
      </button> 
      @elseif(Auth::user()->level==1)
       <button  class="btn btn-danger"  onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
       <i class="fa fa-trash-o" aria-hidden="true"></i>  
      </button>
      @elseif(Auth::user()->level==1)
       <button  class="btn btn-danger" onclick="return confirm('Bạn không đủ quyền thực hiện chức năng này ?');">
       <i class="fa fa-trash-o" aria-hidden="true"></i>  
      </button>
      @endif

    </p>
</td>
@endforeach