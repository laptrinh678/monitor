<?php
namespace App\Http\Controllers\backend\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cateproductmodel;
use App\productmodel;
use File,DateTime,DB;
class productcontroller extends Controller
{
    public function getlist()
    {
        $listproduct = productmodel::all();
        //$listcateproduct = cateproductmodel::all()->toArray();
       // dd($listcateproduct); die();
        return view('backend.product.listpro.list', compact('listproduct'));
    }
    public function getadd()
    {
    	 $cat = cateproductmodel::all();
       $catcha = cateproductmodel::where('parent_id',0)->get();
       //dd($catcha);
        //dd($data);
       return view('backend.product.listpro.add',compact('cat','catcha'));
    }
    public function postadd(Request $request)
    {
      $id_cat = substr($request->cat_id,0,2);
      $cat_slug = substr($request->cat_id,3,300);

      $mausac = $request->mausac;
      //dd($mausac);
      $kichthuoc= $request->kichthuoc;
      //dd($cat_slug); die();

      $product = new productmodel;
      $product->pro_name = $request->pro_name;
      $product->cat_id = $id_cat;
      $product->cat_slug = $cat_slug;
      

      ///$product->title = $request->title;
      //dd($product); die();
      $product->pro_slug = str_slug($request->pro_name);

      //$product->pro_gtngan = $request->description1;
      //$product->pro_gtchitiet = $request->description2;
      $product->description3 = $request->description3;
      $product->catcha = $request->catcha;
      //dd( $product->catcha);
      //$product->description4 = $request->description4;
      $product->link= $request->link;
      $product->metatab= $request->metatab;
      $product->metadescription=$request->metadescription;
      $product->pro_price = $request->pro_price;
      $product->pro_masp = $request->pro_masp;

      $product->mausac = json_encode($mausac);
      $product->kichthuoc = json_encode($kichthuoc);
      $product->title = $request->title;
      //$product->pro_phukien = $request->pro_phukien;
      //$product->pro_baohanh = $request->pro_baohanh;
      //$product->pro_khuyenmai = $request->pro_khuyenmai;
     $product->pro_trangthai = $request->pro_trangthai;
     // $product->pro_tinhtrang = $request->pro_tinhtrang;
     // $product->pro_xuatxu = $request->pro_xuatxu;
      $product->pro_noibat = $request->pro_noibat;
      $product->online = $request->online;
      //dd($product); die();
      // xử lý ảnh
       if($request->hasFile('pro_img'))
       {
         $file_Img = $request->file('pro_img');
            $name_Img = $file_Img->getClientOriginalName();
            $str_name_img = str_random(5)."-".$name_Img;
            while (file_exists('public/backend/product/'.$str_name_img)) 
            {
            $str_name_img = str_random(5)."-".$name_Img;
            }
            $file_Img->move('public/backend/product/',$str_name_img);
            $product->pro_img = $str_name_img;
       }else
       {
            $product->pro_img = '';
       }
     
      // ket thuc xu ly anh 1
      // bat dau xu ly anh 2
     if($request->hasFile('pro_img2'))
     {
       $file_Img2 = $request->file('pro_img2');
            $name_Img2 = $file_Img2->getClientOriginalName();
            $str_name_img2 = str_random(5)."-".$name_Img2;
            while (file_exists('public/backend/product/'.$str_name_img2)) 
            {
            $str_name_img2 = str_random(5)."-".$name_Img2;
            }
            $file_Img2->move('public/backend/product/',$str_name_img2);
            $product->pro_img2 = $str_name_img2;
     }else
     {
             $product->pro_img2 = '';
     }
      // ket thuc xu ly anh 2 4/2/2018 tvqg
      $product->save();
     return redirect('admin/product/listpro/list')->with('addproductsucess','Thêm sản phẩm thành công');

    }
    public function getedit($id)
    {
        $cat = cateproductmodel::all();
        $catcha = cateproductmodel::where('parent_id',0)->get();
        $productId = productmodel::find($id);

        //dd($data);
       return view('backend.product.listpro.edit',compact('cat','productId','catcha'));
    }
    public function postedit(Request $request, $id)
    {
        $id_cat = substr($request->cat_id,0,2);
        $cat_slug = substr($request->cat_id,3,300);
        $mausac = $request->mausac;
        $kichthuoc = $request->kichthuoc;
        //dd($mausac,$kichthuoc ); 

        $product = productmodel::find($id);
        $product->pro_name = $request->pro_name;
        $product->cat_id = $id_cat;
        $product->cat_slug = $cat_slug;
        $product->pro_slug = str_slug($request->pro_name);
        $product->pro_gtngan = $request->description1;
        $product->pro_gtchitiet = $request->description2;
        $product->description3 = $request->description3;
        $product->description4 = $request->description4;
        $product->link= $request->link;
        $product->metatab= $request->metatab;
        $product->metadescription=$request->metadescription;
        $product->pro_price = $request->pro_price;

        $product->kichthuoc = json_encode($kichthuoc);
        $product->mausac = json_encode($mausac);

        $product->title = $request->title;
        $product->catcha = $request->catcha;
        //$product->pro_newprice = $request->pro_newprice;
        //$product->pro_sale = $request->pro_sale;
       //$product->pro_phukien = $request->pro_phukien;
       // $product->pro_baohanh = $request->pro_baohanh;
        //$product->pro_khuyenmai = $request->pro_khuyenmai;
      //  $product->pro_trangthai = $request->pro_trangthai;
        //$product->pro_tinhtrang = $request->pro_tinhtrang;
      //  $product->pro_xuatxu = $request->pro_xuatxu;
        $product->pro_noibat = $request->pro_noibat;
        $product->online = $request->online;
  
        // /*  b1 lấy ảnh cũ*/
         $old_product                = 'public/backend/product/'. $product->pro_img;// ten cot trong bang du lieu nhe
         // b2 /*  xử lý lấy ảnh mới để insert vào database và lưu vào thư mục chứa ảnh trong cms*/
        if($request->hasFile('pro_newimg'))//kiểm tra file ảnh mới có tồn tại không//
        {   // lấy file ảnh//
            $file_pro_newimg = $request->file('pro_newimg');
            //dd($file_pro_newimg); die(); để có được file cho upload//
            $name_pro_newimg = $file_pro_newimg->getClientOriginalName();
            ////dd($name_pro_newimg); die(); lấy được đúng cái tên ảnh để chuẩn bị cho vào upload
            $str_name_pro_newimg = str_random(5)."-".$name_pro_newimg;
            ////dd($str_name_pro_newimg); die(); mã hóa cái tên ảnh đi cho nó đỡ bị trùng ảnh
            while (file_exists('public/backend/product/'.$str_name_pro_newimg)) 
            {
            $str_name_pro_newimg = str_random(5)."-".$name_pro_newimg;
            }
            $file_pro_newimg->move('public/backend/product/',$str_name_pro_newimg);
            $product->pro_img = $str_name_pro_newimg;
            // /*xoa ảnh product cũ*///
            if(File::exists($old_product)){
            File::delete($old_product);
            }

        }
        // bat dau xu ly anh thu 2
          $old_product2                = 'public/backend/product/'. $product->pro_img2;// ten cot trong bang du lieu nhe
         // b2 /*  xử lý lấy ảnh mới để insert vào database và lưu vào thư mục chứa ảnh trong cms*/
        if($request->hasFile('pro_newimg2'))//kiểm tra file ảnh mới có tồn tại không//
        {   // lấy file ảnh//
            $file_pro_newimg2 = $request->file('pro_newimg2');
            //dd($file_pro_newimg); die(); để có được file cho upload//
            $name_pro_newimg2 = $file_pro_newimg2->getClientOriginalName();
            ////dd($name_pro_newimg); die(); lấy được đúng cái tên ảnh để chuẩn bị cho vào upload
            $str_name_pro_newimg2 = str_random(5)."-".$name_pro_newimg2;
            ////dd($str_name_pro_newimg); die(); mã hóa cái tên ảnh đi cho nó đỡ bị trùng ảnh
            while (file_exists('public/backend/product/'.$str_name_pro_newimg2)) 
            {
            $str_name_pro_newimg2 = str_random(5)."-".$name_pro_newimg2;
            }
            $file_pro_newimg2->move('public/backend/product/',$str_name_pro_newimg2);
            $product->pro_img2 = $str_name_pro_newimg2;
            // /*xoa ảnh product cũ*///
            if(File::exists($old_product2)){
            File::delete($old_product2);
            }

        }

        // ket thuc xu ly anh thu 2
        $product->updated_at    = new DateTime();
        $product->save();
        return redirect('admin/product/listpro/list')->with('editproductsuccess','Sửa sản phẩm thành công');
    }
    public function getdelete($id)
    {
       $productid = productmodel::find($id);
       $productid->delete();
       return redirect('admin/product/listpro/list')->with('deleteproductsuccess','Xóa sản phẩm thành công');

    }
    public function getsearch(Request $request)
    {
        $value = $request->valude_search;
        $data['value']=$value;
        $str = str_replace('', '%', $value);// chuc nang 
        $data['product'] = DB::table('product')->where('pro_name','like','%'.$str.'%')->paginate(5);
       // dd($data['product']); die();   
       return view('backend.product.listpro.search',$data);
    }
    /* chức năng quản lý phần bình luận */
    public function getcomment()
    {
       return view('backend.product.comment.list');
    }
}
