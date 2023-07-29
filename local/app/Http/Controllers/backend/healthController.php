<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HealthModel;
use App\processModel;
use DB,Auth,Validator;
use App\User; 
use App\historyerror;
use Carbon\Carbon;
use App\alertmapping;

class healthController extends Controller
{
    public function getlist()
    {
    	$data = HealthModel::orderBy('id','desc')->get();

        $data = DB::table('hw_spec_detail')
            ->leftJoin('process', 'hw_spec_detail.process_code', '=', 'process.process_id')
            ->select('hw_spec_detail.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();
        //dd($data);
        $process = processModel::orderBy('process_id','desc')->get();
        return view('backend.health.list', compact('data','process'));
    }
    public function getadd($itemjson)
    {   
    	$item_base64 = base64_decode($itemjson);
    	$item = json_decode($item_base64);
        //dd($item);


        $data = new HealthModel;
        $data->ip_sour = $item->ip_sour;
        $data->ip_dest = $item->ip_dest;
        $data->cpu_usage =  $item->cpu_usage;
        $data->cpu_flag =  $item->cpu_flag;
        $data->ram_usage =  $item->ram_usage;
        $data->ram_flag =  $item->Ram_flag;
        $data->disk_path =  $item->disk_path;
        
        $data->disk_usage = $item->disk_usage;
        $data->disk_flag = $item->Disk_flag;
        $data->max_file_size = 2222;
        
        $data->size_flag =0;
        $data->process_code =  $item->process_code;
       
        $data->user_name =  $item->user_name;
        $data->password =  $item->password;
        $data->port_dest =  $item->port_dest;
        $data->user = Auth::user()->name;

        $data->proc_usage = $item->proc_usage;
        $data->proc_flag = $item->Prog_flag;
        $data->mod_time_path = $item->mod_time_path;
        $data->mod_time_usage = $item->mod_time_usage;
        $data->mod_time_flag = $item->mod_time_flag;    
        $data->save();

        $data2 = DB::table('hw_spec_detail')
            ->leftJoin('process', 'hw_spec_detail.process_code', '=', 'process.process_id')
            ->select('hw_spec_detail.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

        return view('backend.health.add', compact('data2'));
    }
    public function getupdate($itemjson)
    {	
    	 $item_base64 = base64_decode($itemjson);
         $itemdecode = json_decode($item_base64);
    	 $data = HealthModel::find($itemdecode->id);

    	 $data->ip_sour = $itemdecode->ip_sour;
         $data->ip_dest = $itemdecode->ip_dest;
         $data->port_dest =  $itemdecode->port_dest;
         $data->cpu_usage =  $itemdecode->cpu_usage;
         $data->ram_usage =  $itemdecode->ram_usage;
         $data->disk_usage = $itemdecode->disk_usage;

         $partern = urldecode($itemdecode->partern);

         $data->partern =  $partern;
         if($itemdecode->max_file_size =='')
         {
         	 $data->max_file_size = 0;
         }else
         {
         	 $data->max_file_size = $itemdecode->max_file_size;
         }
       
        $data->user_name =  $itemdecode->user_name;
        $data->password =  $itemdecode->password;
        $data->active =  $itemdecode->active;
        $data->process_code =  $itemdecode->process_code;
        $data->user = Auth::user()->name;
        $data->save();

         $data2 = DB::table('hw_spec_detail')
            ->leftJoin('process', 'hw_spec_detail.process_code', '=', 'process.process_id')
            ->select('hw_spec_detail.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();

        return view('backend.health.edit', compact('data2'));
    }
    
    public function getdelete($id)
    {
    	 $error = HealthModel::find($id);
         $error->delete();
         $data = DB::table('hw_spec_detail')
            ->leftJoin('process', 'hw_spec_detail.process_code', '=', 'process.process_id')
            ->select('hw_spec_detail.*', 'process.process_name', 'process.tag')
            ->orderBy('id','desc')
            ->get();
         return view('backend.health.delete', compact('data'));
    }
    public function getactive($ac, $id)
    {
          DB::table('hw_spec_detail')
                ->where('id', $id)
                ->update(['active' => $ac]);
         $data = DB::table('hw_spec_detail')->select('active','id')->where('id', $id)->first();
         return view('backend.health.ajaxactive', compact('data'));
    }

}
