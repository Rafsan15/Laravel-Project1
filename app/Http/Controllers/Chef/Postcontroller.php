<?php

namespace App\Http\Controllers\Chef;

use App\Http\Requests\Post\CreatePostRequest;
use App\Items;
use App\Notifications\NewOrderAdded;
use App\placeOrder;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Chef.Post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request, Post $post)
    {
        $image=$request->Image->store('posts');
        Post::create([
            'menu_for'=>request('MenuFor'),
            'image'=>$image,
            'details'=>request('Details'),
            'max_order'=>request('MaxOrder'),
            'price'=>request('Price'),
            'ended_at'=>request('Ended_At'),
            'user_id'=>Auth::id(),
            'order_left'=>request('MaxOrder'),
            'item_name'=>request('ItemName'),
            'chef_name'=>Auth::user()->name
        ]);
        $itemName=Items::where([['item_name','=',request('ItemName')],['menu_for','=',request('MenuFor')]])->get();
        //dd($itemName);
        if(sizeof($itemName)==0){
            Items::create([
                'item_name'=>request('ItemName'),
                'menu_for'=>request('MenuFor'),
            ]);
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
//        $orders=placeOrder::where('post_id',$id)->get();
//        $quantity=0;
//        if($orders==null){
//            foreach ($orders as $order)
//            {
//                $quantity+=$order->quantity;
//            }
//        }
        $post=Post::find($id);
       // $quantity=$post->max_order-$quantity;
        $user=User::find($post->user_id);
        $name=$user->name;
        $id=$user->id;
        return view('User.createOrder',compact('post','name','id'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('Chef.updatePost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        $image=request('Image')==null?\request('PImage') :$request->Image->store('posts');
        //dd($image);
        $post=Post::find($id);
        $prevOrder=$post->max_order;
        $prevOrderLeft=$post->order_left;
        if($prevOrder!=request('MaxOrder') && $prevOrder!=$prevOrderLeft ){
            $prevOrderLeft=request('MaxOrder')-$prevOrderLeft;
        }
        else{
            $prevOrderLeft=request('MaxOrder');
        }
        $post->update([
            'menu_for'=>request('MenuFor'),
            'image'=>$image,
            'details'=>request('Details'),
            'max_order'=>request('MaxOrder'),
            'price'=>request('Price'),
            'ended_at'=>request('Ended_At'),
            'user_id'=>Auth::id(),
            'order_left'=>$prevOrderLeft

        ]);
        return redirect()->action('Chef\ChefController@index');
    }

//    public function LeftOrderChange($id,$orderd)
//    {
//        $post=Post::find($id);
//        $left=$post->max_order-$orderd;
//        $post->update([
//            'menu_for'=>$post->menu_for,
//            'image'=>$post->image,
//            'details'=>$post->details,
//            'max_order'=>$post->max_order,
//            'price'=>$post->price,
//            'ended_at'=>$post->ended_at,
//            'user_id'=>$post->user_id,
//            'order_left'=>$left,
//
//        ]);
//        return redirect()->action('Chef\ChefController@index');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        Storage::delete($post->image);

        $deletedRows = Post::where('id', $id)->delete();

        return redirect()->action('Chef\ChefController@index');
    }
}
