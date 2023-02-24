<?php

namespace App\Http\Controllers;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use RealRashid\SweetAlert\Facades\Alert;


use Session;
use Stripe;
class HomeController extends Controller
{
    public function redirect()
    {
     $usertype=Auth::user()->usertype;
     if($usertype==1)
     {
      $total_product=Product::all()->count();
      $total_order=Order::all()->count();
      $order=Order::all();
      $total_revenue=0;
      foreach($order as $order){
        $total_revenue=$total_revenue + $order->price;

      }
      $total_deliverd=Order::where('delivary_status','=','delivered')->count();
      $total_processing=Order::where('delivary_status','=','Processing')->count();

      
    return  view('admin.home',compact('total_product','total_order','total_revenue','total_deliverd','total_processing'));
     }
     else{
      $product=Product::Paginate(6);
      $comment=Comment::All();
      return view('home.userpage',compact('product','comment'));
     }
    }

    public function index()
    {
      $product=Product::Paginate(6);
      $comment=Comment::All();
      return view('home.userpage',compact('product','comment'));
    }
    public function productdetails($id)
    {
      $productr=Product::find($id);
     
      return view('home.product_details',compact('productr'));
    }
    public function addcart(Request $request,$id)
    {
      if(Auth::id()){
        $user=Auth::user();
        $userid=$user->id;
        $product=Product::find($id);
        $product_exit_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
        if($product_exit_id){
          $cart=cart::find($product_exit_id)->first();
          $quantity=$cart->quantity;
          $cart->quantity=$quantity + $request->quantity;
          if($product->discount_price!=null){
            $cart->price=$product->discount_price * $cart->quantity;
  
          }else{
            $cart->price=$product->price * $cart->quantity;
  
          }
          $cart->save();
          Alert::success('Product Added Successfully','We have added Product To the cart');
          return redirect()->back();



        }else{
          $cart=new cart;
          $cart->name=$user->name;
          $cart->email=$user->email;
          $cart->phn=$user->phone;
          $cart->address=$user->address;
          $cart->user_id=$user->id;
  
          $cart->product_title=$product->title;
          $cart->image=$product->image;
          if($product->discount_price!=null){
            $cart->price=$product->discount_price * $request->quantity;
  
          }else{
            $cart->price=$product->price * $request->quantity;
  
          }
         
          $cart->product_id=$product->id;
          $cart->quantity=$request->quantity;
          $cart->save();
          Alert::success('Product Added Successfully','We have added Product To the cart');
          return redirect()->back();

        }
       
      }
      else{
        return redirect('login');
      }
    }
    public function showcart()
    {
      if(Auth::id()){  
      $id=Auth::user()->id;
      $cart=cart::where('user_id','=',$id)->get();
      return view('home.show_cart',compact('cart'));
    }else{
      return redirect('login');
    }
    }
    public function removecart($id)
    {
      $cart=Cart::find($id);
      
        $cart->delete();
        // Alert::question('Are you sure ?','Are You sure to remove this?');
        return redirect()->back();
    }
   
    public function cash_order()
    {
      $user=Auth::user();
      $userid=$user->id;

      $data=Cart::where('user_id','=',$userid)->get();
      foreach($data as $data){
        $order=new order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phn;
        $order->address=$data->address;
        $order->user_id=$data->user_id;


        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->product_id=$data->product_id;
        $order->image=$data->image;
        $order->payment_status='Cash On Delivary';
        $order->delivary_status='Processing';
        $order->save();


      }
      $data=Cart::where('user_id','=',$userid)->delete();

      Alert::success('We have Receive Your Order', 'We Will Contact with you soon');

      return redirect()->back();

    }
    public function stripe($totalprice)
    {
      return view('home.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request,$totalprice)
    {
      
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks For Payment" 
        ]);
        $user=Auth::user();
        $userid=$user->id;
  
        $data=Cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
          $order=new order;
          $order->name=$data->name;
          $order->email=$data->email;
          $order->phone=$data->phn;
          $order->address=$data->address;
          $order->user_id=$data->user_id;
  
  
          $order->product_title=$data->product_title;
          $order->price=$data->price;
          $order->quantity=$data->quantity;
          $order->product_id=$data->product_id;
          $order->image=$data->image;
          $order->payment_status='Paid';
          $order->delivary_status='Processing';
          $order->save();
        }
        $data=Cart::where('user_id','=',$userid)->delete();
        Session::flash('success', 'Payment successful!');
        return back();
      }  
      public function show_order()
      {
        if(Auth::id()){
          $user=Auth::user();
          $userid=$user->id;
          $order=Order::where('user_id','=',$userid)->get();
          
          return view('home.order',compact('order'));
        }
        else{
          return redirect('login');
        }
      }
      public function cancel_order($id)
      {
        Alert::question('Sure?','Are You Sure To cancel Order');
        $order=Order::find($id);
        $order->delivary_status="Order has been Cancelled";
        $order->save();
        // Alert::success('Your Order Has beedn canceled ','Successfully');


        return redirect()->back();
      }
      public function add_comment(Request $request)
      {
        if(Auth::id()){
          $comment=new Comment;
          //first name = textfield =auth::user()->auth table name
          $comment->name=Auth::user()->name;
          $comment->user_id=Auth::user()->id;
          $comment->comment=$request->comment;
          $comment->save();
          return redirect()->back();

        }else{
          return redirect('login');
        }
        
      }
      public function product_search(Request $request)
      {
        $product=Product::Paginate(6);
        $comment=comment::orderby('id','desc')->get();
      $comment=Comment::All();
        if($searchText=$request->search){

        
        $product=Product::where('title','LIKE',"%$searchText%")->orwhere('price','LIKE',"%$searchText%")->orwhere('discount_price','LIKE',"%$searchText%")
        ->orwhere('description','LIKE',"%$searchText%")->orwhere('catagory','LIKE',"$searchText")->paginate(10);
        return view('home.userpage',compact('product','comment'));
      }else{
        return redirect()->back()->with('message','No Product Found');
      }
      }
      public function all_product(Request $request){
        $product=Product::Paginate(6);
        $comment=comment::orderby('id','desc')->get();
      $comment=Comment::All();
        return view('home.all_product',compact('product','comment'));

      }

      public function search_product(Request $request)
      {
        $product=Product::Paginate(6);
        $comment=comment::orderby('id','desc')->get();
      $comment=Comment::All();
        if($searchText=$request->search){

        
        $product=Product::where('title','LIKE',"%$searchText%")->orwhere('price','LIKE',"%$searchText%")->orwhere('discount_price','LIKE',"%$searchText%")
        ->orwhere('description','LIKE',"%$searchText%")->orwhere('catagory','LIKE',"$searchText")->paginate(10);
        return view('home.all_product',compact('product','comment'));
      }else{
        return redirect()->back()->with('message','No Product Found');
      }
      }
      
      
}
 