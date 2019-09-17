<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Post\CreatePostRequest;
use App\Notifications\CancelOrderAdded;
use App\Notifications\ConfirmOrderAdded;
use App\Notifications\DeliverOrderAdded;
use App\Notifications\NewOrderAdded;
use App\placeOrder;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       // $post=Post::find($id);
        $users=placeOrder::where('post_id',$id)->get();
        return view('Chef.orderList',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request, Post $p)
    {
        $post_id=request('Post_Id');
         placeOrder::create([
        'quantity'=>request('Quantity'),
        'price'=>request('Price'),
        'address'=>request('Address'),
        'phone'=>request('Phone'),
        'user_id'=>Auth::id(),
        'post_id'=>request('Post_Id'),
        'confirm'=>false,
        'deliver'=>false,
    ]);

        $post=Post::find($post_id);
        $left=$post->order_left-(request('Quantity'));
        $post->update([
            'menu_for'=>$post->menu_for,
            'image'=>$post->image,
            'details'=>$post->details,
            'max_order'=>$post->max_order,
            'price'=>$post->price,
            'ended_at'=>$post->ended_at,
            'user_id'=>$post->user_id,
            'order_left'=>$left,

        ]);
        //$orderPlace->user()->notify(new NewOrderAdded($orderPlace));
        //dd($p->chef()->id);
        $p->chef->notify(new NewOrderAdded($p));
       //Auth::user()->notify(new NewOrderAdded($p));

        if(auth()->user()->isUser()){
            // dd(Auth::id());
            return redirect()->action('User\UserController@UserProfile',Auth::id());
        }
        return redirect()->action('Chef\ChefController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,$flag, placeOrder $order)
    {
        $order=placeOrder::find($id);
        $order->update([
            'quantity'=>$order->quantity,
            'price'=>$order->price,
            'address'=>$order->address,
            'phone'=>$order->phone,
            'user_id'=>$order->user_id,
            'post_id'=>$order->post_id,
            'confirm'=>true,
            'deliver'=>$flag=="deliver"?true:false,

        ]);
        if($flag=="deliver"){
            $order->customer->notify(new DeliverOrderAdded($order));
        }
        else
        {
            $order->customer->notify(new ConfirmOrderAdded($order));
        }

        return redirect()->action('User\PlaceOrderController@index',$order->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,placeOrder $order)
    {
        $orders=placeOrder::find($id);

        $deletedRows = placeOrder::where('id', $id)->delete();
        $order->customer->notify(new CancelOrderAdded($order));

        $post=Post::find($orders->post_id);
        $left=$post->order_left+$orders->quantity;
        $post->update([
            'menu_for'=>$post->menu_for,
            'image'=>$post->image,
            'details'=>$post->details,
            'max_order'=>$post->max_order,
            'price'=>$post->price,
            'ended_at'=>$post->ended_at,
            'user_id'=>$post->user_id,
            'order_left'=>$left,
            'item_name'=>$post->item_name,
            'chef_name'=>Auth::user()->name

        ]);

        return redirect()->action('User\PlaceOrderController@index',$order->post_id);
    }
}
