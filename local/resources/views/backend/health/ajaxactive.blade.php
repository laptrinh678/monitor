 <button data="{{$data->active}}" class="btn activebt @if($data->active==1){{'btn-success'}}@else{{'btn-danger'}}@endif" dataid="{{$data->id}}" >@if($data->active==1){{'ON'}}@else{{'OFF'}}@endif</button>