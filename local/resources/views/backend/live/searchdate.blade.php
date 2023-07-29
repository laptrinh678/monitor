<!-- <table class="table table-bordered">
  <thead>
    <tr>
      <th>Mã lỗi</th>
      <th>Level</th>
      <th>Value/LimitedValue</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->error}}</td>
      <td>{{$v->level}}</td>
      <td>{{$v->value}}/{{$v->limited_value}}</td>
    </tr>
    @endforeach
  </tbody>
</table> -->

<table class="table2excel table-bordered" data-tableName="Test Table 2" >
      <thead>
        <tr class="noExl">
          <td>Mã lỗi</td>
          <td>Level</td>
         <td>Value/LimitedValue</td>
         <td>Time</td>
        </tr>
      
      </thead>
      <tbody>
        @foreach($data as $v)
        <tr>
          <td>{{$v->error}}</td>
          <td>{{$v->level}}</td>
          <td>{{$v->value}}/{{$v->limited_value}}</td>
          <td>{{date('d-m-Y H:i:s',strtotime($v->time))}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <button class="exportToExcel btn btn-success">Lưu file Excel</button>