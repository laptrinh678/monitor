 <button data="{{$data->statusmess}}" class="btn statusMe @if($data->statusmess==1){{'btn-primary'}}@else{{'btn-info'}}@endif" dataid="{{$data->id}}" >@if($data->statusmess==1){{'SEND'}}@else{{'OFF'}}@endif</button>