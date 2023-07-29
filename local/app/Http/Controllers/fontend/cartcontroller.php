<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;
use Mail;
use App\productmodel;

class cartcontroller extends Controller
{
    public function getaddcart($id)
    {
    	$product = productmodel::find($id);
        //dd($product);
    	Cart::add(['id' => $id, 'name' => $product->pro_name, 'qty' => 1, 'price' => $product->pro_price, 'options' => [
    		'img' => $product->pro_img]]);
        //$data = Cart::content();
        //dd($data);
        //dd($$data = Cart::content();)
    	return redirect('cart/show');
    	//dd($product);
    	//$data = Cart::content();
    	//dd($data);
    }
    public function cartshow()
    {
        $total = Cart::total();
    	$data = Cart::content();
        //dd($data);
    	return view('fontend.cart.show', compact('data','total'));
    }
    public function cartdelete($rowid)
    {
        if($rowid=='all')
        {
            Cart::destroy();
        }else{
            Cart::remove($rowid);
        }
        return back();

    }
    public function cartupdate(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

    }
    public function getcomplate(){
        return view('fontend.cart.complatecart');
    }
   public function postmail(Request $request)
    {
        $data['infor'] = $request->all();
        $data['total'] = Cart::total();
        $data['content'] = Cart::content();
       //dd($data['content']);
        //dd( $data['infor']);
        $email = $request->email;
        Mail::send('fontend.cart.email', $data, function($msg) use ($email)
        {
            $msg->from('quoclapvanvan@gmail','Quoclap');// mail gui
            $msg->to($email, $email);// mail nhan, ten mail
            $msg->cc('laptrinh678@gmail.com','Quoclap');
            $msg->subject('Xác nhận hóa đơn mua hàng Fasamy Shop');

        });
        Cart::destroy();
         return redirect('mua-hang-thang-cong.html');

        
    }
    
}
