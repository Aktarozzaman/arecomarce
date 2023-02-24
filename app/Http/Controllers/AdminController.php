<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Requst;
use Illuminate\Support\Facades\Auth;

use DB;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;
class AdminController extends Controller
{
    public function view_catagory()
    {
        if(Auth::id()){
            $data=catagory::all();
       return view('admin.catagory',compact('data'));
        }else{
            return redirect('login');
        }
        
    }
    
    public function add_catagory(Request $request)
    {
        if(Auth::id()){
        $data=new Catagory;
        $data->catagory_name=$request->catagory;
        $data->save();
        return  redirect()->back()->with('message','Catagory Added Successfully');

        }else{
            return redirect('login');
        }
        

    }
    public function delete_catagory($id)
    {
        if(Auth::id()){
        $data=catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message','Succesfully Deleted');
        }else{
            return redirect('login');
        }
        
    }
    public function add_product()
    {
        if(Auth::id()){
            $catagory=catagory::all();
            return view('admin.product',compact('catagory'));
        }else{
            return redirect('login');
        }
        
    }

   
    public function test(Request $request)
    {
        if(Auth::id()){
        $product=new Product;
        $product->title=$request->title;
        $product->description=$request->discription;
        $product->quantity=$request->quantity;
       $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;
    if($request->file('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/product'), $filename);
        $product['image']= $filename;
    }
        $product->save();
        return  redirect()->back()->with('message','Product Added Successfully');

        }else{
            return redirect('login');
        }
        
        
    }


    public function view_product()
    {
        if(Auth::id()){
        $data=Product::all();
       return view('admin.view_product',compact('data'));
        }else{
            return redirect('login');
        }
        

    }


    public function delete_product($id)
    {
        if(Auth::id()){
            $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Succesfully Deleted');
            
        }else{
            return redirect('login');
        }
        
    }
    public function updateproduct( $id)
    {
        if(Auth::id()){
            $data=product::find($id);
            $catagory=Catagory::all();
            return view('admin.update_product',compact('data','catagory'));
        }else{
            return redirect('login');
        }
       
    }
    public function storeproduct(Request $request, $id)
    {
        if(Auth::id()){
            $product=Product::find($id);
        
            $product->title=$request->title;
            $product->description=$request->discription;
            $product->quantity=$request->quantity;
            $product->price=$request->price;
            $product->discount_price=$request->dis_price;
            $product->catagory=$request->catagory;
           if($request->file('image')){
               $file= $request->file('image');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('/product'), $filename);
               $product['image']= $filename;
           }
               $product->save();
               
               return  redirect()->back()->with('message','Product Added Successfully');

        }else{
            return redirect('login');
        }
       
    }
    public function order()
    {
        if(Auth::id()){
            $order=Order::all();
            return view('admin.order',compact('order'));
        }else{
            return redirect('login');
        }
       
    }
    public function delivered($id)
    {
        if(Auth::id()){
            $delivered=Order::find($id);
        if($delivered->delivary_status=='delivered'){
            return redirect()->back()->with('success','This Product Already Delivered');
        }else{  
        $delivered->delivary_status="delivered";
        $delivered->save();
        return redirect()->back()->with('success','Product Successfully delivared');

        }
        
    }else{
        return redirect('login');
    }
    }
    public function deletep($id)
    {
        if(Auth::id()){
            $data=Order::find($id);
        $data->delete();
        return redirect()->back()->with('success','Succesfully Deleted');

        }else{
            return redirect('login');
        }
        
    }
    public function print($id)
    {
        if(Auth::id()){
        $order=Order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');

        }else{
            return redirect('login');
        }
        
        
        
    }
    public function sendmail($id)
    {
        if(Auth::id()){
            $order=Order::find($id);
            return view('admin.send_email',compact('order'));

        }else{
            return redirect('login');
        }
       
    }
    public function send_user_email(Request $request,$id)
    {
        if(Auth::id()){
            $order=Order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>'Click Me',
            // 'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order ,new SendEmailNotification($details));
        return redirect()->back()->with('success','Succesfully Send Email');

        }else{
            return redirect('login');
        }
        
    }
    public function search(Request $request)
    {
        if(Auth::id()){
            $searchText=$request->search;
        $order=Order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('order'));

        }else{
            return redirect('login');
        }
        
       
    }

}
