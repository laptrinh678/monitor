<?php
namespace App\Http\Controllers\backend\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\backend\cateProduct\addrequest;
use App\cateproductmodel;
use File,DateTime, DB;
class cateController extends Controller
{
    public function getlist()
    {
        $cat= cateproductmodel::all();
    	return view('backend.product.category.list', compact('cat'));
    }
    public function getadd()
    {
        $cat = cateproductmodel::all();
    	return view('backend.product.category.add',compact('cat'));
    }
    public function postadd(Request $request)
    {
       $cat = new cateproductmodel;
            $cat->cat_name = $request->cat_name;

            $cat->cat_slug = str_slug($request->cat_name);

            $cat_id = substr($request->parent,0,2);
            $cat->parent_id = $cat_id;
            //$cat_slug = substr($request->parent,3,30);
           // $cat->cat_slug = $cat_slug;

            $cat->cat_gtngan = $request->description1;
            $cat->title = $request->title;
            $cat->tukhoa = $request->tukhoa;
            $cat->mota = $request->mota;
            $cat->cat_gtchitiet = $request->description2;
           
         
            ///* lay anh icon*/ doi khi trong nhung project khac nhau danh muc co ca anh dm va icon dm
            if($request->hasFile('cat_icon'))
            {
                $file_Icon = $request->file('cat_icon');
                $name_Icon = $file_Icon->getClientOriginalName();
                $str_name_icon = str_random(5)."-".$name_Icon;
                while (file_exists('public/backend/product/'.$str_name_icon)) 
                {
                $str_name_icon = str_random(5)."-".$name_Icon;
                }
                $file_Icon->move('public/backend/product/',$str_name_icon);
                $cat->cat_icon = $str_name_icon;
            }
            
              ///* lay anh danh muc*/
            if($request->hasFile('cat_img'))
            {
                 $file_Img = $request->file('cat_img');
                $name_Img = $file_Img->getClientOriginalName();
                $str_name_Img = str_random(5)."-".$name_Img;
                while (file_exists('public/backend/product/'.$str_name_Img)) 
                {
                $str_name_Img = str_random(5)."-".$name_Img;
                }
                $file_Img->move('public/backend/product/',$str_name_Img);
                $cat->cat_img = $str_name_Img;
            }
          
            //dd($cat);
            
            // insert vào data 9h18 tối 21/10/2017 
            $cat->save();
            return redirect('admin/product/cate/list')->with('addcate','Thêm danh mục thành công');
      
    }
    public function getedit($id)
    {
        $cat    = cateproductmodel::find($id);
        $parent = cateproductmodel::all();
        return view('backend.product.category.edit',compact('cat','parent'));
    }
    public function postedit(Request $request, $id)
    {
        $cat = cateproductmodel::find($id);
        $cat->cat_name = $request->cat_name;
        $cat->cat_slug = str_slug($request->cat_name);
        $cat_id = substr($request->parent,0,2);
        $cat->parent_id = $cat_id;

        //$cat_slug = substr($request->parent,3,30);
       // $cat->cat_slug = $cat_slug;

        $cat->cat_gtngan = $request->description1;
        $cat->title = $request->title;
        $cat->tukhoa = $request->tukhoa;
        $cat->mota = $request->mota;
        $cat->cat_gtchitiet = $request->description2;
        // /*lấy ảnh icon cũ*///
       $old_icon                = 'public/backend/product/'. $cat->cat_icon;
        if($request->hasFile('new_cat_icon'))
        {
            $file_new_Icon = $request->file('new_cat_icon');
            $name_new_Icon = $file_new_Icon->getClientOriginalName();
            $str_name_new_icon = str_random(5)."-".$name_new_Icon;
            while (file_exists('public/backend/product/'.$str_name_new_icon)) 
            {
            $str_name_new_icon = str_random(5)."-".$name_new_Icon;
            }
            $file_new_Icon->move('public/backend/product/',$str_name_new_icon);
            $cat->cat_icon = $str_name_new_icon;
            // /*xoa ảnh icon cũ*///
           if(File::exists($old_icon)){
            File::delete($old_icon);
            }

        }
        //// bắt đầu lấy ảnh icon////
       $old_img = 'public/backend/product/'. $cat->cat_img;
         //dd($old_img);  die();
        if($request->hasFile('new_cat_img'))
        {
          $file_new_Img = $request->file('new_cat_img');
            //kết quả dd($file_new_Img) slider_4.jpg
           $name_new_Img = $file_new_Img->getClientOriginalName();
            //dd($name_new_Img); die(); "slider_4.jpg"
           $str_name_new_Img = str_random(5)."-".$name_new_Img;
           // /*dd($str_name_new_Img); die(); "CrPny-slider_4.jpg"*/
            while (file_exists('public/backend/product/'.$str_name_new_Img)) 
            {
            $str_name_new_Img = str_random(5)."-".$name_new_Img;
            }
            $file_new_Img->move('public/backend/product/',$str_name_new_Img);
            $cat->cat_img = $str_name_new_Img;
            if(File::exists($old_img)){
            File::delete($old_img);
            }
        }

        $cat->updated_at    = new DateTime();
        $cat->save();
        return redirect('admin/product/cate/list')->with('editcatsuccess','Sửa danh mục thành công');
        
    }
    public function getdelete($id)
    {
        $kiemTra = cateproductmodel::where('parent_id',$id)->count();
        //dd($kiemTra); die();
        if($kiemTra > 0)
        {
            return redirect()->back()->with('errCatedelete','Bạn không thể xóa danh mục này do còn có danh mục con, bạn cần xóa hết các danh mục con mới xóa được danh mục này');
        }
        else
        {
            $cat = cateproductmodel::find($id);
            $cat->delete();
            return redirect('admin/product/cate/list')->with('sucessCateDele','Bạn đã xóa danh mục này thành công');
        }

    }
    /* chuc nang tim kiem danh muc san pham toi xuan dai 17/12/2018 */
     public function getsearch(Request $request)
    {
        $value = $request->valude_search;
        $data['value']=$value;
        $str = str_replace('', '%', $value);// chuc nang 
        $data['cat'] = DB::table('cateproduct')->where('cat_name','like','%'.$str.'%')->paginate(5);
       // dd($data['product']); die();   
       return view('backend.product.category.search',$data);
    }
}
